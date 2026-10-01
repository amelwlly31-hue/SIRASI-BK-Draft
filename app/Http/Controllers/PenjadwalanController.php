<?php

namespace App\Http\Controllers;

use App\Models\Penjadwalan;
use App\Models\Siswa;
use Illuminate\Http\Request;

class PenjadwalanController extends Controller
{
    /**
     * Menampilkan daftar jadwal.
     */
    public function index(Request $request)
    {
        $query = Penjadwalan::with('siswa.kelas');

        $siswa = Siswa::with('kelas')
            ->where('status', 'Aktif')
            ->orderBy('nama_siswa')
            ->get();
        // Search
        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('jenis_bimbingan', 'like', '%' . $search . '%')
                    ->orWhere('catatan', 'like', '%' . $search . '%')
                    ->orWhere('status', 'like', '%' . $search . '%')
                    ->orWhereHas('siswa', function ($siswa) use ($search) {
                        $siswa->where(
                            'nama_siswa',
                            'like',
                            '%' . $search . '%'
                        );
                    });
            });
        }

        // Filter tanggal
        if ($request->filled('tanggal')) {
            $query->whereDate('tanggal', $request->tanggal);
        }

        // Filter status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $penjadwalan = $query
            ->orderBy('tanggal')
            ->orderBy('waktu_mulai')
            ->paginate(8)
            ->withQueryString();

        return view(
            'penjadwalan.index',
            compact('penjadwalan', 'siswa')
        );
    }

    /**
     * Menampilkan form tambah jadwal.
     */
    public function create()
    {
        $siswa = Siswa::with('kelas')
            ->where('status', 'Aktif')
            ->orderBy('nama_siswa')
            ->get();

        return view(
            'penjadwalan.create',
            compact('siswa')
        );
    }

    /**
     * Menyimpan jadwal baru.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_siswa' => 'required|exists:siswa,id_siswa',
            'tanggal' => 'required|date',
            'waktu_mulai' => 'required|date_format:H:i',
            'waktu_selesai' => 'required|date_format:H:i|after:waktu_mulai',
            'jenis_bimbingan' => 'required|string|max:255',
            'catatan' => 'nullable|string',
        ]);

        $validated['status'] = 'Terjadwal';

        Penjadwalan::create($validated);

        return redirect()
            ->route('penjadwalan.index')
            ->with(
                'success',
                'Jadwal bimbingan berhasil ditambahkan.'
            );
    }

    /**
     * Menampilkan detail jadwal.
     */
    public function show($id)
    {
        $penjadwalan = Penjadwalan::with('siswa.kelas')
            ->findOrFail($id);

        return view(
            'penjadwalan.show',
            compact('penjadwalan')
        );
    }

    /**
     * Menampilkan form edit jadwal.
     */
    public function edit($id)
    {
        $penjadwalan = Penjadwalan::findOrFail($id);

        $siswa = Siswa::with('kelas')
            ->where('status', 'Aktif')
            ->orderBy('nama_siswa')
            ->get();

        return view(
            'penjadwalan.edit',
            compact(
                'penjadwalan',
                'siswa'
            )
        );
    }

    /**
     * Memperbarui jadwal.
     */
    public function update(Request $request, $id)
    {
        $penjadwalan = Penjadwalan::findOrFail($id);

        $validated = $request->validate([
            'id_siswa' => 'required|exists:siswa,id_siswa',
            'tanggal' => 'required|date',
            'waktu_mulai' => 'required|date_format:H:i',
            'waktu_selesai' => 'required|date_format:H:i|after:waktu_mulai',
            'jenis_bimbingan' => 'required|string|max:255',
            'catatan' => 'nullable|string',
            'status' => 'required|in:Terjadwal,Selesai,Dibatalkan',
        ]);

        $penjadwalan->update($validated);

        return redirect()
            ->route(
                'penjadwalan.show',
                $penjadwalan->id_penjadwalan
            )
            ->with(
                'success',
                'Jadwal bimbingan berhasil diperbarui.'
            );
    }

    /**
     * Menghapus jadwal.
     */
    public function destroy($id)
    {
        $penjadwalan = Penjadwalan::findOrFail($id);

        $penjadwalan->delete();

        return redirect()
            ->route('penjadwalan.index')
            ->with(
                'success',
                'Jadwal bimbingan berhasil dihapus.'
            );
    }
}
