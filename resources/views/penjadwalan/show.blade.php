<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Detail Jadwal BK - SIRASI-BK</title>

    @include('partials.theme')

    <script src="https://unpkg.com/lucide@latest"></script>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary: #173c91;
            --primary-dark: #102d70;
            --primary-light: #eaf0ff;
            --bg: #f5f7fb;
            --white: #fff;
            --text: #172033;
            --muted: #737b8c;
            --border: #e3e7ef;
            --success: #16894a;
            --success-bg: #eaf8f0;
            --danger: #d64545;
            --danger-bg: #fff0f0;
            --shadow-sm: 0 4px 14px rgba(23, 60, 145, .05);
            --shadow-md: 0 12px 30px rgba(23, 60, 145, .08);
        }

        body {
            font-family: Inter, "Segoe UI", Arial, sans-serif;
            background: var(--bg);
            color: var(--text);
        }

        a {
            text-decoration: none;
        }

        button {
            font-family: inherit;
        }

        .app {
            min-height: 100vh;
        }

        /* SIDEBAR */

        .sidebar {
            width: 270px;
            min-height: 100vh;

            position: fixed;
            left: 0;
            top: 0;
            bottom: 0;
            z-index: 50;

            display: flex;
            flex-direction: column;

            padding: 24px 16px;

            background:
                linear-gradient(
                    180deg,
                    #193f96 0%,
                    #173887 52%,
                    #112e70 100%
                );

            color: white;

            box-shadow:
                12px 0 35px rgba(15, 45, 112, .10);
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 13px;
            padding: 4px 10px 28px;
        }

        .brand-logo {
            width: 55px;
            height: 55px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 14px;
            background: rgba(255,255,255,.14);
            border: 1px solid rgba(255,255,255,.20);
        }

        .brand-logo img {
            width: 200px;
            height: 150px;
            object-fit: contain;
            transform: translateY(20px);
        }

        .brand-name {
            font-size: 19px;
            font-weight: 800;
        }

        .brand-subtitle {
            margin-top: 4px;
            color: #cbd8ff;
            font-size: 11px;
        }

        .menu-title {
            padding: 4px 12px 10px;
            color: #9eb2e9;
            font-size: 10px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .menu {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        .menu-item {
            min-height: 47px;

            display: flex;
            align-items: center;
            gap: 13px;

            padding: 0 14px;

            border-radius: 12px;

            color: #d2dcfa;

            font-size: 13.5px;
            font-weight: 500;

            border: 1px solid transparent;

            transition: .2s ease;
        }

        .menu-item:hover {
            color: white;
            background: rgba(255,255,255,.09);
        }

        .menu-item.active {
            color: white;

            background:
                linear-gradient(
                    90deg,
                    rgba(255,255,255,.17),
                    rgba(255,255,255,.08)
                );

            border-color: rgba(255,255,255,.10);

            box-shadow:
                inset 3px 0 0 #9db9ff,
                0 8px 20px rgba(0,0,0,.08);
        }

        .menu-icon {
            width: 25px;
            height: 25px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 8px;

            background: rgba(255,255,255,.07);
        }

        .sidebar-bottom {
            margin-top: auto;
            padding-top: 20px;
        }

        .logout-button {
            width: 100%;
            border: 0;
            background: transparent;
            cursor: pointer;
            text-align: left;
        }

        /* MAIN */

        .main {
            min-height: 100vh;
            margin-left: 270px;
        }

        /* HEADER */

        .header {
            height: 76px;

            display: flex;
            align-items: center;
            justify-content: space-between;

            padding: 0 32px;

            background: rgba(255,255,255,.88);
            backdrop-filter: blur(14px);

            border-bottom: 1px solid rgba(226,230,238,.8);

            position: sticky;
            top: 0;
            z-index: 40;
        }

        .profile-area {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .notification {
            width: 38px;
            height: 38px;

            display: flex;
            align-items: center;
            justify-content: center;

            border: 1px solid var(--border);
            border-radius: 11px;

            background: white;
            color: #5c6575;

            cursor: pointer;
        }

        .profile {
            display: flex;
            align-items: center;
            gap: 11px;

            padding-left: 18px;

            border-left: 1px solid var(--border);
        }

        .profile-info {
            text-align: right;
        }

        .profile-name {
            font-size: 13px;
            font-weight: 700;
        }

        .profile-role {
            margin-top: 3px;
            color: var(--muted);
            font-size: 11px;
        }

        .profile-photo {
            width: 40px;
            height: 40px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 12px;

            background: #e8eeff;
            color: var(--primary);
        }

        .profile-photo img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 12px;
        }

        /* CONTENT */

        .content {
            padding: 32px;
            max-width: 1200px;
            margin: auto;
        }

        .page-heading {
            display: flex;
            align-items: flex-end;
            justify-content: space-between;
            gap: 20px;

            margin-bottom: 22px;
        }

        .eyebrow {
            margin-bottom: 7px;

            color: var(--primary);

            font-size: 10px;
            font-weight: 800;

            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .page-title {
            font-size: 28px;
            font-weight: 800;
        }

        .page-description {
            margin-top: 7px;

            color: var(--muted);

            font-size: 13px;
            line-height: 1.6;
        }

        /* BUTTON */

        .btn {
            min-height: 42px;

            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;

            padding: 0 15px;

            border: 1px solid var(--border);
            border-radius: 10px;

            background: white;
            color: #596375;

            font-size: 11px;
            font-weight: 700;

            cursor: pointer;

            transition: .2s ease;
        }

        .btn:hover {
            transform: translateY(-1px);
            box-shadow: var(--shadow-sm);
        }

        .btn-primary {
            border-color: var(--primary);

            background:
                linear-gradient(
                    135deg,
                    #2149a2,
                    #173c91
                );

            color: white;
        }

        .btn-danger {
            border-color: #efcccc;
            background: var(--danger-bg);
            color: var(--danger);
        }

        /* DETAIL CARD */

        .detail-card {
            position: relative;
            overflow: hidden;

            border: 1px solid var(--border);
            border-radius: 20px;

            background: white;

            box-shadow: var(--shadow-md);
        }

        .detail-card::before {
            content: "";

            position: absolute;

            left: 0;
            top: 0;

            width: 4px;
            height: 100%;

            background:
                linear-gradient(
                    180deg,
                    #173c91,
                    #6f8fd9
                );
        }

        .detail-header {
            display: flex;
            align-items: center;
            justify-content: space-between;

            gap: 20px;

            padding: 22px 25px;

            border-bottom: 1px solid var(--border);
        }

        .detail-title-wrap {
            display: flex;
            align-items: center;
            gap: 13px;
        }

        .detail-icon {
            width: 46px;
            height: 46px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 13px;

            background: var(--primary-light);
            color: var(--primary);
        }

        .detail-title {
            font-size: 15px;
            font-weight: 800;
        }

        .detail-subtitle {
            margin-top: 4px;

            color: var(--muted);

            font-size: 10px;
        }

        /* STATUS */

        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;

            padding: 7px 11px;

            border-radius: 9px;

            font-size: 9px;
            font-weight: 800;
        }

        .status-dot {
            width: 6px;
            height: 6px;
            border-radius: 50%;
        }

        .status-badge.terjadwal {
            background: var(--primary-light);
            color: var(--primary);
        }

        .status-badge.terjadwal .status-dot {
            background: var(--primary);
        }

        .status-badge.selesai {
            background: var(--success-bg);
            color: var(--success);
        }

        .status-badge.selesai .status-dot {
            background: var(--success);
        }

        .status-badge.dibatalkan {
            background: var(--danger-bg);
            color: var(--danger);
        }

        .status-badge.dibatalkan .status-dot {
            background: var(--danger);
        }

        /* BODY */

        .detail-body {
            padding: 25px;
        }

        .student-section {
            display: flex;
            align-items: center;
            gap: 15px;

            margin-bottom: 25px;

            padding: 17px;

            border: 1px solid #dce4f5;
            border-radius: 14px;

            background: #f8faff;
        }

        .student-avatar {
            width: 52px;
            height: 52px;

            flex-shrink: 0;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 14px;

            background:
                linear-gradient(
                    135deg,
                    #dfe8ff,
                    #cbd9ff
                );

            color: var(--primary);

            font-size: 17px;
            font-weight: 800;
        }

        .student-name {
            font-size: 15px;
            font-weight: 800;
        }

        .student-info {
            margin-top: 4px;

            color: var(--muted);

            font-size: 10px;
        }

        /* INFORMATION GRID */

        .section-title {
            display: flex;
            align-items: center;
            gap: 8px;

            margin-bottom: 15px;

            color: var(--text);

            font-size: 12px;
            font-weight: 800;
        }

        .section-title i {
            color: var(--primary);
        }

        .info-grid {
            display: grid;

            grid-template-columns: 1fr 1fr;

            gap: 13px;
        }

        .info-item {
            padding: 15px;

            border: 1px solid var(--border);
            border-radius: 12px;

            background: #fcfcfd;
        }

        .info-label {
            margin-bottom: 6px;

            color: #8a92a2;

            font-size: 9px;
            font-weight: 800;

            text-transform: uppercase;
            letter-spacing: .4px;
        }

        .info-value {
            color: var(--text);

            font-size: 11px;
            font-weight: 700;
        }

        .info-value.primary {
            color: var(--primary);
        }

        .note-section {
            margin-top: 20px;
        }

        .note-box {
            min-height: 100px;

            padding: 15px;

            border: 1px solid var(--border);
            border-radius: 12px;

            background: #fcfcfd;

            color: #606a7a;

            font-size: 11px;
            line-height: 1.7;

            white-space: pre-line;
        }

        .empty-note {
            color: #9aa1ae;
            font-style: italic;
        }

        /* FOOTER */

        .detail-footer {
            display: flex;
            align-items: center;
            justify-content: space-between;

            gap: 10px;

            padding: 18px 25px;

            border-top: 1px solid var(--border);

            background: #fcfcfd;
        }

        .footer-left,
        .footer-right {
            display: flex;
            align-items: center;
            gap: 9px;
        }

        /* ALERT */

        .alert-success {
            margin-bottom: 18px;

            padding: 13px 15px;

            border: 1px solid #ccebd9;
            border-radius: 10px;

            background: var(--success-bg);

            color: var(--success);

            font-size: 11px;
        }

        /* RESPONSIVE */

        @media (max-width: 900px) {
            .sidebar {
                width: 220px;
            }

            .main {
                margin-left: 220px;
            }

            .header {
                padding: 0 20px;
            }

            .content {
                padding: 22px;
            }
        }

        @media (max-width: 700px) {
            .sidebar {
                position: relative;
                width: 100%;
                min-height: auto;
            }

            .main {
                margin-left: 0;
            }

            .page-heading,
            .detail-header {
                align-items: flex-start;
                flex-direction: column;
            }

            .info-grid {
                grid-template-columns: 1fr;
            }

            .detail-footer {
                flex-direction: column;
                align-items: stretch;
            }

            .footer-left,
            .footer-right {
                width: 100%;
            }

            .footer-left .btn,
            .footer-right .btn {
                flex: 1;
            }
        }

        /* DARK MODE */

        html.dark-mode body {
            background: #0f1728 !important;
            color: #e7ecf7 !important;
        }

        html.dark-mode .header {
            background: rgba(15,23,40,.94) !important;
            border-color: #24324a !important;
        }

        html.dark-mode .detail-card {
            background: #162238 !important;
            border-color: #2a3953 !important;
        }

        html.dark-mode .detail-header,
        html.dark-mode .detail-footer {
            border-color: #2a3953 !important;
            background: #18263c !important;
        }

        html.dark-mode .detail-title,
        html.dark-mode .section-title,
        html.dark-mode .student-name,
        html.dark-mode .info-value {
            color: #eef3ff !important;
        }

        html.dark-mode .detail-subtitle,
        html.dark-mode .student-info {
            color: #8f9db2 !important;
        }

        html.dark-mode .student-section,
        html.dark-mode .info-item,
        html.dark-mode .note-box {
            background: #1b2a42 !important;
            border-color: #33445f !important;
        }

        html.dark-mode .note-box {
            color: #b8c4d8 !important;
        }

        html.dark-mode .profile {
            border-color: #33445f !important;
        }

        html.dark-mode .profile-name {
            color: #eef3ff !important;
        }

        html.dark-mode .profile-role {
            color: #8996aa !important;
        }

        html.dark-mode .notification,
        html.dark-mode .btn {
            background: #1b2a42 !important;
            border-color: #33445f !important;
            color: #e7ecf7 !important;
        }

        html.dark-mode .btn-primary {
            background: var(--primary) !important;
            color: white !important;
        }

        html.dark-mode .btn-danger {
            background: #351e27 !important;
            color: #ff9a9a !important;
            border-color: #58313c !important;
        }
    </style>
</head>

<body>

<div class="app">

        <aside class="sidebar">

        <div class="brand">

            <div class="brand-logo">
                <img src="{{ asset('images/logo-smpn2-dramaga.png') }}" alt="Logo SMP Negeri 2 Dramaga">
            </div>

            <div>
                <div class="brand-name">SIRASI-BK</div>
                <div class="brand-subtitle">Sistem Informasi BK</div>
            </div>

        </div>

        <div class="menu-title">
            Menu Utama
        </div>

        <nav class="menu">

            <a
                    href="{{ route('dashboard') }}" class="menu-item">
                    <span class="menu-icon"><i data-lucide="home"></i></span>
                        Dashboard
                </a>

                <a
                    href="{{ route('siswa.index') }}" class="menu-item">
                    <span class="menu-icon"><i data-lucide="users-round"></i></span>
                    Data Siswa
                </a>

                                <a
                    href="{{ route('penjadwalan.index') }}" class="menu-item active">
                    <span class="menu-icon"><i data-lucide="calendar-clock"></i></span>
                        Penjadwalan
                </a>

                <a
                    href="{{ route('konseling.index') }}" class="menu-item">
                    <span class="menu-icon"> <i data-lucide="clipboard-list"></i></span>
                        Data Konseling
                </a>

                <a
                    href="{{ route('siswa.riwayat') }}" class="menu-item">
                    <span class="menu-icon"><i data-lucide="history"></i></span>
                        Riwayat Siswa
                </a>

                <a
                    href="{{ route('laporan.index') }}" class="menu-item">
                    <span class="menu-icon"><i data-lucide="file-chart-column"></i></span>
                    Laporan
                </a>

                <a
                    href="{{ route('pengaturan.index') }}" class="menu-item">
                    <span class="menu-icon"><i data-lucide="settings"></i></span>
                    Pengaturan
                </a>

        </nav>

        <div class="sidebar-bottom">

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button type="submit" class="menu-item logout-button">
                    <span class="menu-icon"><i data-lucide="log-out"></i></span>
                    Logout
                </button>
            </form>

        </div>

    </aside>

        <main class="main">

                <header class="header">

            <div></div>

            <div class="profile-area">

                <button class="notification" type="button">
                    <i data-lucide="bell"></i>
                </button>

                <div class="profile">

                    <div class="profile-info">

                        <div class="profile-name">
                            {{ auth()->user()->nama ?? auth()->user()->name ?? 'Admin BK' }}
                        </div>

                        <div class="profile-role">
                            Guru BK
                        </div>

                    </div>

                    <div class="profile-photo">

                        @if(auth()->user()->foto_profil)

                            <img
                                src="{{ asset('storage/' . auth()->user()->foto_profil) }}"
                                alt="Foto Profil"
                            >

                        @else

                            <i data-lucide="user"></i>

                        @endif

                    </div>

                </div>

            </div>

        </header>


                <section class="content">

            @if(session('success'))

                <div class="alert-success">
                    {{ session('success') }}
                </div>

            @endif


            <div class="page-heading">

                <div>

                    <div class="eyebrow">
                        Manajemen Bimbingan Konseling
                    </div>

                    <h1 class="page-title">
                        Detail Jadwal BK
                    </h1>

                    <p class="page-description">
                        Informasi lengkap mengenai jadwal bimbingan konseling siswa.
                    </p>

                </div>

                <a
                    href="{{ route('penjadwalan.index') }}"
                    class="btn"
                >
                    <i data-lucide="arrow-left"></i>
                    Kembali
                </a>

            </div>


                        <div class="detail-card">

                <div class="detail-header">

                    <div class="detail-title-wrap">

                        <div class="detail-icon">
                            <i data-lucide="calendar-clock"></i>
                        </div>

                        <div>

                            <div class="detail-title">
                                Jadwal Bimbingan Konseling
                            </div>

                            <div class="detail-subtitle">
                                ID Jadwal #{{ $penjadwalan->id_penjadwalan }}
                            </div>

                        </div>

                    </div>


                    <span class="status-badge {{ strtolower($penjadwalan->status) }}">

                        <span class="status-dot"></span>

                        {{ $penjadwalan->status }}

                    </span>

                </div>


                <div class="detail-body">

                                        <div class="student-section">

                        <div class="student-avatar">
                            {{ strtoupper(substr($penjadwalan->siswa->nama_siswa ?? '?', 0, 1)) }}
                        </div>

                        <div>

                            <div class="student-name">
                                {{ $penjadwalan->siswa->nama_siswa ?? '-' }}
                            </div>

                            <div class="student-info">
                                NIS: {{ $penjadwalan->siswa->nis ?? '-' }}
                                &nbsp; • &nbsp;
                                Kelas: {{ $penjadwalan->siswa->kelas->nama_kelas ?? '-' }}
                            </div>

                        </div>

                    </div>


                                        <div class="section-title">

                        <i data-lucide="calendar"></i>

                        Informasi Jadwal

                    </div>


                    <div class="info-grid">

                        <div class="info-item">

                            <div class="info-label">
                                Tanggal
                            </div>

                            <div class="info-value">

                                {{ \Carbon\Carbon::parse($penjadwalan->tanggal)->translatedFormat('l, d F Y') }}

                            </div>

                        </div>


                        <div class="info-item">

                            <div class="info-label">
                                Waktu
                            </div>

                            <div class="info-value">

                                {{ \Carbon\Carbon::parse($penjadwalan->waktu_mulai)->format('H:i') }}
                                -
                                {{ \Carbon\Carbon::parse($penjadwalan->waktu_selesai)->format('H:i') }}
                                WIB

                            </div>

                        </div>


                        <div class="info-item">

                            <div class="info-label">
                                Jenis Bimbingan
                            </div>

                            <div class="info-value primary">
                                {{ $penjadwalan->jenis_bimbingan }}
                            </div>

                        </div>


                        <div class="info-item">

                            <div class="info-label">
                                Status
                            </div>

                            <div class="info-value">
                                {{ $penjadwalan->status }}
                            </div>

                        </div>

                    </div>


                                        <div class="note-section">

                        <div class="section-title">

                            <i data-lucide="file-text"></i>

                            Catatan

                        </div>


                        <div class="note-box">

                            @if($penjadwalan->catatan)

                                {{ $penjadwalan->catatan }}

                            @else

                                <span class="empty-note">
                                    Tidak ada catatan untuk jadwal ini.
                                </span>

                            @endif

                        </div>

                    </div>

                </div>


                                <div class="detail-footer">

                    <div class="footer-left">

                        <a
                            href="{{ route('penjadwalan.index') }}"
                            class="btn"
                        >
                            <i data-lucide="arrow-left"></i>
                            Kembali
                        </a>

                    </div>


                    <div class="footer-right">

                        <a
                            href="{{ route('penjadwalan.edit', $penjadwalan->id_penjadwalan) }}"
                            class="btn btn-primary"
                        >
                            <i data-lucide="pencil"></i>
                            Edit Jadwal
                        </a>


                        <form
                            action="{{ route('penjadwalan.destroy', $penjadwalan->id_penjadwalan) }}"
                            method="POST"
                            onsubmit="return confirm('Yakin ingin menghapus jadwal ini?')"
                        >

                            @csrf
                            @method('DELETE')

                            <button
                                type="submit"
                                class="btn btn-danger"
                            >
                                <i data-lucide="trash-2"></i>
                                Hapus
                            </button>

                        </form>

                    </div>

                </div>

            </div>

        </section>

    </main>

</div>


<script>
    lucide.createIcons();
</script>

</body>

</html>
