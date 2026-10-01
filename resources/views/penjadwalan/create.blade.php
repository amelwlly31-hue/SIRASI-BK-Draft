<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tambah Jadwal BK - SIRASI-BK</title>

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

        button,
        input,
        select,
        textarea {
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

        /* FORM CARD */

        .form-card {
            position: relative;
            overflow: hidden;

            border: 1px solid var(--border);
            border-radius: 20px;

            background: white;

            box-shadow: var(--shadow-md);
        }

        .form-card::before {
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

        .form-header {
            display: flex;
            align-items: center;
            gap: 12px;

            padding: 22px 25px;

            border-bottom: 1px solid var(--border);
        }

        .form-header-icon {
            width: 42px;
            height: 42px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 12px;

            background: var(--primary-light);
            color: var(--primary);
        }

        .form-header-title {
            font-size: 14px;
            font-weight: 800;
        }

        .form-header-description {
            margin-top: 3px;

            color: var(--muted);

            font-size: 10px;
        }

        .form-body {
            padding: 25px;
        }

        .form-grid {
            display: grid;

            grid-template-columns: 1fr 1fr;

            gap: 20px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 7px;
        }

        .form-group.full {
            grid-column: 1 / -1;
        }

        .form-label {
            color: #4e596b;

            font-size: 11px;
            font-weight: 800;
        }

        .required {
            color: var(--danger);
        }

        .form-control {
            width: 100%;
            height: 43px;

            padding: 0 12px;

            border: 1px solid var(--border);
            border-radius: 10px;

            outline: none;

            background: #fafbfc;

            color: var(--text);

            font-size: 11px;

            transition: .2s ease;
        }

        textarea.form-control {
            height: 110px;
            padding: 12px;
            resize: vertical;
        }

        .form-control:focus {
            background: white;
            border-color: #91a8df;

            box-shadow:
                0 0 0 4px rgba(23,60,145,.05);
        }

        .form-error {
            color: var(--danger);
            font-size: 9px;
        }

        .form-help {
            color: #9299a7;
            font-size: 9px;
        }

        /* BUTTONS */

        .form-footer {
            display: flex;
            align-items: center;
            justify-content: flex-end;

            gap: 10px;

            padding: 18px 25px;

            border-top: 1px solid var(--border);

            background: #fcfcfd;
        }

        .btn {
            min-height: 42px;

            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;

            padding: 0 16px;

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

            box-shadow:
                0 8px 20px rgba(23,60,145,.18);
        }

        .btn-primary:hover {
            background: var(--primary-dark);
        }

        /* ALERT */

        .alert {
            margin-bottom: 18px;

            padding: 13px 15px;

            border: 1px solid #f0caca;
            border-radius: 10px;

            background: var(--danger-bg);

            color: var(--danger);

            font-size: 11px;
        }

        .alert ul {
            margin: 7px 0 0 17px;
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

            .form-grid {
                grid-template-columns: 1fr;
            }

            .form-group.full {
                grid-column: auto;
            }

            .form-footer {
                flex-direction: column-reverse;
                align-items: stretch;
            }

            .form-footer .btn {
                width: 100%;
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

        html.dark-mode .form-card {
            background: #162238 !important;
            border-color: #2a3953 !important;
        }

        html.dark-mode .form-header,
        html.dark-mode .form-footer {
            border-color: #2a3953 !important;
            background: #18263c !important;
        }

        html.dark-mode .form-label,
        html.dark-mode .form-header-title {
            color: #eef3ff !important;
        }

        html.dark-mode .form-header-description,
        html.dark-mode .page-description {
            color: #8f9db2 !important;
        }

        html.dark-mode .form-control,
        html.dark-mode .btn,
        html.dark-mode .notification {
            background: #1b2a42 !important;
            border-color: #33445f !important;
            color: #e7ecf7 !important;
        }

        html.dark-mode .form-control:focus {
            background: #1b2a42 !important;
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

            <div class="page-heading">

                <div class="eyebrow">
                    Manajemen Bimbingan Konseling
                </div>

                <h1 class="page-title">
                    Tambah Jadwal BK
                </h1>

                <p class="page-description">
                    Tambahkan jadwal bimbingan konseling untuk siswa.
                </p>

            </div>


                        @if ($errors->any())

                <div class="alert">

                    <strong>
                        Terdapat kesalahan pada data yang dimasukkan.
                    </strong>

                    <ul>

                        @foreach ($errors->all() as $error)

                            <li>{{ $error }}</li>

                        @endforeach

                    </ul>

                </div>

            @endif


            <form
                action="{{ route('penjadwalan.store') }}"
                method="POST"
                class="form-card"
            >

                @csrf

                <div class="form-header">

                    <div class="form-header-icon">
                        <i data-lucide="calendar-plus"></i>
                    </div>

                    <div>

                        <div class="form-header-title">
                            Informasi Jadwal
                        </div>

                        <div class="form-header-description">
                            Isi data jadwal bimbingan dengan lengkap.
                        </div>

                    </div>

                </div>


                <div class="form-body">

                    <div class="form-grid">

                                                <div class="form-group full">

                            <label class="form-label">
                                Siswa <span class="required">*</span>
                            </label>

                            <select
                                name="id_siswa"
                                class="form-control"
                                required
                            >

                                <option value="">
                                    -- Pilih Siswa --
                                </option>

                                @foreach ($siswa as $item)

                                    <option
                                        value="{{ $item->id_siswa }}"
                                        {{ old('id_siswa') == $item->id_siswa ? 'selected' : '' }}
                                    >
                                        {{ $item->nama_siswa }}
                                        -
                                        {{ $item->kelas->nama_kelas ?? 'Tanpa Kelas' }}
                                        (NIS: {{ $item->nis }})
                                    </option>

                                @endforeach

                            </select>

                            <div class="form-help">
                                Hanya siswa dengan status aktif yang ditampilkan.
                            </div>

                            @error('id_siswa')
                                <div class="form-error">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>


                                                <div class="form-group">

                            <label class="form-label">
                                Tanggal <span class="required">*</span>
                            </label>

                            <input
                                type="date"
                                name="tanggal"
                                value="{{ old('tanggal') }}"
                                class="form-control"
                                required
                            >

                            @error('tanggal')
                                <div class="form-error">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>


                        <div class="form-group">

                            <label class="form-label">
                                Jenis Bimbingan <span class="required">*</span>
                            </label>

                            <input
                                type="text"
                                name="jenis_bimbingan"
                                value="{{ old('jenis_bimbingan') }}"
                                class="form-control"
                                placeholder="Contoh: Konseling Individu"
                                required
                            >

                            @error('jenis_bimbingan')
                                <div class="form-error">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>


                        <div class="form-group">

                            <label class="form-label">
                                Waktu Mulai <span class="required">*</span>
                            </label>

                            <input
                                type="time"
                                name="waktu_mulai"
                                value="{{ old('waktu_mulai') }}"
                                class="form-control"
                                required
                            >

                            @error('waktu_mulai')
                                <div class="form-error">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>


                        <div class="form-group">

                            <label class="form-label">
                                Waktu Selesai <span class="required">*</span>
                            </label>

                            <input
                                type="time"
                                name="waktu_selesai"
                                value="{{ old('waktu_selesai') }}"
                                class="form-control"
                                required
                            >

                            @error('waktu_selesai')
                                <div class="form-error">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>


                                                <div class="form-group full">

                            <label class="form-label">
                                Catatan
                            </label>

                            <textarea
                                name="catatan"
                                class="form-control"
                                placeholder="Tambahkan catatan jika diperlukan..."
                            >{{ old('catatan') }}</textarea>

                            @error('catatan')
                                <div class="form-error">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                    </div>

                </div>


                <div class="form-footer">

                    <a
                        href="{{ route('penjadwalan.index') }}"
                        class="btn"
                    >
                        <i data-lucide="arrow-left"></i>
                        Batal
                    </a>

                    <button
                        type="submit"
                        class="btn btn-primary"
                    >
                        <i data-lucide="save"></i>
                        Simpan Jadwal
                    </button>

                </div>

            </form>

        </section>

    </main>

</div>


<script>
    lucide.createIcons();
</script>

</body>

</html>
