<?php

namespace App\Http\Controllers;

use App\Models\Konseling;
use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        $jenisLaporan = $request->input('jenis', 'periode');

        if (!in_array($jenisLaporan, [
            'periode',
            'per_siswa',
            'rekap_masalah',
        ], true)) {
            $jenisLaporan = 'periode';
        }

        $tanggalMulai = $request->tanggal_mulai
            ?? now()->startOfMonth()->format('Y-m-d');

        $tanggalAkhir = $request->tanggal_akhir
            ?? now()->endOfMonth()->format('Y-m-d');

        $idKelas = $request->id_kelas;
        $idSiswa = $request->id_siswa;

        $kelas = Kelas::all();

        $siswa = Siswa::with('kelas')
            ->orderBy('nama_siswa')
            ->get();

        $konseling = collect();
        $siswaTerpilih = null;
        $konselingSiswa = collect();
        $rekapMasalah = collect();
        $totalKonselingMasalah = 0;
        $totalJenisMasalah = 0;
        $masalahTerbanyak = null;
        $totalUntukPersen = 1;

        if ($jenisLaporan === 'periode') {
            $query = Konseling::with([
                'siswa.kelas',
                'jenisMasalah',
                'tindakLanjut',
            ])
                ->whereBetween('tanggal', [
                    $tanggalMulai,
                    $tanggalAkhir,
                ])
                ->orderBy('tanggal', 'asc');

            if ($idKelas) {
                $query->whereHas('siswa', function ($query) use ($idKelas) {
                    $query->where('id_kelas', $idKelas);
                });
            }

            if ($idSiswa) {
                $query->where('id_siswa', $idSiswa);
            }

            $konseling = $query->get();
        }

        if ($jenisLaporan === 'per_siswa' && $idSiswa) {
            $siswaTerpilih = Siswa::with('kelas')
                ->findOrFail($idSiswa);

            $konselingSiswa = Konseling::with([
                'jenisMasalah',
                'tindakLanjut',
            ])
                ->where('id_siswa', $idSiswa)
                ->orderByDesc('tanggal')
                ->get();
        }

        if ($jenisLaporan === 'rekap_masalah') {
            $konselingRekap = Konseling::with('jenisMasalah')->get();

            $rekapMasalah = $konselingRekap
                ->groupBy('id_jenis')
                ->map(function ($items) {
                    return [
                        'nama_jenis' => optional(
                            $items->first()->jenisMasalah
                        )->nama_jenis ?? 'Tidak Diketahui',
                        'jumlah' => $items->count(),
                    ];
                })
                ->sortByDesc('jumlah')
                ->values();

            $totalKonselingMasalah = $konselingRekap->count();
            $totalJenisMasalah = $rekapMasalah->count();
            $masalahTerbanyak = $rekapMasalah->first();
            $totalUntukPersen = max($totalKonselingMasalah, 1);
        }

        return view('laporan.index', compact(
            'jenisLaporan',
            'konseling',
            'kelas',
            'siswa',
            'tanggalMulai',
            'tanggalAkhir',
            'idKelas',
            'idSiswa',
            'siswaTerpilih',
            'konselingSiswa',
            'rekapMasalah',
            'totalKonselingMasalah',
            'totalJenisMasalah',
            'masalahTerbanyak',
            'totalUntukPersen'
        ));
    }

    public function perSiswa(Request $request)
    {
        return redirect()->route('laporan.index', array_filter([
            'jenis' => 'per_siswa',
            'id_siswa' => $request->id_siswa,
        ]));
    }

    public function rekapMasalah()
    {
        return redirect()->route('laporan.index', [
            'jenis' => 'rekap_masalah',
        ]);
    }
}
