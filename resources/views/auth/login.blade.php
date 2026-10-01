<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login - SIRASI-BK</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --blue-deep: #102d70;
            --blue-dark: #173c91;
            --blue: #173c91;
            --blue-hover: #102d70;
            --blue-soft: #6f90e5;

            --text: #172033;
            --muted: #4b576d;
            --line: rgba(23, 60, 145, 0.12);

            --white: #ffffff;
        }

        body {
            width: 100%;
            height: 100vh;
            min-height: 100vh;

            font-family:
                Inter,
                "Segoe UI",
                Arial,
                Helvetica,
                sans-serif;

            background: #f4f6fa;
            color: var(--text);

            overflow: hidden;
            overflow: auto;
        }


        /*Page*/
        .login-page {
            position: relative;
            width: 100%;
            height: 100vh;
            min-height: 100vh;

            display: grid;
            grid-template-columns: 1.08fr .92fr;

            overflow: hidden;

            background:
                linear-gradient(
                    135deg,
                    rgba(10, 39, 94, .88) 0%,
                    rgba(24, 66, 143, .78) 48%,
                    rgba(7, 29, 73, .92) 100%
                ),
                url("https://bogor24jam.com/uploads/posts/mig_697e50aa0c831_116970d3dae3da7..jpg");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }


        /*Left panel*/
        .login-left {
            position: relative;

            height: 100vh;
            min-height: 0;

            display: flex;
            flex-direction: column;

            padding: 40px 7.5% 34px;

            overflow: hidden;

            color: white;

            background: transparent;
        }


        .login-left::before {       /* decorative circle */
            content: "";

            position: absolute;

            width: 560px;
            height: 560px;

            top: -300px;
            right: -250px;

            border-radius: 50%;

            border:
                1px solid
                rgba(255,255,255,.075);

            box-shadow:
                0 0 0 45px
                rgba(255,255,255,.02),
                0 0 0 90px
                rgba(255,255,255,.015);

            pointer-events: none;
        }

        .login-left::after {
            content: "";

            position: absolute;

            width: 420px;
            height: 420px;

            left: -245px;
            bottom: -260px;

            border-radius: 50%;

            border:
                1px solid
                rgba(255,255,255,.05);

            pointer-events: none;
        }


        /*Brand*/
        .brand {
            position: relative;
            z-index: 10;

            display: flex;
            align-items: center;

            gap: 12px;

            width: fit-content;
        }

        .brand-icon {
            width: 55px;
            height: 55px;

            display: flex;
            align-items: center;
            justify-content: center;

            flex-shrink: 0;

            border-radius: 14px;

            background:
                rgba(255,255,255,.12);

            border:
                1px solid
                rgba(255,255,255,.22);

            box-shadow:
                inset 0 1px 0
                rgba(255,255,255,.12),
                0 10px 24px
                rgba(0,0,0,.12);

            backdrop-filter: blur(10px);

            overflow: hidden;
        }

        .brand-icon img {
            width: 300px;
            height: 150px;
            object-fit: contain;
            transform: translateY(20px);
        }

        .brand-text {
            display: flex;
            flex-direction: column;
        }

        .brand-name {
            color: white;

            font-size: 20px;
            line-height: 1;

            font-weight: 800;

            letter-spacing: .2px;
        }

        .brand-subtitle {
            margin-top: 5px;

            color: #cbd7f7;

            font-size: 10px;
            line-height: 1.2;

            letter-spacing: .4px;
        }

        /*Main content*/
        .left-content {
            position: relative;
            z-index: 5;

            width: min(650px, 100%);

            margin-top: auto;
            margin-bottom: auto;

            padding:
                90px 0
                75px;
        }

        .eyebrow {
            display: inline-flex;
            align-items: center;

            gap: 9px;

            margin-bottom: 18px;

            color: #d6e1ff;

            font-size: 10px;
            font-weight: 800;

            letter-spacing: 1.6px;

            text-transform: uppercase;
        }

        .eyebrow::before {
            content: "";

            width: 25px;
            height: 2px;

            border-radius: 999px;

            background: #aec3ff;
        }

        .left-content h1 {
            position: relative;
            z-index: 6;

            max-width: 630px;

            color: white;

            font-size:
                clamp(35px, 4vw, 60px);

            line-height: 1.01;

            font-weight: 800;

            letter-spacing: -2.3px;
        }

        .left-content h1 span {
            color: #c3d3ff;
        }

        .description {
            position: relative;
            z-index: 6;

            max-width: 535px;

            margin-top: 28px;

            padding-left: 18px;

            border-left:
                3px solid
                rgba(188,208,255,.76);

            color: #d0dcfb;

            font-size: 14px;

            line-height: 1.8;
        }

        .description strong {
            color: white;

            font-weight: 700;
        }

        /*Large Logo Silhouette*/
        .school-logo-bg {
            position: absolute;

            z-index: 1;

            left: -210px;
            bottom: -300px;

            width: 1050px;
            height: 1050px;

            display: flex;
            align-items: center;
            justify-content: center;

            pointer-events: none;

            opacity: .12;

            transform: rotate(-8deg);
        }

        .school-logo-bg img {
            position: relative;
            z-index: 2;

            width: 100%;
            height: 100%;

            object-fit: contain;

            filter:
                brightness(0)
                contrast(1.3);

            opacity: 1;

            transform: scale(1.45);
        }

        /*Footer left*/
        .left-footer {
            position: relative;
            z-index: 10;

            display: flex;
            align-items: center;
            justify-content: space-between;

            gap: 20px;
        }

        .slider-indicator {
            display: flex;
            align-items: center;

            gap: 8px;
        }

        .slider-indicator span {
            display: block;

            width: 31px;
            height: 4px;

            border-radius: 999px;

            background:
                rgba(255,255,255,.34);
        }

        .slider-indicator span:first-child {
            width: 44px;

            background:
                #d5e0ff;
        }

        .slider-indicator span:last-child {
            width: 9px;

            opacity: .55;
        }

        .school-label {
            color: #bfcef0;

            font-size: 10px;

            font-weight: 600;

            letter-spacing: .8px;

            text-transform: uppercase;
        }


        /*Right panel*/
        .login-right {
            position: relative;

            height: 100vh;
            min-height: 0;

            display: flex;
            align-items: center;
            justify-content: center;

            padding: 45px;

            background: transparent;
        }

        .login-right::before {
            content: "";

            position: absolute;

            width: 430px;
            height: 430px;

            top: -260px;
            right: -220px;

            border-radius: 50%;

            background:
                radial-gradient(
                    circle,
                    rgba(61,95,174,.10),
                    transparent 68%
                );

            pointer-events: none;
        }

        .login-right::after {
            content: "";

            position: absolute;

            width: 280px;
            height: 280px;

            bottom: -190px;
            left: -170px;

            border-radius: 50%;

            background:
                radial-gradient(
                    circle,
                    rgba(56,86,157,.06),
                    transparent 70%
                );

            pointer-events: none;
        }


        /*Login card*/
        .login-card {
            position: relative;
            z-index: 4;

            width: 100%;
            max-width: 435px;

            padding: 25px 40px;

            background:
                linear-gradient(
                    135deg,
                    rgba(255, 255, 255, 0.44) 0%,
                    rgba(255, 255, 255, 0.22) 100%
                );

            border:
                1px solid
                rgba(255, 255, 255, 0.52);

            border-radius: 24px;

            box-shadow:
                0 24px 60px rgba(5, 22, 60, 0.30),
                0 8px 20px rgba(5, 22, 60, 0.15),
                inset 0 1px 1px rgba(255, 255, 255, 0.65);

            backdrop-filter:
                blur(20px) saturate(140%);
            -webkit-backdrop-filter:
                blur(20px) saturate(140%);
        }


        /*Login heading*/
        .login-heading {
            margin-bottom: 31px;
        }

        .login-heading .eyebrow {
            margin-bottom: 12px;

            color: #173c91;

            font-size: 9.5px;

            font-weight: 800;

            letter-spacing: 1.7px;
        }

        .login-heading .eyebrow::before {
            width: 21px;

            background:
                #2855b7;
        }

        .login-card h2 {
            color: #0f1f42;

            font-size: 31px;

            line-height: 1.1;

            font-weight: 800;

            letter-spacing: -.9px;
        }

        .login-subtitle {
            margin-top: 10px;

            color: #475569;

            font-size: 12.5px;

            line-height: 1.65;
        }


        /*Error*/
        .error-message {
            margin-bottom: 20px;

            padding: 12px 14px;

            color: #991b1b;

            font-size: 12px;

            line-height: 1.5;

            background:
                rgba(254, 226, 226, 0.80);

            border:
                1px solid
                rgba(248, 113, 113, 0.50);

            border-radius: 12px;

            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
        }


        /*form*/
        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;

            margin-bottom: 8px;

            color: #1e293b;

            font-size: 11.5px;

            font-weight: 700;

            letter-spacing: .15px;
        }

        .input-wrapper {
            position: relative;
        }

        .input-wrapper input {
            width: 100%;
            height: 50px;

            padding:
                0 46px
                0 44px;

            color: #172033;

            font-family: inherit;

            font-size: 13px;

            font-weight: 500;

            background:
                rgba(255, 255, 255, 0.32);

            border:
                1px solid
                rgba(255, 255, 255, 0.60);

            border-radius: 13px;

            outline: none;

            box-shadow:
                inset 0 1px 2px rgba(23, 60, 145, 0.04);

            transition:
                background .2s ease,
                border-color .2s ease,
                box-shadow .2s ease;
        }

        .input-wrapper input::placeholder {
            color: #64748b;
            font-weight: 400;
        }

        .input-wrapper input:hover {
            background:
                rgba(255, 255, 255, 0.42);

            border-color:
                rgba(23, 60, 145, 0.28);
        }

        .input-wrapper input:focus {
            background:
                rgba(255, 255, 255, 0.52);

            border-color:
                #173c91;

            box-shadow:
                0 0 0 4px
                rgba(23, 60, 145, 0.12),
                inset 0 1px 2px rgba(23, 60, 145, 0.04);
        }

        .input-wrapper input:-webkit-autofill,
        .input-wrapper input:-webkit-autofill:hover,
        .input-wrapper input:-webkit-autofill:focus,
        .input-wrapper input:-webkit-autofill:active {
            -webkit-text-fill-color: #172033 !important;
            transition: background-color 5000s ease-in-out 0s;
            box-shadow: inset 0 0 0 30px rgba(255, 255, 255, 0.45) !important;
        }


        .input-icon {           /* Icon username/Password*/
            position: absolute;

            left: 14px;
            top: 50%;

            transform:
                translateY(-50%);

            display: flex;
            align-items: center;
            justify-content: center;

            color: #4b576d;

            pointer-events: none;
        }

        .input-icon svg {
            width: 17px;
            height: 17px;

            stroke-width: 2;
        }


        /*password toggle*/
        .password-toggle {
            position: absolute;

            top: 50%;
            right: 10px;

            width: 31px;
            height: 31px;

            display: flex;
            align-items: center;
            justify-content: center;

            transform:
                translateY(-50%);

            border: 0;

            border-radius: 9px;

            background:
                transparent;

            color: #4b576d;

            cursor: pointer;

            transition:
                background .2s ease,
                color .2s ease;
        }

        .password-toggle svg {
            width: 16px;
            height: 16px;

            stroke-width: 2;
        }

        .password-toggle:hover {
            background:
                rgba(23, 60, 145, 0.10);

            color:
                #173c91;
        }


        /*remember*/
        .remember-row {
            display: flex;
            align-items: center;
            justify-content: space-between;

            gap: 15px;

            margin:
                8px 0 25px;
        }

        .remember {
            display: flex;
            align-items: center;

            gap: 8px;

            color: #394359;

            font-size: 11.5px;

            font-weight: 600;

            cursor: pointer;

            user-select: none;
        }

        .remember input {
            width: 16px;
            height: 16px;

            accent-color:
                #173c91;

            cursor: pointer;
        }

        .forgot {
            color:
                #173c91;

            font-size: 11.5px;

            font-weight: 700;

            text-decoration: none;

            transition:
                color .2s ease,
                text-decoration .2s ease;
        }

        .forgot:hover {
            color:
                #102d70;

            text-decoration:
                underline;
        }


        /*login button*/
        .login-button {
            width: 100%;
            height: 51px;

            display: flex;
            align-items: center;
            justify-content: center;

            gap: 9px;

            border: 0;

            border-radius: 13px;

            background:
                linear-gradient(
                    135deg,
                    #1e47a5 0%,
                    #173c91 60%,
                    #102d70 100%
                );

            color: #ffffff;

            font-family: inherit;

            font-size: 13px;

            font-weight: 700;

            letter-spacing: .3px;

            cursor: pointer;

            box-shadow:
                0 10px 22px rgba(23, 60, 145, 0.32),
                inset 0 1px 0 rgba(255, 255, 255, 0.20);

            transition:
                background .25s ease,
                transform .2s ease,
                box-shadow .25s ease;
        }

        .login-button:hover {
            background:
                linear-gradient(
                    135deg,
                    #183c8f 0%,
                    #13337a 60%,
                    #0c2358 100%
                );

            transform:
                translateY(-2px);

            box-shadow:
                0 14px 28px rgba(16, 45, 112, 0.40),
                inset 0 1px 0 rgba(255, 255, 255, 0.25);
        }

        .login-button:active {
            transform:
                translateY(0);

            box-shadow:
                0 6px 14px rgba(16, 45, 112, 0.30);
        }


        /*divider help*/
        .divider {
            width: 100%;
            height: 1px;

            margin:
                26px 0 20px;

            background:
                rgba(23, 60, 145, 0.12);
        }

        .help-text {
            text-align: center;

            color: #4b576d;

            font-size: 11px;

            line-height: 1.6;
        }

        .help-text a {
            color:
                #173c91;

            font-weight: 700;

            text-decoration: none;

            transition:
                color .2s ease,
                text-decoration .2s ease;
        }

        .help-text a:hover {
            color:
                #102d70;

            text-decoration:
                underline;
        }


        /*responsive*/
        @media (max-width: 1100px) {

        .login-page {
            grid-template-columns: 0.9fr 1.1fr;
            min-height: 100vh;
            height: auto;
        }

        .login-left {
            height: 100vh;
            min-height: 100vh;

            padding:
                28px 5% 24px;
        }

        .brand-icon {
            width: 48px;
            height: 48px;
        }

        .brand-icon img {
            width: 120px;
            height: 70px;
            transform: translateY(8px);
        }

        .brand-name {
            font-size: 18px;
        }

        .brand-subtitle {
            font-size: 9px;
        }

        .left-content {
            width: 100%;
            padding:
                45px 0
                35px;
        }

        .left-content h1 {
            max-width: 100%;
            font-size: clamp(28px, 4vw, 42px);
            letter-spacing: -1.5px;
        }

        .description {
            max-width: 100%;
            margin-top: 18px;
            padding-left: 12px;
            font-size: 12px;
            line-height: 1.6;
        }

        .school-logo-bg {
            width: 600px;
            height: 600px;

            left: -180px;
            bottom: -180px;
        }

        .login-right {
            height: 100vh;
            min-height: 100vh;

            padding:
                25px 18px;
        }

        .login-card {
            width: 100%;
            max-width: 400px;

            padding:
                30px 25px;

            border-radius: 20px;
        }

        .login-heading {
            margin-bottom: 24px;
        }

        .login-card h2 {
            font-size: 27px;
        }

        .login-subtitle {
            font-size: 11.5px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .input-wrapper input {
            height: 46px;
            font-size: 12px;
        }

        .remember-row {
            margin:
                5px 0 18px;
        }

        .login-button {
            height: 47px;
        }

        .divider {
            margin:
                20px 0 15px;
        }
    }


        @media (max-width: 650px) {

            .login-left {
                min-height: 510px;

                padding:
                    30px 24px 28px;
            }

            .brand-icon {
                width: 42px;
                height: 42px;
            }

            .brand-icon img {
                width: 28px;
                height: 28px;
            }

            .brand-name {
                font-size: 18px;
            }

            .brand-subtitle {
                font-size: 9px;
            }

            .left-content {
                padding:
                    55px 0
                    40px;
            }

            .left-content h1 {
                font-size:
                    38px;

                letter-spacing:
                    -1.4px;
            }

            .description {
                font-size:
                    12px;
            }

            .school-logo-bg {
                width:
                    420px;

                height:
                    420px;

                left:
                    -40px;

                bottom:
                    -80px;

                opacity:
                    .085;
            }

            .school-label {
                display:
                    none;
            }

            .login-right {
                padding:
                    25px 16px
                    35px;
            }

            .login-card {
                padding:
                    31px 23px;

                border-radius:
                    20px;
            }

            .login-card h2 {
                font-size:
                    27px;
            }

        }

    </style>

    @include('partials.theme')
</head>

<body>

<div class="login-page">

    <!--quick theme toggle-->
    <button
        type="button"
        id="themeToggleBtn"
        class="theme-toggle-btn"
        onclick="toggleLoginTheme()"
        aria-label="Ganti tema"
        title="Ganti tema"
    >
        <i data-lucide="moon" id="themeToggleIcon"></i>
    </button>

    <!--left panel-->
    <section class="login-left">

        <!--Brand-->
        <div class="brand">

            <div class="brand-icon">

                <img
                    src="{{ asset('images/logo-smpn2-dramaga.png') }}"
                    alt="Logo SMP Negeri 2 Dramaga"
                >

            </div>

            <div class="brand-text">

                <div class="brand-name">
                    SIRASI-BK
                </div>

                <div class="brand-subtitle">
                    Bimbingan & Konseling
                </div>

            </div>

        </div>


        <!--Main content-->
        <div class="left-content">

            <div class="eyebrow">
                Sistem Informasi Sekolah
            </div>

            <h1>
                Sistem Informasi Riwayat dan
                Administrasi
                <span>Bimbingan Konseling</span>
            </h1>

            <div class="description">
                Platform manajemen data konseling yang aman,
                terorganisir, dan profesional untuk mendukung
                perkembangan siswa di
                <strong>SMP Negeri 2 Dramaga</strong>
            </div>

        </div>


        <!--Footer-->
        <div class="left-footer">

            <div class="slider-indicator">
                <span></span>
                <span></span>
            </div>

            <div class="school-label">
                SMP Negeri 2 Dramaga
            </div>

        </div>


        <!--logo siluet-->
        <div class="school-logo-bg">

            <img
                src="{{ asset('images/logo-smpn2-dramaga.png') }}"
                alt=""
            >

        </div>

    </section>


    <!--right panel-->
    <section class="login-right">

        <div class="login-card">

            <!--heading-->
            <div class="login-heading">

                <div class="eyebrow">
                    SIRASI-BK
                </div>

                <h2>
                    Selamat Datang
                </h2>

                <p class="login-subtitle">
                    Silakan masuk menggunakan akun Guru BK.
                </p>

            </div>


            <!-- ERROR -->
            @if ($errors->any())

                <div class="error-message">
                    {{ $errors->first() }}
                </div>

            @endif


            <!--Form-->
            <form
                action="{{ route('login.process') }}"
                method="POST"
                autocomplete="off"
            >

                @csrf


                <!--username-->
                <div class="form-group">

                    <label for="username">
                        Username / NIP
                    </label>

                    <div class="input-wrapper">

                        <span class="input-icon">
                            <i data-lucide="user-round"></i>
                        </span>

                        <input
                            type="text"
                            id="username"
                            name="username"
                            placeholder="Masukkan NIP anda"
                            value="{{ old('username', '') }}"
                            autocomplete="off"
                            required
                        >

                    </div>

                </div>


                <!--password-->
                <div class="form-group">

                    <label for="password">
                        Password
                    </label>

                    <div class="input-wrapper">

                        <span class="input-icon">
                            <i data-lucide="lock-keyhole"></i>
                        </span>

                        <input
                            type="password"
                            id="password"
                            name="password"
                            placeholder="••••••••"
                            autocomplete="new-password"
                            required
                        >

                        <button
                            type="button"
                            class="password-toggle"
                            onclick="togglePassword()"
                            aria-label="Tampilkan password"
                        >
                            <i data-lucide="eye"></i>
                        </button>

                    </div>

                </div>


                <!--remember-->
                <div class="remember-row">

                    <label class="remember">

                        <input
                            type="checkbox"
                            name="remember"
                        >

                        <span>
                            Remember me
                        </span>

                    </label>


                    <a
                        href="#"
                        class="forgot"
                    >
                        Forgot password?
                    </a>

                </div>


                <!--login button-->
                <button
                    type="submit"
                    class="login-button"
                >
                    <span>
                        Masuk
                    </span>

                    <span>
                        →
                    </span>
                </button>

            </form>


            <!--divider-->
            <div class="divider"></div>


            <!--help-->
            <p class="help-text">

                Butuh bantuan akses?

                <a href="#">
                    Hubungi Administrator
                </a>

            </p>

        </div>

    </section>

</div>


<!--lucide-->
<script src="https://unpkg.com/lucide@latest"></script>

<script>
    lucide.createIcons();

    function resetLoginFormIfEmpty() {
        @if (!old('username'))
        const u = document.getElementById('username');
        const p = document.getElementById('password');
        if (u) u.value = '';
        if (p) p.value = '';
        @endif
    }

    document.addEventListener('DOMContentLoaded', function () {
        resetLoginFormIfEmpty();
        setTimeout(resetLoginFormIfEmpty, 50);
        setTimeout(resetLoginFormIfEmpty, 200);
    });

    window.addEventListener('pageshow', function () {
        resetLoginFormIfEmpty();
    });

    function togglePassword() {

        const password =
            document.getElementById('password');

        const button =
            document.querySelector('.password-toggle');

        if (password.type === 'password') {

            password.type = 'text';

            button.innerHTML =
                '<i data-lucide="eye-off"></i>';

            button.setAttribute(
                'aria-label',
                'Sembunyikan password'
            );

        } else {

            password.type = 'password';

            button.innerHTML =
                '<i data-lucide="eye"></i>';

            button.setAttribute(
                'aria-label',
                'Tampilkan password'
            );

        }

        lucide.createIcons();
    }

    function updateLoginThemeIcon(theme) {
        var btn = document.getElementById('themeToggleBtn');
        if (!btn) return;
        if (theme === 'dark') {
            btn.innerHTML = '<i data-lucide="sun"></i>';
            btn.setAttribute('title', 'Beralih ke Tampilan Terang');
        } else {
            btn.innerHTML = '<i data-lucide="moon"></i>';
            btn.setAttribute('title', 'Beralih ke Tampilan Gelap');
        }
        if (window.lucide) {
            lucide.createIcons();
        }
    }

    function toggleLoginTheme() {
        var currentTheme = localStorage.getItem('sirasi-theme') || 'light';
        var nextTheme = currentTheme === 'dark' ? 'light' : 'dark';
        localStorage.setItem('sirasi-theme', nextTheme);
        document.documentElement.classList.toggle('dark-mode', nextTheme === 'dark');
        document.body.classList.toggle('dark-mode', nextTheme === 'dark');
        updateLoginThemeIcon(nextTheme);
    }

    document.addEventListener('DOMContentLoaded', function () {
        var initialTheme = localStorage.getItem('sirasi-theme') || 'light';
        updateLoginThemeIcon(initialTheme);
    });
</script>

</body>
</html>
