<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Konseling - SIRASI-BK</title>

    @include('partials.theme')

    <style>

        * {
            box-sizing: border-box;
        }

        :root {
            --primary: #21499e;
            --primary-dark: #17377f;
            --ink: #17233b;
            --muted: #73809a;
            --bg: #f4f7fc;
            --card: #ffffff;
            --line: #e2e8f3;
            --soft: #eef4ff;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            margin: 0;
            font-family: Inter, "Segoe UI", Arial, sans-serif;
            background:
                radial-gradient(circle at 90% 0%, rgba(70,112,207,.10), transparent 28%),
                linear-gradient(180deg, #f8faff 0%, var(--bg) 48%, #f2f5fb 100%);
            color: var(--ink);
        }

        a {
            color: inherit;
        }

        button,
        input,
        select,
        textarea {
            font-family: inherit;
        }

        
        .app {
            min-height: 100vh;
            display: flex;
        }

        .sidebar {
            width: 270px;
            min-height: 100vh;
            flex-shrink: 0;
            padding: 22px 15px;
            background:
                linear-gradient(180deg, #21499e 0%, #1b408f 48%, #153575 100%);
            box-shadow: 12px 0 36px rgba(17,48,113,.14);
            color: #fff;
            display: flex;
            flex-direction: column;
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
            flex-shrink: 0;
            border-radius: 14px;
            background: linear-gradient(145deg, rgba(255,255,255,.20), rgba(255,255,255,.08));
            border: 1px solid rgba(255,255,255,.25);
            box-shadow: inset 0 1px 0 rgba(255,255,255,.20), 0 9px 22px rgba(0,0,0,.12);
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .brand-logo img {
            width: 200px;
            height: 150px;
            object-fit: contain;
            transform: translateY(20px);
        }

        .brand-name {
            color: #fff;
            font-size: 16px;
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
            gap: 6px;
        }

        .sidebar-bottom {
            margin-top: auto;
            padding-top: 20px;
        }

        .menu-item {
            position: relative;
            width: 100%;
            min-height: 46px;
            border: 1px solid transparent;
            border-radius: 13px;
            color: #dce5ff;
            text-decoration: none;
            font-size: 13.5px;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 13px;
            padding: 0 14px;
            transition: background .20s ease, color .20s ease, transform .20s ease, box-shadow .20s ease, border-color .20s ease;
        }

        .menu-item::after {
            content: "";
            position: absolute;
            left: 10px;
            right: 10px;
            bottom: 5px;
            height: 2px;
            border-radius: 999px;
            background: linear-gradient(90deg, transparent, rgba(160,195,255,.75), transparent);
            transform: scaleX(0);
            opacity: 0;
            transition: .22s ease;
        }

        .menu-item:hover {
            color: #fff;
            background: linear-gradient(90deg, rgba(255,255,255,.13), rgba(255,255,255,.06));
            border-color: rgba(255,255,255,.08);
            transform: translateX(2px);
            box-shadow: 0 7px 18px rgba(6,28,75,.10);
        }

        .menu-item:hover::after {
            transform: scaleX(1);
            opacity: 1;
        }

        .menu-item.active {
            color: #fff;
            background: linear-gradient(90deg, rgba(255,255,255,.17), rgba(255,255,255,.07));
            border-color: rgba(255,255,255,.12);
            box-shadow: inset 3px 0 0 #a7c3ff, 0 9px 22px rgba(5,28,74,.13);
        }

        .menu-item.active::after {
            transform: scaleX(1);
            opacity: .9;
        }

        .menu-icon {
            width: 25px;
            height: 25px;
            flex-shrink: 0;
            border-radius: 8px;
            background: rgba(255,255,255,.085);
            border: 1px solid rgba(255,255,255,.035);
            display: flex;
            align-items: center;
            justify-content: center;
            transition: .2s ease;
        }

        .menu-icon svg,
        .menu-icon i {
            width: 17px;
            height: 17px;
        }

        .menu-item:hover .menu-icon {
            background: rgba(255,255,255,.15);
        }

        .menu-item.active .menu-icon {
            background: rgba(255,255,255,.14);
            box-shadow: inset 0 0 0 1px rgba(255,255,255,.06);
        }

        .logout-button {
            width: 100%;
            border: 0;
            border-radius: 13px;
            background: transparent;
            text-align: left;
            cursor: pointer;
            min-height: 46px;
        }

        .logout-button:hover {
            color: #fff;
            background: rgba(255,255,255,.09);
            transform: translateX(2px);
        }

        
        .main {
            flex: 1;
            min-width: 0;
        }

        .header {
            height: 76px;
            padding: 0 32px;
            background: rgba(255,255,255,.90);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border-bottom: 1px solid rgba(218,225,238,.85);
            box-shadow: 0 2px 18px rgba(25,48,95,.035);
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 24px;
        }

        .search {
            width: 100%;
            max-width: 430px;
            height: 42px;
            padding: 0 13px;
            border: 1px solid #e0e6f1;
            border-radius: 12px;
            background: rgba(248,250,254,.92);
            box-shadow: 0 4px 14px rgba(30,58,110,.045);
            display: flex;
            align-items: center;
            gap: 9px;
        }

        .search:focus-within {
            border-color: #9bb8ed;
            box-shadow: 0 0 0 4px rgba(40,85,183,.08), 0 8px 20px rgba(40,85,183,.06);
        }

        .search-icon {
            color: #8290a6;
            display: flex;
            align-items: center;
        }

        .search-icon svg {
            width: 16px;
            height: 16px;
        }

        .search input {
            width: 100%;
            border: 0;
            outline: 0;
            background: transparent;
            color: var(--ink);
            font-size: 13px;
        }

        .search input::placeholder {
            color: #9aa6b9;
        }

        .profile-area {
            margin-left: auto;
            display: flex;
            align-items: center;
            gap: 18px;
        }

        .notification {
            position: relative;
            width: 40px;
            height: 40px;
            border: 1px solid #e0e6f1;
            border-radius: 11px;
            background: #fff;
            color: #40516d;
            box-shadow: 0 4px 14px rgba(30,58,110,.045);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .notification svg {
            width: 17px;
            height: 17px;
        }

        .notification-dot {
            position: absolute;
            top: 8px;
            right: 8px;
            width: 5px;
            height: 5px;
            border-radius: 50%;
            background: #d65a65;
            border: 1px solid #fff;
        }

        .notification-wrapper {
            position: relative;
        }

        .notification {
            cursor: pointer;
        }

        .notification-dropdown {
            position: absolute;
            top: 48px;
            right: 0;
            width: 340px;
            max-height: 420px;
            overflow-y: auto;
            background: white;
            border: 1px solid #dfe6f1;
            border-radius: 14px;
            box-shadow: 0 15px 35px rgba(23,60,145,.14);
            display: none;
            z-index: 1000;
        }

        .notification-dropdown.show {
            display: block;
        }

        .notification-header {
            padding: 15px 17px;
            border-bottom: 1px solid #dfe6f1;
            font-size: 13px;
            color: #172542;
        }

        .notification-item {
            display: flex;
            gap: 11px;
            padding: 13px 15px;
            border-bottom: 1px solid #edf0f4;
            color: #172542;
            transition: .2s ease;
            text-decoration: none;
        }

        .notification-item:hover {
            background: #f7f9ff;
        }

        .notification-item-icon {
            width: 34px;
            height: 34px;
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 9px;
            background: #e8eeff;
            color: #254695;
        }

        .notification-item-content {
            min-width: 0;
        }

        .notification-item-content strong {
            display: block;
            font-size: 11px;
            font-weight: 800;
        }

        .notification-item-content p {
            margin-top: 4px;
            color: #8490a5;
            font-size: 10px;
            line-height: 1.45;
        }

        .notification-item-content small {
            display: block;
            margin-top: 5px;
            color: #9aa1ae;
            font-size: 8px;
        }

        .notification-empty {
            padding: 30px 20px;
            text-align: center;
            color: #8490a5;
        }

        .notification-empty svg {
            width: 28px;
            height: 28px;
            margin-bottom: 8px;
        }

        .notification-empty p {
            font-size: 11px;
        }

        .profile {
            padding-left: 17px;
            border-left: 1px solid #e0e6f0;
            display: flex;
            align-items: center;
            gap: 11px;
        }

        .profile-info {
            text-align: right;
        }

        .profile-name {
            color: #18243a;
            font-size: 13px;
            font-weight: 800;
        }

        .profile-role {
            margin-top: 3px;
            color: #7a8599;
            font-size: 11px;
        }

        .profile-photo {
            width: 40px;
            height: 40px;
            border-radius: 12px;
            background: #e8eeff;
            color: #2850a7;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .profile-photo svg {
            width: 18px;
            height: 18px;
        }

        .profile-photo img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 12px;
            display: block;
        }

        
        .content {
            padding: 32px;
        }

        .back-link,
        .back {
            width: 38px;
            height: 38px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 16px;
            border: 1px solid #dce4ef;
            border-radius: 11px;
            background: #fff;
            color: #23499f;
            text-decoration: none;
            box-shadow: 0 4px 14px rgba(28,55,103,.05);
            transition: transform .2s ease, box-shadow .2s ease;
        }

        .back-link svg,
        .back-link i,
        .back svg,
        .back i {
            width: 18px;
            height: 18px;
        }

        .back-link:hover,
        .back:hover {
            transform: translateX(-2px);
            box-shadow: 0 8px 18px rgba(28,55,103,.10);
        }

        .eyebrow {
            margin-bottom: 9px;
            color: #2850a7;
            font-size: 11px;
            font-weight: 800;
            letter-spacing: .12em;
            text-transform: uppercase;
        }

        h1,
        .page-title {
            margin: 0;
            color: #0f1f3c;
            font-size: 29px;
            font-weight: 800;
            line-height: 1.15;
            letter-spacing: -.7px;
        }

        .subtitle,
        .page-description {
            margin: 8px 0 25px;
            color: #74829a;
            font-size: 13px;
            line-height: 1.6;
        }

        .card {
            overflow: hidden;
            background: #ffffff;
            border: 1px solid #dfe6f1;
            border-radius: 20px;
            box-shadow: 0 14px 40px rgba(28,55,103,.07);
        }

        .card-header {
            min-height: 74px;
            padding: 0 24px;
            border-bottom: 1px solid #e2e8f3;
            background: linear-gradient(135deg, #f8faff 0%, #eef3ff 100%);
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .card-header-icon {
            width: 38px;
            height: 38px;
            border-radius: 11px;
            background: #e7eeff;
            color: #21499e;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .card-header-icon svg,
        .card-header-icon i {
            width: 17px;
            height: 17px;
        }

        .card-header-title {
            color: #172846;
            font-size: 14px;
            font-weight: 800;
        }

        .card-header-description {
            margin-top: 3px;
            color: #73809a;
            font-size: 11px;
            line-height: 1.5;
        }

        form {
            padding: 26px 24px;
        }

        .grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px 18px;
        }

        .form-group {
            min-width: 0;
            display: flex;
            flex-direction: column;
        }

        .full {
            grid-column: 1 / -1;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #1e293b;
            font-size: 12px;
            font-weight: 700;
        }

        .required {
            color: #e03b48;
            margin-left: 2px;
        }

        input,
        select,
        textarea {
            width: 100%;
            border: 1px solid #d4deec;
            border-radius: 11px;
            padding: 10px 14px;
            outline: none;
            color: #1a2844;
            background: #f8faff;
            font-size: 13px;
            font-family: inherit;
            transition: border-color .2s ease, box-shadow .2s ease, background .2s ease;
        }

        input,
        select {
            height: 44px;
        }

        textarea {
            min-height: 120px;
            resize: vertical;
            line-height: 1.6;
        }

        input:hover,
        select:hover,
        textarea:hover {
            border-color: #b8c8de;
        }

        input:focus,
        select:focus,
        textarea:focus {
            border-color: #21499e;
            background: #fff;
            box-shadow: 0 0 0 3px rgba(33,73,158,.12);
        }

        .error {
            margin-top: 6px;
            color: #d71920;
            font-size: 11px;
            font-weight: 600;
            line-height: 1.4;
        }

        .divider {
            height: 1px;
            margin: 24px 0 20px;
            border: 0;
            background: #e2e8f3;
        }

        .actions {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            gap: 12px;
        }

        .btn {
            min-height: 42px;
            padding: 0 18px;
            border-radius: 11px;
            border: 1px solid #d8e0ec;
            background: #fff;
            color: #243552;
            text-decoration: none;
            cursor: pointer;
            font-size: 12px;
            font-weight: 700;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            box-shadow: 0 2px 6px rgba(28,55,103,.04);
            transition: transform .2s ease, box-shadow .2s ease, background .2s ease;
        }

        .btn svg,
        .btn i {
            width: 15px;
            height: 15px;
            flex-shrink: 0;
        }

        .btn:hover {
            transform: translateY(-1px);
            box-shadow: 0 7px 16px rgba(30,55,100,.08);
            background: #f8faff;
        }

        .btn-primary {
            border-color: #21499e;
            background: #21499e;
            color: #fff;
            box-shadow: 0 8px 18px rgba(33,73,154,.20);
        }

        .btn-primary:hover {
            background: #17377f;
            border-color: #17377f;
        }

        @media (max-width: 1050px) {
            .sidebar {
                width: 250px;
            }
        }

        @media (max-width: 800px) {
            .grid {
                grid-template-columns: 1fr;
            }

            .full {
                grid-column: auto;
            }
        }

        @media (max-width: 750px) {
            .sidebar {
                width: 80px;
                padding: 20px 10px;
            }

            .brand {
                justify-content: center;
                padding-left: 0;
                padding-right: 0;
            }

            .brand-name,
            .brand-subtitle,
            .menu-title,
            .menu-item span:not(.menu-icon) {
                display: none;
            }

            .menu-item {
                justify-content: center;
                padding: 0;
            }

            .header {
                padding: 0 15px;
            }

            .search {
                max-width: 240px;
            }

            .profile-info {
                display: none;
            }

            .profile {
                padding-left: 12px;
            }

            .content {
                padding: 24px 15px 35px;
            }

            h1,
            .page-title {
                font-size: 24px;
            }

            .card-header {
                padding: 0 18px;
            }

            form {
                padding: 20px 18px;
            }

            .actions {
                flex-direction: column-reverse;
                align-items: stretch;
            }

            .btn {
                width: 100%;
            }
        }

        
        body.dark-mode {
            background: #0f1728 !important;
            color: #edf3ff !important;
        }

        body.dark-mode .main {
            background:
                radial-gradient(circle at 90% 0%, rgba(54,91,177,.12), transparent 28%),
                #0f1728 !important;
        }

        body.dark-mode .header {
            background: rgba(15,23,40,.92) !important;
            border-bottom-color: #293752 !important;
        }

        body.dark-mode .search {
            background: #141f33 !important;
            border-color: #293752 !important;
        }

        body.dark-mode .search input {
            color: #edf3ff !important;
        }

        body.dark-mode .search input::placeholder {
            color: #7f8da5 !important;
        }

        body.dark-mode .notification {
            background: #162238 !important;
            border-color: #334463 !important;
            color: #cbd7ed !important;
        }

        body.dark-mode .notification-dropdown {
            background: #172238 !important;
            border-color: #293752 !important;
            box-shadow: 0 15px 35px rgba(0, 0, 0, .25) !important;
        }

        body.dark-mode .notification-header {
            border-bottom-color: #293752 !important;
            color: #edf3ff !important;
        }

        body.dark-mode .notification-item {
            border-bottom-color: #293752 !important;
            color: #edf3ff !important;
        }

        body.dark-mode .notification-item:hover {
            background: #1d2c47 !important;
        }

        body.dark-mode .notification-item-content strong {
            color: #edf3ff !important;
        }

        body.dark-mode .notification-item-content p {
            color: #9aa8c0 !important;
        }

        body.dark-mode .notification-item-content small {
            color: #71809a !important;
        }

        body.dark-mode .notification-empty {
            color: #9aa8c0 !important;
        }

        body.dark-mode .profile {
            border-left-color: #293752 !important;
        }

        body.dark-mode .profile-name {
            color: #edf3ff !important;
        }

        body.dark-mode .profile-role {
            color: #9aa8c0 !important;
        }

        body.dark-mode .profile-photo {
            background: #1d2c47 !important;
            color: #a9c5ff !important;
        }

        body.dark-mode .content {
            color: #edf3ff !important;
        }

        body.dark-mode .back-link,
        body.dark-mode .back {
            background: #162238 !important;
            border-color: #334463 !important;
            color: #a9c5ff !important;
        }

        body.dark-mode .back-link:hover,
        body.dark-mode .back:hover {
            background: #1d2c47 !important;
            color: #cbd7ed !important;
        }

        body.dark-mode .eyebrow {
            color: #a9c5ff !important;
        }

        body.dark-mode h1,
        body.dark-mode .page-title {
            color: #edf3ff !important;
        }

        body.dark-mode .subtitle,
        body.dark-mode .page-description {
            color: #9aa8c0 !important;
        }

        body.dark-mode .card {
            background: #172238 !important;
            border-color: #293752 !important;
            box-shadow: 0 18px 45px rgba(0,0,0,.18) !important;
        }

        body.dark-mode .card-header {
            background: linear-gradient(135deg,#1a2940,#162238) !important;
            border-bottom-color: #293752 !important;
        }

        body.dark-mode .card-header-icon {
            background: #1d2c47 !important;
            color: #a9c5ff !important;
        }

        body.dark-mode .card-header-title {
            color: #edf3ff !important;
        }

        body.dark-mode .card-header-description {
            color: #9aa8c0 !important;
        }

        body.dark-mode label {
            color: #cbd7ed !important;
        }

        body.dark-mode input,
        body.dark-mode select,
        body.dark-mode textarea {
            background: #111d31 !important;
            border-color: #334463 !important;
            color: #edf3ff !important;
        }

        body.dark-mode select option {
            background: #111d31 !important;
            color: #edf3ff !important;
        }

        body.dark-mode input::placeholder,
        body.dark-mode textarea::placeholder {
            color: #71809a !important;
        }

        body.dark-mode input:focus,
        body.dark-mode select:focus,
        body.dark-mode textarea:focus {
            background: #142238 !important;
            border-color: #5d83d5 !important;
            box-shadow: 0 0 0 3px rgba(93,131,213,.15) !important;
        }

        body.dark-mode .divider {
            background: #293752 !important;
        }

        body.dark-mode .btn {
            background: #162238 !important;
            border-color: #334463 !important;
            color: #cbd7ed !important;
        }

        body.dark-mode .btn:hover {
            background: #1d2c47 !important;
            border-color: #405578 !important;
            color: #ffffff !important;
        }

        body.dark-mode .btn-primary {
            background: linear-gradient(135deg,#2a55b8,#173c91) !important;
            border-color: #3967d1 !important;
            color: #fff !important;
        }

        body.dark-mode .btn-primary:hover {
            background: linear-gradient(135deg,#315fc9,#1b429c) !important;
        }

    </style>
</head>


<body>

<div class="app">
        <aside class="sidebar">

        <div>
            <div class="brand">
                <div class="brand-logo">
                    <img src="{{ asset('images/logo-smpn2-dramaga.png') }}" alt="Logo SMP Negeri 2 Dramaga">
                </div>

                <div>
                    <div class="brand-name">SIRASI-BK</div>
                    <div class="brand-subtitle">Bimbingan & Konseling</div>
                </div>
            </div>

            <div class="menu-title">
                Menu Utama
            </div>

            <nav class="menu">

                <a href="{{ route('dashboard') }}" class="menu-item">
                    <span class="menu-icon"><i data-lucide="home"></i></span>
                    Dashboard
                </a>

                <a href="{{ route('siswa.index') }}" class="menu-item">
                    <span class="menu-icon"><i data-lucide="users-round"></i></span>
                    Data Siswa
                </a>

                <a
                    href="{{ route('penjadwalan.index') }}" class="menu-item">
                    <span class="menu-icon"><i data-lucide="calendar-clock"></i></span>
                    Penjadwalan
                </a>

                <a href="{{ route('konseling.index') }}" class="menu-item active">
                    <span class="menu-icon"><i data-lucide="clipboard-list"></i></span>
                    Data Konseling
                </a>

                <a href="{{ route('siswa.riwayat') }}" class="menu-item">
                    <span class="menu-icon"><i data-lucide="history"></i></span>
                    Riwayat Siswa
                </a>

                <a href="{{ route('laporan.index') }}" class="menu-item">
                    <span class="menu-icon"><i data-lucide="file-chart-column"></i></span>
                    Laporan
                </a>

                <a href="{{ route('pengaturan.index') }}" class="menu-item">
                    <span class="menu-icon"><i data-lucide="settings"></i></span>
                    Pengaturan
                </a>

            </nav>
        </div>

        <div class="sidebar-bottom">
            <form action="{{ route('logout') }}" method="POST" onsubmit="return confirm('Anda yakin ingin keluar?');">
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

            <div class="search">
                <span class="search-icon">
                    <i data-lucide="search"></i>
                </span>

                <input type="text" placeholder="Cari data konseling...">
            </div>

            <div class="profile-area">

                <div class="notification-wrapper">

                    <button
                        type="button"
                        class="notification"
                        id="notificationButton"
                    >
                        <i data-lucide="bell"></i>

                        @if (isset($notifikasis) && $notifikasis->where('dibaca', false)->count() > 0)
                            <span class="notification-dot"></span>
                        @endif
                    </button>

                    <div
                        class="notification-dropdown"
                        id="notificationDropdown"
                    >
                        <div class="notification-header">
                            <strong>Notifikasi</strong>
                        </div>

                        @forelse ($notifikasis ?? [] as $notifikasi)

                            <a
                                href="{{ route('notifikasi.baca', $notifikasi->id) }}"
                                class="notification-item"
                            >
                                <div class="notification-item-icon">
                                    <i data-lucide="clipboard-list"></i>
                                </div>

                                <div class="notification-item-content">
                                    <strong>{{ $notifikasi->judul }}</strong>

                                    <p>{{ $notifikasi->pesan }}</p>

                                    <small>
                                        {{ $notifikasi->created_at->diffForHumans() }}
                                    </small>
                                </div>
                            </a>

                        @empty

                            <div class="notification-empty">
                                <i data-lucide="bell-off"></i>
                                <p>Belum ada notifikasi</p>
                            </div>

                        @endforelse
                    </div>

                </div>

                <div class="profile">
                    <div class="profile-info">
                        <div class="profile-name">
                            {{ Auth::user()->name ?? 'Guru BK' }}
                        </div>
                        <div class="profile-role">
                            admin
                        </div>
                    </div>

                    <div class="profile-photo">
                        @if (auth()->user()->foto_profil)
                            <img
                                src="{{ asset('storage/' . auth()->user()->foto_profil) }}"
                                alt="Foto Profil"
                            >
                        @else
                            <i data-lucide="user-round"></i>
                        @endif
                    </div>
                </div>

            </div>

        </header>

        <div class="content">


    <a
        href="{{ route('konseling.show', $konseling->id_konseling) }}"
        class="back-link"
        title="Kembali ke Detail Catatan Konseling"
    >
        <i data-lucide="arrow-left"></i>
    </a>

    <div class="eyebrow">Data Konseling</div>

    <h1 class="page-title">Edit Catatan Konseling</h1>

    <p class="subtitle page-description">
        Perbarui data dan hasil catatan konseling siswa.
    </p>

    <div class="card">
        <div class="card-header">
            <div class="card-header-icon">
                <i data-lucide="pencil"></i>
            </div>
            <div>
                <div class="card-header-title">Informasi Konseling</div>
                <div class="card-header-description">Perbarui data sesi konseling yang sudah tersimpan.</div>
            </div>
        </div>

        <form
            action="{{ route('konseling.update', $konseling->id_konseling) }}"
            method="POST"
        >

            @csrf
            @method('PUT')

            <div class="grid">

                                <div class="form-group">

                    <label>
                        Siswa <span class="required">*</span>
                    </label>

                    <select
                        name="id_siswa"
                        required
                    >
                        <option value="">
                            Pilih Siswa
                        </option>

                        @foreach ($siswa as $item)

                            <option
                                value="{{ $item->id_siswa }}"
                                {{ old('id_siswa', $konseling->id_siswa) == $item->id_siswa ? 'selected' : '' }}
                            >
                                {{ $item->nama_siswa }}
                                — {{ $item->kelas->nama_kelas ?? '-' }}
                            </option>

                        @endforeach

                    </select>

                    @error('id_siswa')
                        <div class="error">{{ $message }}</div>
                    @enderror

                </div>


                                <div class="form-group">

                    <label>
                        Jenis Masalah <span class="required">*</span>
                    </label>

                    <select
                        name="id_jenis"
                        required
                    >
                        <option value="">
                            Pilih Jenis Masalah
                        </option>

                        @foreach ($jenisMasalah as $item)

                            <option
                                value="{{ $item->id_jenis }}"
                                {{ old('id_jenis', $konseling->id_jenis) == $item->id_jenis ? 'selected' : '' }}
                            >
                                {{ $item->nama_jenis }}
                            </option>

                        @endforeach

                    </select>

                    @error('id_jenis')
                        <div class="error">{{ $message }}</div>
                    @enderror

                </div>


                                <div class="form-group">

                    <label>
                        Tanggal Konseling <span class="required">*</span>
                    </label>

                    <input
                        type="date"
                        name="tanggal"
                        value="{{ old('tanggal', $konseling->tanggal) }}"
                        required
                    >

                    @error('tanggal')
                        <div class="error">{{ $message }}</div>
                    @enderror

                </div>


                                <div class="form-group">

                    <label>
                        Status <span class="required">*</span>
                    </label>

                    <select
                        name="status"
                        required
                    >

                        <option value="">
                            Pilih Status
                        </option>

                        <option
                            value="Proses"
                            {{ old('status', $konseling->status) == 'Proses' ? 'selected' : '' }}
                        >
                            Proses
                        </option>

                        <option
                            value="Selesai"
                            {{ old('status', $konseling->status) == 'Selesai' ? 'selected' : '' }}
                        >
                            Selesai
                        </option>

                    </select>

                    @error('status')
                        <div class="error">{{ $message }}</div>
                    @enderror

                </div>


                <div class="form-group full">

                    <label>
                        Masalah yang Dihadapi
                        <span class="required">*</span>
                    </label>

                    <textarea
                        name="masalah"
                        placeholder="Jelaskan masalah atau kondisi yang disampaikan siswa..."
                        required
                    >{{ old('masalah', $konseling->masalah) }}</textarea>

                    @error('masalah')
                        <div class="error">{{ $message }}</div>
                    @enderror

                </div>


                <div class="form-group full">

                    <label>
                        Hasil Konseling
                        <span class="required">*</span>
                    </label>

                    <textarea
                        name="hasil_konseling"
                        placeholder="Tuliskan hasil konseling, kesepakatan, atau tindak lanjut..."
                        required
                    >{{ old('hasil_konseling', $konseling->hasil_konseling) }}</textarea>

                    @error('hasil_konseling')
                        <div class="error">{{ $message }}</div>
                    @enderror

                </div>


                                <div class="form-group full">

                    <label>
                        Catatan Tambahan
                    </label>

                    <textarea
                        name="catatan"
                        placeholder="Catatan tambahan untuk Guru BK (opsional)..."
                    >{{ old('catatan', $konseling->catatan) }}</textarea>

                    @error('catatan')
                        <div class="error">{{ $message }}</div>
                    @enderror

                </div>

            </div>

            <hr class="divider">

            <div class="actions">

                <a
                    href="{{ route('konseling.show', $konseling->id_konseling) }}"
                    class="btn"
                >
                    Batal
                </a>

                <button
                    type="submit"
                    class="btn btn-primary"
                >
                    Simpan Perubahan
                </button>

            </div>

        </form>

    </div>


        </div>

    </main>

</div>

<script src="https://unpkg.com/lucide@latest"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        if (window.lucide) {
            lucide.createIcons();
        }

        const notificationButton = document.getElementById('notificationButton');
        const notificationDropdown = document.getElementById('notificationDropdown');

        if (notificationButton && notificationDropdown) {
            notificationButton.addEventListener('click', function (event) {
                event.stopPropagation();
                notificationDropdown.classList.toggle('show');
            });

            document.addEventListener('click', function (event) {
                if (
                    !notificationButton.contains(event.target) &&
                    !notificationDropdown.contains(event.target)
                ) {
                    notificationDropdown.classList.remove('show');
                }
            });
        }
    });
</script>

</body>

</html>
