<?php

namespace App\Http\Controllers;

use App\Models\TindakLanjut;
use App\Models\Konseling;
use Illuminate\Http\Request;

class TindakLanjutController extends Controller
{
    public function index()
    {
        $tindakLanjut = TindakLanjut::with([
            'konseling.siswa.kelas'
        ])
            ->orderByDesc('tanggal')
            ->paginate(8);

        return view('tindak_lanjut.index', compact('tindakLanjut'));
    }

    public function create(Request $request)
    {
        $konseling = Konseling::with([
            'siswa.kelas',
            'jenisMasalah'
        ])
            ->orderByDesc('tanggal')
            ->get();

        $selectedKonseling = $request->id_konseling;

        return view('tindak_lanjut.create', compact(
            'konseling',
            'selectedKonseling'
        ));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_konseling' => 'required|exists:konseling,id_konseling',
            'tanggal' => 'required|date',
            'tindakan' => 'required|string',
            'keterangan' => 'required|string',
        ]);

        TindakLanjut::create($validated);

        return redirect()
            ->route('konseling.show', $validated['id_konseling'])
            ->with('success', 'Tindak lanjut berhasil ditambahkan.');
    }

    public function show($id)
    {
        $tindakLanjut = TindakLanjut::with([
            'konseling.siswa.kelas',
            'konseling.jenisMasalah'
        ])->findOrFail($id);

        return view('tindak_lanjut.show', compact('tindakLanjut'));
    }

    public function edit($id)
    {
        $tindakLanjut = TindakLanjut::findOrFail($id);

        $konseling = Konseling::with([
            'siswa.kelas',
            'jenisMasalah'
        ])
            ->orderByDesc('tanggal')
            ->get();

        return view('tindak_lanjut.edit', compact(
            'tindakLanjut',
            'konseling'
        ));
    }

    public function update(Request $request, $id)
    {
        $tindakLanjut = TindakLanjut::findOrFail($id);

        $validated = $request->validate([
            'id_konseling' => 'required|exists:konseling,id_konseling',
            'tanggal' => 'required|date',
            'tindakan' => 'required|string',
            'keterangan' => 'required|string',
        ]);

        $tindakLanjut->update($validated);

        return redirect()
            ->route('konseling.show', $tindakLanjut->id_konseling)
            ->with('success', 'Tindak lanjut berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $tindakLanjut = TindakLanjut::findOrFail($id);

        $idKonseling = $tindakLanjut->id_konseling;

        $tindakLanjut->delete();

        return redirect()
            ->route('konseling.show', $idKonseling)
            ->with('success', 'Tindak lanjut berhasil dihapus.');
    }
}
