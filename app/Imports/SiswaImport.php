<?php

namespace App\Imports;

use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SiswaImport implements ToCollection, WithHeadingRow
{
    protected $tingkat;
    protected $kelas;

    public function __construct($tingkat, $kelas = 'all')
    {
        $this->tingkat = (string) $tingkat;
        $this->kelas = $kelas;
    }

    public function collection(Collection $rows)
    {
        $errors = [];
        $dataSiswa = [];

        /*
        |--------------------------------------------------------------------------
        | Ambil data kelas sesuai jenjang
        |--------------------------------------------------------------------------
        */

        $kelasQuery = Kelas::where('tingkat', $this->tingkat);

        if ($this->kelas !== 'all') {
            $kelasQuery->where('id_kelas', $this->kelas);
        }

        $kelasTersedia = $kelasQuery
            ->get()
            ->keyBy('nama_kelas');

        /*
        |--------------------------------------------------------------------------
        | Cek file kosong
        |--------------------------------------------------------------------------
        */

        if ($rows->isEmpty()) {
            throw ValidationException::withMessages([
                'file' => 'File Excel tidak memiliki data siswa.',
            ]);
        }

        /*
        |--------------------------------------------------------------------------
        | Validasi setiap baris Excel
        |--------------------------------------------------------------------------
        */

        foreach ($rows as $index => $row) {

            // Nomor baris Excel.
            // Baris pertama setelah header = baris 2.
            $nomorBaris = $index + 2;

            $nama = trim((string) ($row['nama_siswa'] ?? ''));
            $nis = trim((string) ($row['nis'] ?? ''));
            $jenisKelamin = strtoupper(trim((string) ($row['jenis_kelamin'] ?? '')));
            $alamat = trim((string) ($row['alamat'] ?? ''));
            $noTelp = trim((string) ($row['no_telepon'] ?? ''));
            $namaKelas = trim((string) ($row['kelas'] ?? ''));

            /*
            |--------------------------------------------------------------------------
            | Abaikan baris yang benar-benar kosong
            |--------------------------------------------------------------------------
            */

            if (
                $nama === '' &&
                $nis === '' &&
                $jenisKelamin === '' &&
                $alamat === '' &&
                $noTelp === '' &&
                $namaKelas === ''
            ) {
                continue;
            }

            /*
            |--------------------------------------------------------------------------
            | Nama siswa wajib
            |--------------------------------------------------------------------------
            */

            if ($nama === '') {
                $errors[] = "Baris {$nomorBaris}: Nama Siswa wajib diisi.";
                continue;
            }

            if (strlen($nama) > 100) {
                $errors[] = "Baris {$nomorBaris}: Nama Siswa maksimal 100 karakter.";
                continue;
            }

            /*
            |--------------------------------------------------------------------------
            | Jenis kelamin wajib L/P
            |--------------------------------------------------------------------------
            */

            if (!in_array($jenisKelamin, ['L', 'P'])) {
                $errors[] = "Baris {$nomorBaris}: Jenis Kelamin harus L atau P.";
                continue;
            }

            /*
            |--------------------------------------------------------------------------
            | Kelas wajib
            |--------------------------------------------------------------------------
            */

            if ($namaKelas === '') {
                $errors[] = "Baris {$nomorBaris}: Kelas wajib diisi.";
                continue;
            }

            /*
            |--------------------------------------------------------------------------
            | Cek kelas sesuai jenjang dan pilihan kelas
            |--------------------------------------------------------------------------
            */

            if (!$kelasTersedia->has($namaKelas)) {

                if ($this->kelas === 'all') {
                    $errors[] = "Baris {$nomorBaris}: Kelas {$namaKelas} tidak termasuk jenjang {$this->tingkat}.";
                } else {
                    $kelasDipilih = Kelas::find($this->kelas);

                    $namaKelasDipilih = $kelasDipilih
                        ? $kelasDipilih->nama_kelas
                        : 'yang dipilih';

                    $errors[] = "Baris {$nomorBaris}: Kelas {$namaKelas} tidak sesuai. Kelas yang dipilih adalah {$namaKelasDipilih}.";
                }

                continue;
            }

            $kelas = $kelasTersedia->get($namaKelas);

            /*
            |--------------------------------------------------------------------------
            | Simpan data yang sudah lolos validasi
            |--------------------------------------------------------------------------
            */

            $dataSiswa[] = [
                'nis' => $nis !== '' ? $nis : null,
                'nama_siswa' => $nama,
                'jenis_kelamin' => $jenisKelamin,
                'id_kelas' => $kelas->id_kelas,
                'alamat' => $alamat !== '' ? $alamat : null,
                'no_telp' => $noTelp !== '' ? $noTelp : null,
                'status' => 'Aktif',
            ];
        }

        /*
        |--------------------------------------------------------------------------
        | Kalau ada kesalahan, batalkan seluruh import
        |--------------------------------------------------------------------------
        */

        if (!empty($errors)) {
            throw ValidationException::withMessages([
                'file' => $errors,
            ]);
        }

        /*
        |--------------------------------------------------------------------------
        | Simpan semua data sekaligus
        |--------------------------------------------------------------------------
        */

        DB::transaction(function () use ($dataSiswa) {

            foreach ($dataSiswa as $data) {
                Siswa::create($data);
            }
        });
    }
}
