<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Panggilan Orang Tua - SIRASI-BK</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 30px;
            background: #f1f5f9;
            font-family: "Times New Roman", Times, serif;
            color: #111827;
        }

        .page {
            width: 210mm;
            min-height: 297mm;
            margin: auto;
            padding: 25mm 25mm 25mm 30mm;
            background: white;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        }

        .kop {
            position: relative;
            padding-bottom: 14px;
            border-bottom: 3px solid #111827;
        }

        .kop-logo {
            position: absolute;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
            width: 75px;
            height: 69px;
            overflow: hidden;
        }

        .kop-logo img {
            display: block;
            width: 290px;
            height: 224px;
            margin-left: -107px;
            margin-top: -45px;
        }

        .kop-text {
            width: 100%;
            text-align: center;
        }

        .kop-text h1 {
            margin: 0;
            font-size: 18px;
            font-weight: bold;
            line-height: 1.25;
        }

        .kop-text h2 {
            margin: 3px 0;
            font-size: 20px;
            font-weight: bold;
            line-height: 1.25;
        }

        .kop-text p {
            margin: 2px 0 0;
            font-size: 12px;
        }

        .judul {
            text-align: center;
            margin-top: 30px;
        }

        .judul h3 {
            margin: 0;
            font-size: 16px;
            text-decoration: underline;
        }

        .judul p {
            margin-top: 4px;
            font-size: 12px;
        }

        .isi {
            margin-top: 25px;
            font-size: 14px;
            line-height: 1.7;
        }

        .identitas {
            margin: 15px 0 15px 35px;
        }

        .identitas-row {
            display: flex;
            margin-bottom: 4px;
        }

        .identitas-label {
            width: 120px;
        }

        .identitas-separator {
            width: 20px;
        }

        .isi p {
            margin: 0 0 12px;
            text-align: justify;
        }

        .penutup {
            margin-top: 25px;
        }

        .ttd {
            width: 250px;
            margin-left: auto;
            margin-top: 45px;
            text-align: center;
            font-size: 14px;
        }

        .ttd-space {
            height: 75px;
        }

        .ttd-nama {
            font-weight: bold;
            text-decoration: underline;
        }

        .actions {
            width: 210mm;
            margin: 0 auto 20px;
            display: flex;
            justify-content: flex-end;
            gap: 10px;
        }

        .btn {
            border: none;
            padding: 10px 18px;
            border-radius: 8px;
            cursor: pointer;
            font-family: Arial, sans-serif;
            font-size: 13px;
            font-weight: 600;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .btn-print {
            background: #2563eb;
            color: white;
        }

        .btn-download {
            background: #16a34a;
            color: white;
            gap: 6px;
        }

        .btn-download:hover {
            background: #15803d;
        }

        .btn-back {
            background: #e5e7eb;
            color: #111827;
        }

        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-menu {
            display: none;
            position: absolute;
            right: 0;
            top: calc(100% + 6px);
            background: white;
            min-width: 220px;
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 8px 10px -6px rgba(0, 0, 0, 0.1);
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            overflow: hidden;
            z-index: 50;
        }

        .dropdown-menu.show {
            display: block;
        }

        .dropdown-item {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 11px 16px;
            font-family: Arial, sans-serif;
            font-size: 13px;
            font-weight: 500;
            color: #1f2937;
            text-decoration: none;
            transition: background 0.15s ease;
            white-space: nowrap;
        }

        .dropdown-item:hover {
            background: #f3f4f6;
            color: #111827;
        }

        .dropdown-item:first-child {
            border-bottom: 1px solid #f3f4f6;
        }

        .item-icon {
            font-size: 15px;
        }

        @media print {
            body {
                padding: 0;
                background: white;
            }

            .page {
                width: 210mm;
                min-height: 297mm;
                margin: 0;
                padding: 25mm 25mm 25mm 30mm;
                box-shadow: none;
            }

            .actions {
                display: none;
            }
        }

        @media (max-width: 800px) {
            body {
                padding: 10px;
            }

            .actions {
                width: 100%;
                justify-content: center;
            }

            .page {
                width: 100%;
                min-height: auto;
                padding: 25px;
            }

            .kop-logo {
                width: 60px;
                height: 55px;
            }

            .kop-logo img {
                width: 232px;
                height: 179px;
                margin-left: -86px;
                margin-top: -36px;
            }

            .kop-text h1 {
                font-size: 14px;
            }

            .kop-text h2 {
                font-size: 16px;
            }

            .kop-text p {
                font-size: 9px;
            }
        }

        @media (max-width: 520px) {
            .kop {
                display: flex;
                flex-direction: column;
                align-items: center;
                gap: 10px;
            }

            .kop-logo {
                position: static;
                transform: none;
            }
        }
    </style>
</head>

<body>

    <div class="actions">
        <a
            href="{{ route('siswa.show', $siswa->id_siswa) }}"
            class="btn btn-back"
        >
            Kembali
        </a>

        <button
            type="button"
            class="btn btn-print"
            onclick="window.print()"
        >
            Cetak Surat
        </button>

        <div class="dropdown">
            <button
                type="button"
                class="btn btn-download"
                id="btnUnduh"
                aria-haspopup="true"
                aria-expanded="false"
            >
                ⬇ Unduh
            </button>
            <div class="dropdown-menu" id="dropdownMenu">
                <a
                    href="{{ route('siswa.surat_panggilan.pdf', $siswa->id_siswa) }}"
                    class="dropdown-item"
                >
                    <span class="item-icon">📄</span> Download PDF
                </a>
                <a
                    href="{{ route('siswa.surat_panggilan.docx', $siswa->id_siswa) }}"
                    class="dropdown-item"
                >
                    <span class="item-icon">📝</span> Download Word (.DOCX)
                </a>
            </div>
        </div>
    </div>

    <div class="page">

                <div class="kop">
            <div class="kop-logo">
                <img
                    src="{{ asset('images/logo-smpn2-dramaga.png') }}"
                    alt="Logo SMP Negeri 2 Dramaga"
                >
            </div>

            <div class="kop-text">
                <h1>PEMERINTAH KABUPATEN BOGOR</h1>
                <h2>SMP NEGERI 2 DRAMAGA</h2>
                <p>Jl. Raya Dramaga Km 7 Dramaga Bogor Kode Pos 16680</p>
            </div>
        </div>

                <div class="judul">
            <h3>SURAT PANGGILAN ORANG TUA/WALI</h3>
            <p>Nomor: .................................</p>
        </div>

                <div class="isi">

            <p>
                Yth. Bapak/Ibu Orang Tua/Wali dari:
            </p>

            <div class="identitas">

                <div class="identitas-row">
                    <span class="identitas-label">Nama Siswa</span>
                    <span class="identitas-separator">:</span>
                    <strong>{{ $siswa->nama_siswa }}</strong>
                </div>

                <div class="identitas-row">
                    <span class="identitas-label">NIS</span>
                    <span class="identitas-separator">:</span>
                    <span>{{ $siswa->nis }}</span>
                </div>

                <div class="identitas-row">
                    <span class="identitas-label">Kelas</span>
                    <span class="identitas-separator">:</span>
                    <span>
                        @if(str_starts_with($siswa->kelas->nama_kelas ?? '', (string)($siswa->kelas->tingkat ?? '')))
                            {{ $siswa->kelas->nama_kelas ?? '-' }}
                        @else
                            {{ $siswa->kelas->tingkat ?? '-' }} {{ $siswa->kelas->nama_kelas ?? '' }}
                        @endif
                    </span>
                </div>

            </div>

            <p>
                Dengan hormat,
            </p>

            <p>
                Sehubungan dengan hasil pemantauan dan pelaksanaan layanan
                bimbingan dan konseling di sekolah, kami bermaksud mengundang
                Bapak/Ibu Orang Tua/Wali untuk hadir ke sekolah guna
                membicarakan perkembangan serta tindak lanjut bimbingan
                terhadap putra/putri Bapak/Ibu.
            </p>

            <p>
                Berdasarkan data pada Sistem Informasi Riwayat dan Administrasi
                Bimbingan Konseling, siswa tersebut telah mengikuti
                <strong>{{ $totalKonseling }} sesi konseling</strong>.
            </p>

            <p>
                Oleh karena itu, kami mengharapkan kehadiran Bapak/Ibu untuk
                dapat berdiskusi bersama Guru Bimbingan dan Konseling mengenai
                perkembangan siswa dan langkah pembinaan yang diperlukan.
            </p>

            <div class="identitas">

                <div class="identitas-row">
                    <span class="identitas-label">Hari/Tanggal</span>
                    <span class="identitas-separator">:</span>
                    <span>................................................</span>
                </div>

                <div class="identitas-row">
                    <span class="identitas-label">Waktu</span>
                    <span class="identitas-separator">:</span>
                    <span>................................................</span>
                </div>

                <div class="identitas-row">
                    <span class="identitas-label">Tempat</span>
                    <span class="identitas-separator">:</span>
                    <span>Ruang Bimbingan dan Konseling</span>
                </div>

            </div>

            <p class="penutup">
                Demikian surat panggilan ini kami sampaikan. Atas perhatian
                dan kerja sama Bapak/Ibu, kami ucapkan terima kasih.
            </p>

        </div>

                <div class="ttd">

            <p>
                @php
                    $bulanIndonesia = [
                        1 => 'Januari',
                        2 => 'Februari',
                        3 => 'Maret',
                        4 => 'April',
                        5 => 'Mei',
                        6 => 'Juni',
                        7 => 'Juli',
                        8 => 'Agustus',
                        9 => 'September',
                        10 => 'Oktober',
                        11 => 'November',
                        12 => 'Desember',
                    ];
                @endphp

                Dramaga, {{ date('d') }} {{ $bulanIndonesia[(int) date('m')] }} {{ date('Y') }}
            </p>

            <p>
                Guru Bimbingan dan Konseling
            </p>

            <div class="ttd-space"></div>

            <p class="ttd-nama">
                ........................................
            </p>

            <p>
                NIP. ....................................
            </p>

        </div>

    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const btnUnduh = document.getElementById('btnUnduh');
            const dropdownMenu = document.getElementById('dropdownMenu');

            if (btnUnduh && dropdownMenu) {
                btnUnduh.addEventListener('click', function (e) {
                    e.stopPropagation();
                    const isExpanded = dropdownMenu.classList.toggle('show');
                    btnUnduh.setAttribute('aria-expanded', isExpanded ? 'true' : 'false');
                });

                document.addEventListener('click', function (e) {
                    if (!dropdownMenu.contains(e.target) && e.target !== btnUnduh) {
                        dropdownMenu.classList.remove('show');
                        btnUnduh.setAttribute('aria-expanded', 'false');
                    }
                });

                document.addEventListener('keydown', function (e) {
                    if (e.key === 'Escape') {
                        dropdownMenu.classList.remove('show');
                        btnUnduh.setAttribute('aria-expanded', 'false');
                    }
                });
            }
        });
    </script>
</body>
</html>
