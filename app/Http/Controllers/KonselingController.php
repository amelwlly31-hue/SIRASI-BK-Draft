<?php

namespace App\Http\Controllers;

use App\Models\Konseling;
use App\Models\Siswa;
use App\Models\JenisMasalah;
use App\Models\Kelas;
use App\Models\Notifikasi;
use Illuminate\Http\Request;

class KonselingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Konseling::with([
            'siswa.kelas',
            'jenisMasalah',
            'tindakLanjut'
        ]);

        // Search

        if ($request->filled('search')) {

            $search = $request->search;

            $query->where(function ($q) use ($search) {

                $q->where(
                    'masalah',
                    'like',
                    '%' . $search . '%'
                )

                ->orWhere(
                    'hasil_konseling',
                    'like',
                    '%' . $search . '%'
                )

                ->orWhere(
                    'catatan',
                    'like',
                    '%' . $search . '%'
                )

                ->orWhereHas('siswa', function ($siswa) use ($search) {     // Cari berdasarkan nama siswa

                    $siswa->where(
                        'nama_siswa',
                        'like',
                        '%' . $search . '%'
                    );

                })

                ->orWhereHas('jenisMasalah', function ($jenis) use ($search) {      // Cari berdasarkan jenis masalah

                    $jenis->where(
                        'nama_jenis',
                        'like',
                        '%' . $search . '%'
                    );

                })

                ->orWhereHas('tindakLanjut', function ($tindak) use ($search) {     // Cari berdasarkan tindak lanjut

                    $tindak->where(
                        'tindakan',
                        'like',
                        '%' . $search . '%'
                    )
                    ->orWhere(
                        'keterangan',
                        'like',
                        '%' . $search . '%'
                    );

                });

            });
        }


        // Filter kelas

        if ($request->filled('kelas')) {

            $query->whereHas('siswa', function ($q) use ($request) {

                $q->where(
                    'id_kelas',
                    $request->kelas
                );

            });
        }


        // Filter tanggal

        if ($request->filled('tanggal')) {

            $query->whereDate(
                'tanggal',
                $request->tanggal
            );
        }


        // Filter periode

        if ($request->filled('periode')) {

            switch ($request->periode) {

                case 'bulan_ini':

                    $query->whereBetween('tanggal', [
                        now()
                            ->startOfMonth()
                            ->format('Y-m-d'),

                        now()
                            ->endOfMonth()
                            ->format('Y-m-d')
                    ]);

                    break;


                case 'bulan_lalu':

                    $bulanLalu = now()->subMonth();

                    $query->whereBetween('tanggal', [
                        $bulanLalu
                            ->copy()
                            ->startOfMonth()
                            ->format('Y-m-d'),

                        $bulanLalu
                            ->copy()
                            ->endOfMonth()
                            ->format('Y-m-d')
                    ]);

                    break;


                case 'tahun_ini':

                    $query->whereBetween('tanggal', [
                        now()
                            ->startOfYear()
                            ->format('Y-m-d'),

                        now()
                            ->endOfYear()
                            ->format('Y-m-d')
                    ]);

                    break;
            }
        }


        // Filter status

        if ($request->filled('status')) {

            $query->where(
                'status',
                $request->status
            );
        }


        // Data kelas

        $kelas = Kelas::all();


        // Data konseling

        $konseling = $query
            ->orderByDesc('tanggal')
            ->paginate(8)
            ->withQueryString();

        $notifikasis = Notifikasi::latest()
            ->take(10)
            ->get();


        return view(
            'konseling.index',
            compact(
                'konseling',
                'kelas',
                'notifikasis'
            )
        );
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $siswa = Siswa::with('kelas')
            ->orderBy('nama_siswa')
            ->get();

        $jenisMasalah = JenisMasalah::orderBy('nama_jenis')
            ->get();

        $selectedSiswa = $request->id_siswa;

        return view(
            'konseling.create',
            compact(
                'siswa',
                'jenisMasalah',
                'selectedSiswa'
            )
        );
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_siswa' => 'required|exists:siswa,id_siswa',
            'id_jenis' => 'required|exists:jenis_masalah,id_jenis',
            'tanggal' => 'required|date',
            'masalah' => 'required|string',
            'hasil_konseling' => 'required|string',
            'catatan' => 'nullable|string',
        ]);

        $validated['status'] = 'Proses';        // Status awal otomatis

        $konseling = Konseling::create($validated);

        $siswa = Siswa::find($validated['id_siswa']);

        Notifikasi::create([
            'judul' => 'Konseling Baru',
            'pesan' => 'Data konseling baru untuk siswa ' . $siswa->nama_siswa . ' berhasil ditambahkan.',
            'tipe' => 'konseling',
            'dibaca' => false,
            'id_konseling' => $konseling->id_konseling,
        ]);

        return redirect()
            ->route('konseling.index')
            ->with(
                'success',
                'Catatan konseling berhasil ditambahkan.'
            );
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $konseling = Konseling::with([
            'siswa.kelas',
            'jenisMasalah',
            'tindakLanjut'
        ])
            ->findOrFail($id);


        return view(
            'konseling.show',
            compact('konseling')
        );
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $konseling = Konseling::findOrFail($id);


        $siswa = Siswa::with('kelas')
            ->orderBy('nama_siswa')
            ->get();


        $jenisMasalah = JenisMasalah::orderBy('nama_jenis')
            ->get();


        return view(
            'konseling.edit',
            compact(
                'konseling',
                'siswa',
                'jenisMasalah'
            )
        );
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(
        Request $request,
        $id
    ) {

        $konseling = Konseling::findOrFail($id);


        $validated = $request->validate([
            'id_siswa' => 'required|exists:siswa,id_siswa',

            'id_jenis' => 'required|exists:jenis_masalah,id_jenis',

            'tanggal' => 'required|date',

            'masalah' => 'required|string',

            'hasil_konseling' => 'required|string',

            'catatan' => 'nullable|string',

            'status' => 'required|string|max:30',
        ]);


        $konseling->update($validated);


        return redirect()
            ->route(
                'konseling.show',
                $konseling->id_konseling
            )
            ->with(
                'success',
                'Catatan konseling berhasil diperbarui.'
            );
    }

    public function bacaNotifikasi($id)
    {
        $notifikasi = Notifikasi::findOrFail($id);

        if (!config('app.demo_mode', false)) {
            $notifikasi->update([
                'dibaca' => true,
            ]);
        }

        if ($notifikasi->id_konseling) {
            return redirect()->route(
                'konseling.show',
                $notifikasi->id_konseling
            );
        }

        if ($notifikasi->tipe === 'siswa') {
            return redirect()->route('siswa.index');
        }

        return redirect()->route('konseling.index');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $konseling = Konseling::findOrFail($id);


        $konseling->delete();


        return redirect()
            ->route('konseling.index')
            ->with(
                'success',
                'Catatan konseling berhasil dihapus.'
            );
    }
}
