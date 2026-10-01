<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Kelas;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * Format kelas yang benar:
     * Kelas 7: 7.1 s/d 7.10
     * Kelas 8: 8.1 s/d 8.10
     * Kelas 9: 9.1 s/d 9.10
     * Total 30 kelas.
     *
     * @return void
     */
    public function run()
    {
        // 1. Update data lama jika masih 7A, 8A, 9A
        DB::table('kelas')->where('nama_kelas', '7A')->update(['nama_kelas' => '7.1', 'tingkat' => 7]);
        DB::table('kelas')->where('nama_kelas', '8A')->update(['nama_kelas' => '8.1', 'tingkat' => 8]);
        DB::table('kelas')->where('nama_kelas', '9A')->update(['nama_kelas' => '9.1', 'tingkat' => 9]);

        $daftarKelas = [];

        // Tingkat 7: 7.1 sampai 7.10
        for ($i = 1; $i <= 10; $i++) {
            $daftarKelas[] = ['nama_kelas' => "7.{$i}", 'tingkat' => 7];
        }

        // Tingkat 8: 8.1 sampai 8.10
        for ($i = 1; $i <= 10; $i++) {
            $daftarKelas[] = ['nama_kelas' => "8.{$i}", 'tingkat' => 8];
        }

        // Tingkat 9: 9.1 sampai 9.10
        for ($i = 1; $i <= 10; $i++) {
            $daftarKelas[] = ['nama_kelas' => "9.{$i}", 'tingkat' => 9];
        }

        foreach ($daftarKelas as $data) {
            Kelas::firstOrCreate(
                ['nama_kelas' => $data['nama_kelas']],
                ['tingkat' => $data['tingkat']]
            );
        }
    }
}
