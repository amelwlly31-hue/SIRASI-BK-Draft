<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Konseling;
use App\Models\Kelas;
use App\Models\Notifikasi;
use App\Imports\SiswaImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index(Request $request)
    {
        $query = Siswa::with('kelas')
            ->withCount('konseling')
            ->addSelect([
                'konseling_terakhir' => Konseling::select('tanggal')
                    ->whereColumn('id_siswa', 'siswa.id_siswa')
                    ->latest('tanggal')
                    ->limit(1)
            ]);

        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where(
                    'nama_siswa',
                    'like',
                    '%' . $search . '%'
                )->orWhereHas('kelas', function ($kelas) use ($search) {
                    $kelas->where(
                        'nama_kelas',
                        'like',
                        '%' . $search . '%'
                    );
                });
            });
        }

        if ($request->filled('tingkat')) {
            $query->whereHas('kelas', function ($kelas) use ($request) {
                $kelas->where('tingkat', $request->tingkat);
            });
        }

        if ($request->filled('kelas')) {
            $query->where('id_kelas', $request->kelas);
        }

        $siswa = $query
            ->orderBy('nama_siswa')
            ->paginate(8)
            ->withQueryString();

        $daftarKelas = Kelas::all();

        return view('siswa.index', compact('siswa', 'daftarKelas'));
    }

    public function create()
    {
        $kelas = Kelas::all();

        return view('siswa.create', compact('kelas'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nis' => 'nullable|string|max:50',
            'nama_siswa' => 'required|string|max:100',
            'jenis_kelamin' => 'required|in:L,P',
            'id_kelas' => 'required|exists:kelas,id_kelas',
            'alamat' => 'nullable|string',
            'no_telp' => 'nullable|string|max:20',
        ]);

        $validated['status'] = 'Aktif';

        $siswa = Siswa::create($validated);

        Notifikasi::create([
            'judul' => 'Siswa Baru',
            'pesan' => 'Data siswa ' . $siswa->nama_siswa . ' berhasil ditambahkan.',
            'tipe' => 'siswa',
            'dibaca' => false,
        ]);

        return redirect()
            ->route('siswa.index')
            ->with(
                'success',
                'Data siswa berhasil ditambahkan.'
            );
    }

    public function show(Request $request, $id)
    {
        $siswa = Siswa::with('kelas')
            ->findOrFail($id);

        $query = $siswa->konseling()
            ->with([
                'jenisMasalah',
                'tindakLanjut'
            ])
            ->orderByDesc('tanggal');

        if ($request->filled('id_jenis')) {
            $query->where(
                'id_jenis',
                $request->id_jenis
            );
        }

        if ($request->filled('status')) {
            $query->where(
                'status',
                $request->status
            );
        }

        if ($request->filled('tanggal_mulai')) {
            $query->whereDate(
                'tanggal',
                '>=',
                $request->tanggal_mulai
            );
        }

        if ($request->filled('tanggal_akhir')) {
            $query->whereDate(
                'tanggal',
                '<=',
                $request->tanggal_akhir
            );
        }

        $konseling = $query->get();

        $jenisMasalah = \App\Models\JenisMasalah::orderBy(
            'nama_jenis'
        )->get();

        $totalKonseling = $siswa->konseling()->count();

        $konselingTerakhir = $siswa->konseling()
            ->orderByDesc('tanggal')
            ->first();

        return view('siswa.show', compact(
            'siswa',
            'konseling',
            'jenisMasalah',
            'totalKonseling',
            'konselingTerakhir'
        ));
    }

    public function edit($id)
    {
        $siswa = Siswa::findOrFail($id);

        $kelas = Kelas::all();

        return view('siswa.edit', compact(
            'siswa',
            'kelas'
        ));
    }

    public function update(Request $request, $id)
    {
        $siswa = Siswa::findOrFail($id);

        $validated = $request->validate([
            'nis' => 'nullable|string|max:50',
            'nama_siswa' => 'required|string|max:100',
            'jenis_kelamin' => 'required|in:L,P',
            'id_kelas' => 'required|exists:kelas,id_kelas',
            'alamat' => 'nullable|string',
            'no_telp' => 'nullable|string|max:20',
        ]);

        $siswa->update($validated);

        return redirect()
            ->route('siswa.index')
            ->with(
                'success',
                'Data siswa berhasil diperbarui.'
            );
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:xlsx,xls,csv|max:5120',
            'tingkat' => 'required|in:7,8,9',
            'kelas' => 'required|string',
        ]);

        try {
            Excel::import(
                new SiswaImport(
                    $request->tingkat,
                    $request->kelas
                ),
                $request->file('file')
            );

            return redirect()
                ->route('siswa.index')
                ->with(
                    'success',
                    'Data siswa berhasil diimport dari Excel.'
                );

        } catch (\Illuminate\Validation\ValidationException $e) {

            return redirect()
                ->route('siswa.index')
                ->withErrors($e->errors())
                ->withInput();
        }
    }

    public function toggleStatus($id)
    {
        $siswa = Siswa::findOrFail($id);

        $siswa->status = ($siswa->status === 'Aktif')
            ? 'Tidak Aktif'
            : 'Aktif';

        $siswa->save();

        return redirect()
            ->route('siswa.index')
            ->with(
                'success',
                'Status siswa berhasil diubah menjadi ' . $siswa->status . '.'
            );
    }

    public function destroy($id)
    {
        $siswa = Siswa::findOrFail($id);

        if ($siswa->konseling()->exists()) {        // Cek riwayat konseling
            return redirect()
                ->route('siswa.index')
                ->with(
                    'error',
                    'GAGAL HAPUS: siswa ini memiliki riwayat konseling.'
                );
        }

        $siswa->delete();           // Hapus siswa

        return redirect()
            ->route('siswa.index')
            ->with(
                'success',
                'Data siswa berhasil dihapus.'
            );
    }

    public function riwayat(Request $request)
    {
        $query = Siswa::with('kelas')
            ->withCount('konseling')
            ->having(
                'konseling_count',
                '>',
                0
            );

        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('nama_siswa', 'like', '%' . $search . '%')
                ->orWhereHas('kelas', function ($kelas) use ($search) {
                    $kelas->where('nama_kelas', 'like', '%' . $search . '%');
                });
            });
        }

        $siswa = $query
            ->orderBy('nama_siswa')
            ->paginate(10)
            ->withQueryString();

        $daftarKelas = Kelas::all();
        $kelas = $daftarKelas;

        return view('siswa.riwayat', compact('siswa', 'daftarKelas', 'kelas'));
    }

    public function suratPanggilan($id)
    {
        $siswa = Siswa::with('kelas')
            ->findOrFail($id);

        $totalKonseling = $siswa->konseling()->count();

        if ($totalKonseling < 3) {
            return redirect()
                ->route('siswa.show', $siswa->id_siswa)
                ->with(
                    'error',
                    'Surat panggilan hanya dapat dibuat untuk siswa dengan minimal 3 sesi konseling.'
                );
        }

        return view(
            'surat.panggilan',
            compact(
                'siswa',
                'totalKonseling'
            )
        );
    }

    public function suratPanggilanPdf($id)
    {
        $siswa = Siswa::with('kelas')
            ->findOrFail($id);

        $totalKonseling = $siswa->konseling()->count();

        if ($totalKonseling < 3) {
            return redirect()
                ->route('siswa.show', $siswa->id_siswa)
                ->with(
                    'error',
                    'Surat panggilan hanya dapat dibuat untuk siswa dengan minimal 3 sesi konseling.'
                );
        }

        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView(
            'surat.panggilan_pdf',
            compact(
                'siswa',
                'totalKonseling'
            )
        );

        return $pdf->download(
            'surat-panggilan-' . $siswa->nama_siswa . '.pdf'
        );
    }

    public function suratPanggilanDocx($id)
    {
        $siswa = Siswa::with('kelas')
            ->findOrFail($id);

        $totalKonseling = $siswa->konseling()->count();

        if ($totalKonseling < 3) {
            return redirect()
                ->route('siswa.show', $siswa->id_siswa)
                ->with(
                    'error',
                    'Surat panggilan hanya dapat dibuat untuk siswa dengan minimal 3 sesi konseling.'
                );
        }

        $phpWord = new \PhpOffice\PhpWord\PhpWord();
        $phpWord->setDefaultFontName('Times New Roman');
        $phpWord->setDefaultFontSize(11);

        $section = $phpWord->addSection([
            'paperSize' => 'A4',
            'orientation' => 'portrait',
            'marginTop' => \PhpOffice\PhpWord\Shared\Converter::cmToTwip(1.5),
            'marginBottom' => \PhpOffice\PhpWord\Shared\Converter::cmToTwip(1.5),
            'marginLeft' => \PhpOffice\PhpWord\Shared\Converter::cmToTwip(2.0),
            'marginRight' => \PhpOffice\PhpWord\Shared\Converter::cmToTwip(2.0),
        ]);

        $kopP1 = $section->addTextRun([             // KOP Surat
            'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER,
            'spaceBefore' => 0,
            'spaceAfter' => 20,
        ]);

        $logoPath = public_path('images/logo-smpn2-dramaga.png');
        $imageSource = $logoPath;
        $tempLogo = null;

        if (file_exists($logoPath)) {
            if (extension_loaded('gd') && function_exists('imagecreatefrompng') && function_exists('imagecrop')) {
                $im = @imagecreatefrompng($logoPath);
                if ($im) {
                    $cropped = @imagecrop($im, ['x' => 210, 'y' => 89, 'width' => 147, 'height' => 135]);
                    if ($cropped) {
                        imagealphablending($cropped, false);
                        imagesavealpha($cropped, true);

                        $tempLogo = tempnam(sys_get_temp_dir(), 'logo_') . '.png';

                        if (imagepng($cropped, $tempLogo)) {
                            $imageSource = $tempLogo;
                        }

                        imagedestroy($cropped);
                    }
                    imagedestroy($im);
                }
            }
        }

        if (file_exists($imageSource)) {
            $kopP1->addImage($imageSource, [
                'width' => 60,
                'height' => 55,
                'wrappingStyle' => 'behind',
                'positioning' => 'absolute',
                'posHorizontal' => 'left',
                'posHorizontalRel' => 'margin',
                'posVertical' => 'top',
                'posVerticalRel' => 'margin',
            ]);
        }

        $kopP1->addText(
            'PEMERINTAH KABUPATEN BOGOR',
            ['bold' => true, 'size' => 14, 'color' => '111111']
        );

        $section->addText(
            'SMP NEGERI 2 DRAMAGA',
            ['bold' => true, 'size' => 16, 'color' => '111111'],
            ['alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER, 'spaceBefore' => 0, 'spaceAfter' => 20]
        );

        $section->addText(
            'Jl. Raya Dramaga, Kabupaten Bogor, Jawa Barat',
            ['size' => 9.5, 'color' => '111111'],
            ['alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER, 'spaceBefore' => 0, 'spaceAfter' => 60]
        );

        $section->addText('', [], [             // Garis Pembatas KOP
            'borderBottomSize' => 18, // 2.25pt
            'borderBottomColor' => '111111',
            'borderBottomStyle' => 'single',
            'spaceBefore' => 40,
            'spaceAfter' => 180,
        ]);

        $section->addText(      // Judul Surat
            'SURAT PANGGILAN ORANG TUA/WALI',
            ['bold' => true, 'size' => 12.5, 'underline' => 'single'],
            ['alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER, 'spaceBefore' => 0, 'spaceAfter' => 30]
        );
        $section->addText(
            'Nomor: .................................',
            ['size' => 10],
            ['alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER, 'spaceBefore' => 0, 'spaceAfter' => 200]
        );

        $section->addText(          // Paragraf Pembuka
            'Yth. Bapak/Ibu Orang Tua/Wali dari:',
            ['size' => 11],
            ['alignment' => \PhpOffice\PhpWord\SimpleType\Jc::START, 'spaceBefore' => 0, 'spaceAfter' => 80]
        );

        $tabStyle = [           // Identitas Siswa
            'indentation' => ['left' => \PhpOffice\PhpWord\Shared\Converter::cmToTwip(0.8)],
            'tabs' => [
                new \PhpOffice\PhpWord\Style\Tab('left', \PhpOffice\PhpWord\Shared\Converter::cmToTwip(3.5)),
                new \PhpOffice\PhpWord\Style\Tab('left', \PhpOffice\PhpWord\Shared\Converter::cmToTwip(3.9)),
            ],
            'spaceBefore' => 0,
            'spaceAfter' => 30,
        ];

        $kelasNama = $siswa->kelas
            ? (str_starts_with($siswa->kelas->nama_kelas, (string)$siswa->kelas->tingkat)
                ? $siswa->kelas->nama_kelas
                : trim(($siswa->kelas->tingkat ?? '') . ' ' . ($siswa->kelas->nama_kelas ?? '')))
            : '-';

        $pNama = $section->addTextRun($tabStyle);
        $pNama->addText('Nama Siswa', ['size' => 11]);
        $pNama->addText("\t:\t", ['size' => 11]);
        $pNama->addText($siswa->nama_siswa, ['size' => 11, 'bold' => true]);

        $pNis = $section->addTextRun($tabStyle);
        $pNis->addText('NIS', ['size' => 11]);
        $pNis->addText("\t:\t", ['size' => 11]);
        $pNis->addText($siswa->nis, ['size' => 11]);

        $pKelas = $section->addTextRun($tabStyle);
        $pKelas->addText('Kelas', ['size' => 11]);
        $pKelas->addText("\t:\t", ['size' => 11]);
        $pKelas->addText($kelasNama ?: '-', ['size' => 11]);

        $pBodyStyle = [             // Paragraf Isi Surat
            'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::BOTH,
            'spaceBefore' => 0,
            'spaceAfter' => 100,
            'lineHeight' => 1.2,
        ];

        $section->addText(
            'Dengan hormat,',
            ['size' => 11],
            ['spaceBefore' => 100, 'spaceAfter' => 80]
        );

        $section->addText(
            'Sehubungan dengan hasil pemantauan dan pelaksanaan layanan bimbingan dan konseling di sekolah, kami bermaksud mengundang Bapak/Ibu Orang Tua/Wali untuk hadir ke sekolah guna membicarakan perkembangan serta tindak lanjut bimbingan terhadap putra/putri Bapak/Ibu.',
            ['size' => 11],
            $pBodyStyle
        );

        $pKonseling = $section->addTextRun($pBodyStyle);
        $pKonseling->addText('Berdasarkan data pada Sistem Informasi Riwayat dan Administrasi Bimbingan Konseling, siswa tersebut telah mengikuti ', ['size' => 11]);
        $pKonseling->addText("{$totalKonseling} sesi konseling", ['size' => 11, 'bold' => true]);
        $pKonseling->addText('.', ['size' => 11]);

        $section->addText(
            'Oleh karena itu, kami mengharapkan kehadiran Bapak/Ibu untuk dapat berdiskusi bersama Guru Bimbingan dan Konseling mengenai perkembangan siswa dan langkah pembinaan yang diperlukan.',
            ['size' => 11],
            $pBodyStyle
        );

        $pJadwal1 = $section->addTextRun($tabStyle);        // Jadwal Kehadiran
        $pJadwal1->addText('Hari/Tanggal', ['size' => 11]);
        $pJadwal1->addText("\t:\t", ['size' => 11]);
        $pJadwal1->addText('................................................', ['size' => 11]);

        $pJadwal2 = $section->addTextRun($tabStyle);
        $pJadwal2->addText('Waktu', ['size' => 11]);
        $pJadwal2->addText("\t:\t", ['size' => 11]);
        $pJadwal2->addText('................................................', ['size' => 11]);

        $pJadwal3 = $section->addTextRun($tabStyle);
        $pJadwal3->addText('Tempat', ['size' => 11]);
        $pJadwal3->addText("\t:\t", ['size' => 11]);
        $pJadwal3->addText('Ruang Bimbingan dan Konseling', ['size' => 11]);

        $section->addText(          // Paragraf Penutup
            'Demikian surat panggilan ini kami sampaikan. Atas perhatian dan kerja sama Bapak/Ibu, kami ucapkan terima kasih.',
            ['size' => 11],
            array_merge($pBodyStyle, ['spaceBefore' => 80, 'spaceAfter' => 180])
        );


        $ttdStyle = [           // Blok Tanda Tangan
            'indentation' => ['left' => \PhpOffice\PhpWord\Shared\Converter::cmToTwip(10.5)],
            'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER,
            'spaceBefore' => 0,
            'spaceAfter' => 30,
        ];

        $section->addText('Dramaga, ' . date('d/m/Y'), ['size' => 11], $ttdStyle);
        $section->addText('Guru Bimbingan dan Konseling', ['size' => 11], array_merge($ttdStyle, ['spaceAfter' => 850]));
        $section->addText('........................................', ['size' => 11, 'bold' => true, 'underline' => 'single'], $ttdStyle);
        $section->addText('NIP. ....................................', ['size' => 11], array_merge($ttdStyle, ['spaceAfter' => 0]));

        $fileName = 'surat-panggilan-' . $siswa->nama_siswa . '.docx';
        $tempFile = tempnam(sys_get_temp_dir(), 'word_');
        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
        $objWriter->save($tempFile);

        if ($tempLogo && file_exists($tempLogo)) {
            @unlink($tempLogo);
        }

        return response()->download($tempFile, $fileName, [
            'Content-Type' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
        ])->deleteFileAfterSend(true);
    }
}
