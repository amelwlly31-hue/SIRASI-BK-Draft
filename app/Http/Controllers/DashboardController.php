<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Konseling;
use App\Models\TindakLanjut;
use App\Models\Penjadwalan;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $totalSiswa = Siswa::count();
        $totalKonseling = Konseling::count();

        $konselingBulanIni = Konseling::whereMonth(
            'tanggal',
            Carbon::now()->month
        )
        ->whereYear(
            'tanggal',
            Carbon::now()->year
        )
        ->count();

        $totalTindakLanjut = TindakLanjut::count();

        $siswaPerhatian = Siswa::with('kelas')
            ->withCount('konseling')
            ->having('konseling_count', '>=', 3)
            ->orderByDesc('konseling_count')
            ->limit(5)
            ->get();

        $riwayatKonseling = Konseling::with(['siswa.kelas', 'jenisMasalah'])
            ->orderBy('tanggal', 'desc')
            ->limit(5)
            ->get();

        $konselingPerBulan = Konseling::select(
                DB::raw('MONTH(tanggal) as bulan'),
                DB::raw('COUNT(*) as jumlah')
            )
            ->whereYear('tanggal', Carbon::now()->year)
            ->groupBy(DB::raw('MONTH(tanggal)'))
            ->orderBy('bulan')
            ->get();

        $jadwalBimbingan = Penjadwalan::with('siswa.kelas')
            ->where('tanggal', '>=', Carbon::today())
            ->orderBy('tanggal')
            ->orderBy('waktu_mulai')
            ->limit(5)
            ->get();

        return view('dashboard.index', compact(
            'totalSiswa',
            'totalKonseling',
            'konselingBulanIni',
            'totalTindakLanjut',
            'siswaPerhatian',
            'riwayatKonseling',
            'konselingPerBulan',
            'jadwalBimbingan'
        ));
    }
}
