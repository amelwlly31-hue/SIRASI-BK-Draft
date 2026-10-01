<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Data Siswa - SIRASI-BK</title>

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
            --primary-soft: #f3f6ff;

            --bg: #f5f7fb;
            --white: #ffffff;

            --text: #172033;
            --muted: #737b8c;
            --border: #e5e9f0;

            --green: #159447;
            --green-bg: #e9f8ef;

            --red: #d64545;
            --red-bg: #fff0f0;

            --shadow-sm: 0 4px 14px rgba(23, 60, 145, .05);
            --shadow-md: 0 12px 30px rgba(23, 60, 145, .08);
            --shadow-lg: 0 20px 45px rgba(23, 60, 145, .12);
        }

        body {
            font-family: Inter, "Segoe UI", Arial, sans-serif;
            background:
                radial-gradient(
                    circle at 85% 0%,
                    rgba(41, 67, 143, .08),
                    transparent 28%
                ),
                var(--bg);
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
            display: flex;
            min-height: 100vh;
        }

        
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

            padding: 22px 15px;

            background:
                linear-gradient(
                    180deg,
                    #193f96 0%,
                    #173887 52%,
                    #112e70 100%
                );

            color: white;

            box-shadow: 12px 0 35px rgba(15, 45, 112, .10);
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

            box-shadow:
                inset 0 1px 0 rgba(255,255,255,.15),
                0 8px 20px rgba(0,0,0,.10);

            font-size: 20px;
            font-weight: 800;
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
            position: relative;
            min-height: 46px;

            display: flex;
            align-items: center;
            gap: 13px;

            padding: 0 14px;

            border: 1px solid transparent;
            border-radius: 13px;

            color: #dce5ff;
            text-decoration: none;
            font-size: 13.5px;
            font-weight: 700;

            transition: .2s ease;
        }

        .menu-item:hover {
            color: white;
            background: rgba(255,255,255,.09);
            transform: translateX(2px);
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
            min-width: 25px;
            border-radius: 8px;
            background: rgba(255,255,255,.085);
            border: 1px solid rgba(255,255,255,.035);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            color: #dce5ff;
            flex-shrink: 0;
        }

        
        .main {
            flex: 1;
            min-width: 0;
            margin-left: 270px;
        }

        
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

        .search-box {
            width: 430px;
            height: 42px;

            display: flex;
            align-items: center;

            padding: 0 14px;

            border: 1px solid var(--border);
            border-radius: 12px;

            background: #f8f9fc;

            transition: .2s ease;
        }

        .search-box:focus-within {
            border-color: #9bb0e8;
            background: white;

            box-shadow:
                0 0 0 4px rgba(23,60,145,.06);
        }

        .search-icon {
            margin-right: 10px;
            color: #8b93a3;
            font-size: 18px;
        }

        .search-box input {
            width: 100%;

            border: 0;
            outline: 0;

            background: transparent;

            color: var(--text);
            font-size: 13px;
        }

        .search-box input::placeholder {
            color: #9aa1af;
        }

        .profile-area {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .notification {
            width: 38px;
            height: 38px;

            position: relative;

            display: flex;
            align-items: center;
            justify-content: center;

            border: 1px solid var(--border);
            border-radius: 11px;

            background: white;
            color: #5c6575;

            box-shadow: var(--shadow-sm);
        }

        .notification-dot {
            width: 7px;
            height: 7px;

            position: absolute;
            top: 7px;
            right: 7px;

            border: 2px solid white;
            border-radius: 50%;

            background: #e14c4c;
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
            border: 1px solid var(--border);
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
            border-bottom: 1px solid var(--border);
            font-size: 13px;
            color: var(--text);
        }

        .notification-item {
            display: flex;
            gap: 11px;
            padding: 13px 15px;
            border-bottom: 1px solid #edf0f4;
            color: var(--text);
            transition: .2s ease;
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
            background: var(--primary-light);
            color: var(--primary);
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
            color: var(--muted);
            font-size: 10px;
            line-height: 1.45;
        }

        .notification-item-content small {
            display: block;
            margin-top: 5px;
            color: #9aa8c0;
            font-size: 9.5px;
        }

        .notification-empty {
            padding: 30px 20px;
            text-align: center;
            color: var(--muted);
            font-size: 12px;
        }

        .notification-empty i {
            width: 28px;
            height: 28px;
            margin: 0 auto 8px;
            display: block;
            color: #b0b8c7;
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

            background:
                linear-gradient(
                    135deg,
                    #e8eeff,
                    #d5e0ff
                );

            color: var(--primary);
            font-size: 17px;
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
            max-width: 1450px;
            margin: auto;
        }

        .back-link {
            width: 39px;
            height: 39px;

            display: inline-flex;
            align-items: center;
            justify-content: center;

            margin-bottom: 18px;

            border: 1px solid var(--border);
            border-radius: 11px;

            background: white;
            color: #687183;

            font-size: 18px;

            box-shadow: var(--shadow-sm);

            transition: .2s ease;
        }

        .back-link:hover {
            color: var(--primary);
            background: var(--primary-light);
            transform: translateX(-2px);
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
            margin-bottom: 25px;
        }

        .page-title h1 {
            font-size: 28px;
            font-weight: 800;
            letter-spacing: -.5px;
        }

        .page-title p {
            margin-top: 7px;

            color: var(--muted);

            font-size: 13px;
            line-height: 1.6;
        }

        
        .form-layout {
            display: grid;
            grid-template-columns: minmax(0, 1fr) 280px;
            gap: 20px;

            align-items: start;
        }

        
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

            width: 230px;
            height: 230px;

            right: -135px;
            top: -125px;

            border-radius: 50%;

            background: rgba(23,60,145,.035);
        }

        .form-header {
            position: relative;
            z-index: 1;

            display: flex;
            align-items: center;
            gap: 12px;

            padding: 21px 23px;

            border-bottom: 1px solid var(--border);
        }

        .form-header-icon {
            width: 40px;
            height: 40px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 12px;

            background: var(--primary-light);
            color: var(--primary);

            font-size: 17px;
        }

        .form-header-title {
            font-size: 15px;
            font-weight: 800;
        }

        .form-header-subtitle {
            margin-top: 3px;

            color: var(--muted);

            font-size: 10px;
        }

        .form-body {
            position: relative;
            z-index: 1;

            padding: 24px;
        }

        .section-label {
            display: flex;
            align-items: center;
            gap: 9px;

            margin-bottom: 17px;

            font-size: 12px;
            font-weight: 800;
        }

        .section-label::before {
            content: "";

            width: 4px;
            height: 17px;

            border-radius: 10px;

            background: var(--primary);
        }

        .form-grid {
            display: grid;

            grid-template-columns: 1fr 1fr;

            gap: 18px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        .form-group.full {
            grid-column: 1 / -1;
        }

        .form-group label {
            margin-bottom: 7px;

            color: #374151;

            font-size: 11px;
            font-weight: 700;
        }

        .required {
            color: var(--red);
        }

        .form-control {
            width: 100%;
            min-height: 43px;

            padding: 0 13px;

            border: 1px solid var(--border);
            border-radius: 10px;

            outline: none;

            background: #fafbfe;
            color: var(--text);

            font-size: 12px;

            transition: .2s ease;
        }

        .form-control:hover {
            border-color: #d3d9e4;
            background: white;
        }

        .form-control:focus {
            border-color: #91a8df;
            background: white;

            box-shadow:
                0 0 0 4px rgba(23,60,145,.05);
        }

        select.form-control {
            cursor: pointer;
        }

        textarea.form-control {
            min-height: 110px;

            padding: 11px 13px;

            resize: vertical;
            line-height: 1.55;
        }

        .gender-options {
            min-height: 43px;

            display: flex;
            gap: 10px;
        }

        .gender-option {
            flex: 1;

            min-height: 43px;

            display: flex;
            align-items: center;
            gap: 9px;

            padding: 0 13px;

            border: 1px solid var(--border);
            border-radius: 10px;

            background: #fafbfe;

            color: #555f71;

            font-size: 11px;
            font-weight: 600;

            cursor: pointer;

            transition: .2s ease;
        }

        .gender-option:hover {
            border-color: #c4cfea;
            background: var(--primary-soft);
        }

        .gender-option input {
            accent-color: var(--primary);
        }

        body.dark-mode .gender-option input {
            appearance: none;
            -webkit-appearance: none;
            width: 14px;
            height: 14px;
            border: 1.5px solid #71819d;
            border-radius: 50%;
            background: transparent !important;
            cursor: pointer;
        }

        body.dark-mode .gender-option input:checked {
            background: #8fb0ff !important;
            border-color: #8fb0ff !important;
        }

        body.dark-mode .gender-option input:checked::after {
            content: "";
            position: absolute;
            width: 7px;
            height: 7px;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            border-radius: 50%;
            background: #3b5fa8;
        }

        .hint {
            margin-top: 6px;

            color: #9299a7;

            font-size: 9px;
            line-height: 1.5;
        }

        .error {
            margin-top: 6px;

            color: var(--red);

            font-size: 10px;
        }

        .divider {
            height: 1px;

            margin: 25px 0;

            border: 0;

            background: var(--border);
        }

        .form-actions {
            display: flex;
            justify-content: flex-end;
            gap: 10px;

            padding-top: 4px;
        }

        .btn {
            min-height: 42px;

            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 7px;

            padding: 0 17px;

            border: 1px solid var(--border);
            border-radius: 11px;

            background: white;
            color: var(--text);

            font-size: 11px;
            font-weight: 700;

            cursor: pointer;

            box-shadow: var(--shadow-sm);

            transition: .2s ease;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-md);
        }

        .btn-primary {
            border-color: var(--primary);
            background: var(--primary);
            color: white;

            box-shadow:
                0 8px 20px rgba(23,60,145,.18);
        }

        .btn-primary:hover {
            background: var(--primary-dark);
        }

        
        .info-column {
            display: flex;
            flex-direction: column;
            gap: 16px;
        }

        .info-card {
            position: relative;
            overflow: hidden;

            padding: 20px;

            border: 1px solid var(--border);
            border-radius: 18px;

            background: white;

            box-shadow: var(--shadow-sm);
        }

        .info-card.primary {
            border: 0;

            background:
                linear-gradient(
                    135deg,
                    #173c91,
                    #294f9e
                );

            color: white;

            box-shadow:
                0 18px 35px rgba(23,60,145,.20);
        }

        .info-card.primary::before {
            content: "";

            position: absolute;

            width: 150px;
            height: 150px;

            right: -70px;
            top: -75px;

            border-radius: 50%;

            background: rgba(255,255,255,.08);
        }

        .info-card.primary::after {
            content: "";

            position: absolute;

            width: 90px;
            height: 90px;

            left: -50px;
            bottom: -55px;

            border-radius: 50%;

            background: rgba(255,255,255,.05);
        }

        .info-content {
            position: relative;
            z-index: 1;
        }

        .info-icon {
            width: 39px;
            height: 39px;

            display: flex;
            align-items: center;
            justify-content: center;

            margin-bottom: 14px;

            border-radius: 12px;

            background: var(--primary-light);
            color: var(--primary);

            font-size: 16px;
        }

        .primary .info-icon {
            background: rgba(255,255,255,.12);
            color: white;
        }

        .info-title {
            font-size: 14px;
            font-weight: 800;
        }

        .info-text {
            margin-top: 7px;

            color: var(--muted);

            font-size: 10px;
            line-height: 1.65;
        }

        .primary .info-text {
            color: #d1dcfa;
        }

        .steps {
            margin-top: 16px;

            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .step {
            display: flex;
            align-items: flex-start;
            gap: 9px;
        }

        .step-number {
            width: 23px;
            height: 23px;

            flex-shrink: 0;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 7px;

            background: rgba(255,255,255,.12);
            color: white;

            font-size: 9px;
            font-weight: 800;
        }

        .step-text {
            padding-top: 3px;

            color: #d5def5;

            font-size: 10px;
            line-height: 1.45;
        }

        .student-preview {
            display: flex;
            align-items: center;
            gap: 11px;

            margin-top: 15px;
            padding-top: 15px;

            border-top: 1px solid var(--border);
        }

        .student-avatar {
            width: 42px;
            height: 42px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 12px;

            background: var(--primary-light);
            color: var(--primary);

            font-size: 14px;
            font-weight: 800;
        }

        .student-preview strong {
            display: block;

            font-size: 12px;
            font-weight: 800;
        }

        .student-preview span {
            display: block;

            margin-top: 3px;

            color: var(--muted);

            font-size: 9px;
        }

        .error-summary {
            margin-bottom: 20px;

            padding: 14px 16px;

            border: 1px solid #f1cccc;
            border-radius: 11px;

            background: var(--red-bg);
            color: var(--red);

            font-size: 11px;
        }

        .error-summary strong {
            display: block;
            margin-bottom: 6px;
        }

        .error-summary ul {
            padding-left: 18px;
            line-height: 1.6;
        }

        
        @media (max-width: 1100px) {

            .sidebar {
                width: 235px;
            }

            .main {
                margin-left: 235px;
            }

            .form-layout {
                grid-template-columns: 1fr;
            }

            .info-column {
                display: grid;
                grid-template-columns: 1fr 1fr;
            }
        }

        @media (max-width: 850px) {

            .sidebar {
                width: 78px;
                padding: 20px 10px;
            }

            .main {
                margin-left: 78px;
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

            .menu-item.active {
                box-shadow: none;
            }

            .header {
                padding: 0 20px;
            }

            .search-box {
                width: 300px;
            }

            .content {
                padding: 24px;
            }
        }

        @media (max-width: 700px) {

            .header {
                height: auto;
                min-height: 72px;

                padding: 14px;

                gap: 12px;
            }

            .search-box {
                width: 100%;
            }

            .profile-info {
                display: none;
            }

            .profile {
                padding-left: 0;
                border-left: 0;
            }

            .content {
                padding: 18px;
            }

            .page-title h1 {
                font-size: 23px;
            }

            .form-grid {
                grid-template-columns: 1fr;
            }

            .form-group.full {
                grid-column: auto;
            }

            .info-column {
                display: flex;
            }

            .gender-options {
                flex-direction: column;
            }

            .form-actions {
                flex-direction: column-reverse;
            }

            .form-actions .btn {
                width: 100%;
            }
        }

        @media (max-width: 480px) {

            .sidebar {
                width: 66px;
            }

            .main {
                margin-left: 66px;
            }

            .content {
                padding: 15px;
            }

            .header {
                padding: 11px;
            }

            .search-box {
                height: 38px;
            }

            .notification {
                width: 36px;
                height: 36px;
            }

            .profile-photo {
                width: 36px;
                height: 36px;
            }

            .form-body {
                padding: 18px;
            }

            .form-header {
                padding: 18px;
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

        body.dark-mode .search-box {
            background: #141f33 !important;
            border-color: #293752 !important;
        }

        body.dark-mode .search-box input {
            color: #edf3ff !important;
        }

        body.dark-mode .search-box input::placeholder {
            color: #7f8da5 !important;
        }

        body.dark-mode .search-icon {
            color: #9aa8c0 !important;
        }

        body.dark-mode .notification {
            background: #162238 !important;
            border-color: #334463 !important;
            color: #cbd7ed !important;
        }

        body.dark-mode .notification-dot {
            border-color: #162238 !important;
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

        body.dark-mode .back-link {
            background: #162238 !important;
            border-color: #334463 !important;
            color: #a9c5ff !important;
        }

        body.dark-mode .back-link:hover {
            background: #1d2c47 !important;
            color: #cbd7ed !important;
        }

        body.dark-mode .eyebrow {
            color: #a9c5ff !important;
        }

        body.dark-mode .page-title h1 {
            color: #edf3ff !important;
        }

        body.dark-mode .page-title p {
            color: #9aa8c0 !important;
        }

        body.dark-mode .form-card,
        body.dark-mode .info-card {
            background: #172238 !important;
            border-color: #293752 !important;
            box-shadow: 0 18px 45px rgba(0,0,0,.18) !important;
        }

        body.dark-mode .form-card::before {
            background: rgba(80,121,210,.08) !important;
        }

        body.dark-mode .form-header {
            border-bottom-color: #293752 !important;
        }

        body.dark-mode .form-header-icon,
        body.dark-mode .info-icon,
        body.dark-mode .student-avatar {
            background: #1d2c47 !important;
            color: #a9c5ff !important;
        }

        body.dark-mode .form-header-title,
        body.dark-mode .info-title,
        body.dark-mode .section-label,
        body.dark-mode .student-preview strong {
            color: #edf3ff !important;
        }

        body.dark-mode .form-header-subtitle,
        body.dark-mode .info-text,
        body.dark-mode .student-preview span {
            color: #9aa8c0 !important;
        }

        body.dark-mode .form-group label {
            color: #cbd7ed !important;
        }

        body.dark-mode .form-control,
        body.dark-mode .gender-option {
            background: #111d31 !important;
            border-color: #334463 !important;
            color: #edf3ff !important;
        }

        body.dark-mode .form-control:hover,
        body.dark-mode .form-control:focus,
        body.dark-mode .gender-option:hover {
            background: #142238 !important;
            border-color: #5d83d5 !important;
        }

        body.dark-mode .gender-option {
            color: #cbd7ed !important;
        }

        body.dark-mode .hint {
            color: #71809a !important;
        }

        body.dark-mode .divider {
            background: #293752 !important;
        }

        body.dark-mode .btn {
            background: #162238 !important;
            border-color: #334463 !important;
            color: #cbd7ed !important;
        }

        body.dark-mode .btn-primary {
            background: linear-gradient(135deg,#2a55b8,#173c91) !important;
            border-color: #3967d1 !important;
            color: #fff !important;
        }

        body.dark-mode .primary .info-text {
            color: #d1dcfa !important;
        }

        body.dark-mode .step-text {
            color: #d5def5 !important;
        }

        body.dark-mode .student-preview {
            border-top-color: rgba(255,255,255,.18) !important;
        }

        body.dark-mode .error-summary {
            background: #321e27 !important;
            border-color: #5d3341 !important;
            color: #ff9b9b !important;
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

                    <div class="brand-name">
                        SIRASI-BK
                    </div>

                    <div class="brand-subtitle">
                        Bimbingan & Konseling
                    </div>

                </div>

            </div>


            <div class="menu-title">
                Menu Utama
            </div>


            <nav class="menu">

                <a
                    href="{{ route('dashboard') }}"class="menu-item sirasi-nav-link">
                    <span class="menu-icon"><i data-lucide="home"></i></span>
                    Dashboard
                </a>

                <a
                    href="{{ route('siswa.index') }}" class="menu-item active">
                    <span class="menu-icon"><i data-lucide="users-round"></i></span>
                    Data Siswa
                </a>

                <a
                    href="{{ route('penjadwalan.index') }}" class="menu-item">
                    <span class="menu-icon"><i data-lucide="calendar-clock"></i></span>
                    Penjadwalan
                </a>

                <a
                    href="{{ route('konseling.index') }}" class="menu-item sirasi-nav-link">
                    <span class="menu-icon"><i data-lucide="clipboard-list"></i></span>
                    Data Konseling
                </a>

                <a
                    href="{{ route('siswa.riwayat') }}" class="menu-item">
                    <span class="menu-icon"><i data-lucide="history"></i></span>
                    Riwayat Siswa
                </a>

                <a
                    href="{{ route('laporan.index') }}"class="menu-item sirasi-nav-link">
                    <span class="menu-icon"><i data-lucide="file-chart-column"></i></span>
                    Laporan
                </a>

                <a
                    href="{{ route('pengaturan.index') }}"class="menu-item sirasi-nav-link">
                    <span class="menu-icon"><i data-lucide="settings"></i></span>
                    Pengaturan
                </a>

            </nav>

        </div>


        <div class="sidebar-bottom" style="margin-top: auto;">

            <form action="{{ route('logout') }}" method="POST" onsubmit="return confirm('Anda yakin ingin keluar?');">
                @csrf

                <button
                    type="submit" class="menu-item logout-button">
                    <span class="menu-icon"><i data-lucide="log-out"></i></span>
                    Logout
                </button>
            </form>

        </div>

    </aside>


    
    <main class="main">


        
        <header class="header">

            <div class="search-box">

                <span class="search-icon">
                    <i data-lucide="search"></i>
                </span>

                <input
                    type="text"
                    placeholder="Cari siswa atau data..."
                >

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
                                    <small>{{ $notifikasi->created_at->diffForHumans() }}</small>
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
                            {{ auth()->user()->nama }}
                        </div>

                        <div class="profile-role">
                            {{ auth()->user()->role }}
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


        
        <section class="content">


            <a
                href="{{ route('siswa.index') }}"
                class="back-link"
                title="Kembali ke Data Siswa"
            >
                <i data-lucide="arrow-left"></i>
            </a>


            <div class="page-title">

                <div class="eyebrow">
                    Manajemen Data Siswa
                </div>

                <h1>
                    Edit Data Siswa
                </h1>

                <p>
                    Perbarui informasi detail siswa untuk menjaga
                    data bimbingan dan konseling tetap akurat.
                </p>

            </div>


            <div class="form-layout">


                
                <div class="form-card">


                    <div class="form-header">

                        <div class="form-header-icon">
                            ✎
                        </div>

                        <div>

                            <div class="form-header-title">
                                Perbarui Informasi Siswa
                            </div>

                            <div class="form-header-subtitle">
                                Pastikan informasi yang diperbarui sudah benar.
                            </div>

                        </div>

                    </div>


                    <div class="form-body">


                        @if ($errors->any())

                            <div class="error-summary">

                                <strong>
                                    Perubahan belum dapat disimpan.
                                </strong>

                                <ul>

                                    @foreach ($errors->all() as $error)

                                        <li>
                                            {{ $error }}
                                        </li>

                                    @endforeach

                                </ul>

                            </div>

                        @endif


                        <form
                            action="{{ route('siswa.update', $siswa->id_siswa) }}"
                            method="POST"
                        >

                            @csrf
                            @method('PUT')


                            <div class="section-label">
                                Data Utama Siswa
                            </div>


                            <div class="form-grid">



                                <div class="form-group">

                                    <label>
                                        Nama Lengkap Siswa
                                        <span class="required">*</span>
                                    </label>

                                    <input
                                        type="text"
                                        name="nama_siswa"
                                        class="form-control"
                                        value="{{ old('nama_siswa', $siswa->nama_siswa) }}"
                                        placeholder="Masukkan nama lengkap"
                                        required
                                    >

                                    @error('nama_siswa')

                                        <div class="error">
                                            {{ $message }}
                                        </div>

                                    @enderror

                                </div>


                                
                                <div class="form-group">

                                    <label>
                                        NIS / Nomor Induk
                                        <span class="required">*</span>
                                    </label>

                                    <input
                                        type="text"
                                        name="nis"
                                        class="form-control"
                                        value="{{ old('nis', $siswa->nis) }}"
                                        placeholder="Masukkan NIS"
                                        required
                                    >

                                    @error('nis')

                                        <div class="error">
                                            {{ $message }}
                                        </div>

                                    @enderror

                                </div>


                                
                                <div class="form-group">

                                    <label>
                                        Kelas
                                        <span class="required">*</span>
                                    </label>

                                    <select
                                        name="id_kelas"
                                        class="form-control"
                                        required
                                    >

                                        <option value="">
                                            Pilih Kelas
                                        </option>

                                        @foreach ($kelas as $item)

                                            <option
                                                value="{{ $item->id_kelas }}"
                                                {{ old('id_kelas', $siswa->id_kelas) == $item->id_kelas ? 'selected' : '' }}
                                            >
                                                {{ $item->nama_kelas }}
                                            </option>

                                        @endforeach

                                    </select>

                                    @error('id_kelas')

                                        <div class="error">
                                            {{ $message }}
                                        </div>

                                    @enderror

                                </div>



                                <div class="form-group">

                                    <label>
                                        Jenis Kelamin
                                        <span class="required">*</span>
                                    </label>


                                    <div class="gender-options">


                                        <label class="gender-option">

                                            <input
                                                type="radio"
                                                name="jenis_kelamin"
                                                value="L"
                                                {{ old('jenis_kelamin', $siswa->jenis_kelamin) == 'L' ? 'checked' : '' }}
                                                required
                                            >

                                            <span>
                                                Laki-laki
                                            </span>

                                        </label>


                                        <label class="gender-option">

                                            <input
                                                type="radio"
                                                name="jenis_kelamin"
                                                value="P"
                                                {{ old('jenis_kelamin', $siswa->jenis_kelamin) == 'P' ? 'checked' : '' }}
                                            >

                                            <span>
                                                Perempuan
                                            </span>

                                        </label>


                                    </div>


                                    @error('jenis_kelamin')

                                        <div class="error">
                                            {{ $message }}
                                        </div>

                                    @enderror

                                </div>


                            </div>


                            <hr class="divider">


                            <div class="section-label">
                                Informasi Kontak
                            </div>


                            <div class="form-grid">



                                <div class="form-group">

                                    <label>
                                        Nomor Telepon
                                        <span class="required">*</span>
                                    </label>

                                    <input
                                        type="text"
                                        name="no_telp"
                                        class="form-control"
                                        value="{{ old('no_telp', $siswa->no_telp) }}"
                                        placeholder="Contoh: 081234567890"
                                        required
                                    >

                                    <div class="hint">
                                        Masukkan nomor telepon yang masih aktif.
                                    </div>

                                    @error('no_telp')

                                        <div class="error">
                                            {{ $message }}
                                        </div>

                                    @enderror

                                </div>



                                <div class="form-group">

                                    <label>
                                        Alamat
                                        <span class="required">*</span>
                                    </label>

                                    <textarea
                                        name="alamat"
                                        class="form-control"
                                        placeholder="Masukkan alamat lengkap siswa..."
                                        required
                                    >{{ old('alamat', $siswa->alamat) }}</textarea>

                                    @error('alamat')

                                        <div class="error">
                                            {{ $message }}
                                        </div>

                                    @enderror

                                </div>


                            </div>


                            <hr class="divider">


                            <div class="form-actions">

                                <a
                                    href="{{ route('siswa.index') }}"
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


                
                <div class="info-column">


                    <div class="info-card primary">

                        <div class="info-content">

                            <div class="info-icon">
                                 <i data-lucide="edit"></i>
                            </div>

                            <div class="info-title">
                                Edit Data Siswa
                            </div>

                            <div class="info-text">
                                Perubahan data akan langsung diterapkan
                                pada data siswa yang tersimpan di sistem.
                            </div>


                            <div class="student-preview">

                                <div class="student-avatar">

                                    {{
                                        strtoupper(
                                            substr(
                                                $siswa->nama_siswa ?? 'S',
                                                0,
                                                1
                                            )
                                        )
                                    }}

                                </div>


                                <div>

                                    <strong>
                                        {{ $siswa->nama_siswa }}
                                    </strong>

                                    <span>
                                        NIS: {{ $siswa->nis ?: '-' }}
                                    </span>

                                </div>

                            </div>


                            <div class="steps">

                                <div class="step">

                                    <div class="step-number">
                                        1
                                    </div>

                                    <div class="step-text">
                                        Periksa kembali identitas siswa.
                                    </div>

                                </div>


                                <div class="step">

                                    <div class="step-number">
                                        2
                                    </div>

                                    <div class="step-text">
                                        Pastikan kelas dan kontak sudah benar.
                                    </div>

                                </div>


                                <div class="step">

                                    <div class="step-number">
                                        3
                                    </div>

                                    <div class="step-text">
                                        Klik simpan setelah semua perubahan selesai.
                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>


                    <div class="info-card">

                        <div class="info-icon">
                             <i data-lucide="info"></i>
                        </div>

                        <div class="info-title">
                            Perhatian
                        </div>

                        <div class="info-text">
                            Data siswa yang sudah memiliki riwayat konseling
                            tetap dapat diperbarui. Pastikan perubahan
                            tidak menghilangkan informasi penting.
                        </div>

                    </div>


                </div>


            </div>

        </section>

    </main>

</div>

<script>
    lucide.createIcons();

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
</script>

</body>

</html>
