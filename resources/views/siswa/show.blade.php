<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Riwayat Siswa - SIRASI-BK</title>

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
            --primary-soft: #f4f7ff;

            --bg: #f5f7fb;
            --white: #fff;

            --text: #172033;
            --muted: #737b8c;
            --border: #e4e8f0;

            --success: #16894a;
            --success-bg: #eaf8f0;

            --warning: #b76b00;
            --warning-bg: #fff5df;

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
        select {
            font-family: inherit;
        }

        
        .app {
            min-height: 100vh;
            display: flex;
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
            border-radius: 14px;
            background: rgba(255,255,255,.14);
            border: 1px solid rgba(255,255,255,.18);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            overflow: hidden;
        }

        .brand-logo img {
            width: 200px;
            height: 150px;
            object-fit: contain;
            transform: translateY(20px);
        }

        .menu-icon svg {
            width: 22px;
            height: 22px;
            stroke-width: 2;
        }

        .brand-name {
            font-size: 16px;
            font-weight: 800;
        }

        .brand-subtitle {
            margin-top: 3px;
            color: #cbd8ff;
            font-size: 11px;
        }

        .menu-title {
            padding: 0 12px 10px;

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
            transition: all .2s ease;
        }

        .menu-item:hover {
            background: rgba(255,255,255,.07);
            color: #ffffff;
        }

        .menu-item.active {
            background: rgba(255,255,255,.10);
            border-color: rgba(255,255,255,.14);
            color: #ffffff;
            box-shadow: inset 3px 0 0 rgba(184,211,255,.95);
        }

        .menu-item.active .menu-icon {
            background: rgba(255,255,255,.12);
            color: #ffffff;
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

        .sidebar-bottom {
            margin-top: auto;
            padding-top: 18px;
        }

        .logout-button {
            width: 100%;
            border: 0;
            background: transparent;
            cursor: pointer;
            text-align: left;
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

        .search {
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

        .search:focus-within {
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

        .search input {
            width: 100%;

            border: 0;
            outline: 0;

            background: transparent;

            color: var(--text);
            font-size: 13px;
        }

        .search input::placeholder {
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

            color: #9aa1ae;

            font-size: 8px;
        }

        .notification-empty {
            padding: 30px 20px;

            text-align: center;

            color: var(--muted);
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

        .profile-photo svg {
            width: 18px;
            height: 18px;
        }

        
        .content {
            padding: 32px;
            max-width: 1500px;
            margin: auto;
        }

        .back-link {
            width: 38px;
            height: 38px;

            display: inline-flex;
            align-items: center;
            justify-content: center;

            margin-bottom: 16px;

            border: 1px solid var(--border);
            border-radius: 11px;

            background: white;
            color: #687183;

            box-shadow: var(--shadow-sm);

            transition: .2s ease;
        }

        .back-link svg,
        .back-link i {
            width: 18px;
            height: 18px;
        }

        .back-link:hover {
            color: var(--primary);
            background: var(--primary-light);
            transform: translateX(-2px);
        }

        .page-heading {
            display: flex;
            align-items: flex-end;
            justify-content: space-between;
            gap: 20px;

            margin-bottom: 24px;
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
            letter-spacing: -.5px;
        }

        .page-description {
            margin-top: 7px;

            color: var(--muted);

            font-size: 13px;
            line-height: 1.6;
        }

        
        .layout {
            display: grid;

            grid-template-columns: 310px minmax(0, 1fr);

            gap: 20px;

            align-items: start;
        }

        
        .student-card {
            position: relative;
            overflow: hidden;

            border: 1px solid var(--border);
            border-radius: 20px;

            background: white;

            box-shadow: var(--shadow-md);
        }

        .student-cover {
            height: 88px;

            position: relative;
            overflow: hidden;

            background:
                linear-gradient(
                    135deg,
                    #173c91,
                    #3155a4
                );
        }

        .student-cover::before {
            content: "";

            position: absolute;

            width: 180px;
            height: 180px;

            right: -70px;
            top: -105px;

            border-radius: 50%;

            background: rgba(255,255,255,.09);
        }

        .student-cover::after {
            content: "";

            position: absolute;

            width: 120px;
            height: 120px;

            left: -70px;
            bottom: -80px;

            border-radius: 50%;

            background: rgba(255,255,255,.06);
        }

        .student-body {
            padding: 0 21px 21px;
        }

        .avatar {
            width: 88px;
            height: 88px;

            margin-top: -44px;
            margin-bottom: 13px;

            position: relative;
            z-index: 2;

            display: flex;
            align-items: center;
            justify-content: center;

            border: 5px solid white;
            border-radius: 22px;

            background:
                linear-gradient(
                    135deg,
                    #eaf0ff,
                    #d9e3ff
                );

            color: var(--primary);

            font-size: 31px;
            font-weight: 800;

            box-shadow: 0 10px 25px rgba(23,60,145,.16);
        }

        .student-name {
            font-size: 20px;
            font-weight: 800;

            line-height: 1.25;
        }

        .student-nis {
            margin-top: 5px;

            color: var(--muted);

            font-size: 11px;
        }

        .class-badge {
            display: inline-flex;
            align-items: center;
            gap: 7px;

            margin-top: 12px;

            padding: 7px 11px;

            border-radius: 10px;

            background: var(--primary-light);
            color: var(--primary);

            font-size: 11px;
            font-weight: 700;
        }

        .student-info {
            margin-top: 20px;
            padding-top: 17px;

            border-top: 1px solid var(--border);
        }

        .info-row {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;

            gap: 15px;

            padding: 11px 0;

            border-bottom: 1px solid #eef0f4;
        }

        .info-row:last-child {
            border-bottom: 0;
        }

        .info-label {
            color: var(--muted);
            font-size: 10px;
        }

        .info-value {
            max-width: 160px;

            color: var(--text);

            text-align: right;

            font-size: 11px;
            font-weight: 700;
        }

        .student-actions {
            display: flex;
            align-items: center;
            gap: 8px;
            flex-wrap: wrap;
            margin-top: 16px;
        }

        .student-actions .btn {
            min-height: 38px;
            height: 38px;
            padding: 0 12px;
            font-size: 11px;
            font-weight: 700;
            white-space: nowrap;
            box-sizing: border-box;
        }

        .student-actions .btn svg,
        .student-actions .btn i {
            width: 14px;
            height: 14px;
            flex-shrink: 0;
        }

        .student-actions .btn-session {
            flex: 1 1 auto;
            min-width: 0;
            padding: 0 12px;
            gap: 6px;
        }

        .student-actions .btn-sp {
            flex: 0 0 auto;
            padding: 0 12px;
            min-width: 38px;
        }

        .student-actions .btn-edit {
            flex: 0 0 38px;
            width: 38px;
            height: 38px;
            min-width: 38px;
            padding: 0;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .btn {
            min-height: 41px;

            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 7px;

            padding: 0 14px;

            border: 1px solid var(--border);
            border-radius: 10px;

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

        .btn-edit {
            padding: 0;
        }

        
        .history-card {
            position: relative;
            overflow: hidden;

            border: 1px solid var(--border);
            border-radius: 20px;

            background: white;

            box-shadow: var(--shadow-md);
        }

        .history-header {
            min-height: 76px;

            display: flex;
            align-items: center;
            justify-content: space-between;

            padding: 17px 21px;

            border-bottom: 1px solid var(--border);
        }

        .history-title-wrap {
            display: flex;
            align-items: center;
            gap: 11px;
        }

        .history-title-icon {
            width: 38px;
            height: 38px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 11px;

            background: var(--primary-light);
            color: var(--primary);

            font-size: 17px;
        }

        .history-title {
            font-size: 15px;
            font-weight: 800;
        }

        .history-subtitle {
            margin-top: 3px;

            color: var(--muted);

            font-size: 10px;
        }

        .filter-button {
            display: inline-flex;
            align-items: center;
            gap: 7px;

            padding: 8px 11px;

            border: 1px solid var(--border);
            border-radius: 9px;

            background: white;
            color: var(--primary);

            font-size: 10px;
            font-weight: 700;

            cursor: pointer;

            transition: .2s ease;
        }

        .filter-button:hover,
        .filter-button.active {
            background: var(--primary-light);
            border-color: #ccd8f5;
        }

        
        .filter-panel {
            margin: 17px 21px 0;

            padding: 17px;

            border: 1px solid #dce2ee;
            border-radius: 13px;

            background:
                linear-gradient(
                    135deg,
                    #f8faff,
                    #f4f6fb
                );

            box-shadow: inset 0 1px 0 rgba(255,255,255,.7);
        }

        .filter-grid {
            display: grid;

            grid-template-columns: repeat(4, 1fr);

            gap: 11px;
        }

        .filter-group label {
            display: block;

            margin-bottom: 6px;

            color: #596274;

            font-size: 9px;
            font-weight: 800;
        }

        .filter-control {
            width: 100%;
            height: 38px;

            padding: 0 10px;

            border: 1px solid var(--border);
            border-radius: 9px;

            outline: none;

            background: white;
            color: var(--text);

            font-size: 10px;

            transition: .2s ease;
        }

        .filter-control:focus {
            border-color: #91a8df;

            box-shadow:
                0 0 0 3px rgba(23,60,145,.05);
        }

        .filter-actions {
            display: flex;
            justify-content: flex-end;
            gap: 8px;

            margin-top: 13px;
        }

        .filter-actions .btn {
            min-height: 36px;
            font-size: 10px;
        }

        
        .timeline {
            position: relative;

            padding: 25px 21px 25px 49px;
        }

        .timeline::before {
            content: "";

            position: absolute;

            left: 28px;
            top: 35px;
            bottom: 38px;

            width: 2px;

            background:
                linear-gradient(
                    180deg,
                    #b7c6ed,
                    #e4e9f5
                );
        }

        .history-item {
            position: relative;

            margin-bottom: 17px;
        }

        .history-item:last-child {
            margin-bottom: 0;
        }

        .timeline-dot {
            width: 12px;
            height: 12px;

            position: absolute;

            left: -27px;
            top: 20px;

            border: 3px solid white;
            border-radius: 50%;

            background: #aebde4;

            box-shadow:
                0 0 0 1px #c8d3ed,
                0 3px 8px rgba(23,60,145,.10);
        }

        .history-item:first-child .timeline-dot {
            background: var(--primary);

            box-shadow:
                0 0 0 4px #e6ecff,
                0 0 0 1px #aebee7;
        }

        .history-box {
            padding: 17px;

            border: 1px solid var(--border);
            border-radius: 15px;

            background: #fff;

            box-shadow: var(--shadow-sm);

            transition: .2s ease;
        }

        .history-box:hover {
            border-color: #d3dcf2;

            transform: translateY(-2px);

            box-shadow: var(--shadow-md);
        }

        .history-top {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;

            gap: 15px;

            margin-bottom: 11px;
        }

        .problem-badge {
            display: inline-flex;
            align-items: center;

            padding: 5px 9px;

            border-radius: 8px;

            background: var(--primary-light);
            color: var(--primary);

            font-size: 9px;
            font-weight: 700;
        }

        .history-date {
            display: flex;
            align-items: center;

            color: var(--muted);

            font-size: 10px;
            white-space: nowrap;
        }

        .history-name {
            margin-bottom: 7px;

            font-size: 13px;
            font-weight: 800;
        }

        .history-description {
            color: #687182;

            font-size: 11px;
            line-height: 1.65;
        }

        .history-meta {
            display: flex;
            flex-wrap: wrap;
            gap: 7px;

            margin-top: 12px;
        }

        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: 5px;

            padding: 5px 9px;

            border-radius: 8px;

            font-size: 9px;
            font-weight: 700;
        }

        .status-badge.proses {
            background: var(--warning-bg);
            color: var(--warning);
        }

        .status-badge.selesai {
            background: var(--success-bg);
            color: var(--success);
        }

        .history-footer {
            display: flex;
            align-items: center;
            gap: 15px;

            margin-top: 14px;
            padding-top: 12px;

            border-top: 1px solid #edf0f4;
        }

        .history-action {
            color: var(--primary);

            font-size: 10px;
            font-weight: 700;

            transition: .2s ease;
        }

        .history-action:hover {
            color: var(--primary-dark);
        }

        .history-action.edit {
            color: #687182;
        }

        .empty-history {
            margin: 20px;

            padding: 50px 20px;

            border: 1px dashed #ccd4e4;
            border-radius: 15px;

            background: #fafbfe;

            text-align: center;

            color: var(--muted);

            font-size: 11px;
        }

        .empty-icon {
            width: 48px;
            height: 48px;

            display: flex;
            align-items: center;
            justify-content: center;

            margin: 0 auto 12px;

            border-radius: 14px;

            background: var(--primary-light);
            color: var(--primary);

            font-size: 20px;
        }

        
        @media (max-width: 1250px) {

            .sidebar {
                width: 235px;
            }

            .main {
                margin-left: 235px;
            }

            .layout {
                grid-template-columns: 1fr;
            }

            .student-card {
                display: grid;
                grid-template-columns: 240px 1fr auto;
                gap: 20px;
                padding: 20px;
            }

            .student-cover {
                display: none;
            }

            .student-body {
                padding: 0;
            }

            .avatar {
                margin-top: 0;
            }

            .student-info {
                margin-top: 0;
                padding-top: 0;
                border-top: 0;
            }

            .student-actions {
                align-self: end;
                min-width: 170px;
            }
        }

        @media (max-width: 900px) {

            .student-card {
                display: block;
            }

            .student-info {
                margin-top: 20px;
                padding-top: 17px;
                border-top: 1px solid var(--border);
            }

            .student-actions {
                margin-top: 16px;
            }

            .filter-grid {
                grid-template-columns: 1fr 1fr;
            }
        }

        @media (max-width: 750px) {

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
                padding: 0 18px;
            }

            .search {
                width: 260px;
            }

            .content {
                padding: 24px 18px;
            }

            .page-heading {
                align-items: flex-start;
            }

            .filter-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 600px) {

            .header {
                height: auto;
                min-height: 70px;

                padding: 12px;

                gap: 10px;
            }

            .search {
                width: 100%;
                height: 38px;
            }

            .profile-info {
                display: none;
            }

            .profile {
                padding-left: 0;
                border-left: 0;
            }

            .notification {
                display: none;
            }

            .content {
                padding: 18px 13px;
            }

            .page-title {
                font-size: 23px;
            }

            .page-description {
                font-size: 11px;
            }

            .history-header {
                padding: 15px;
            }

            .timeline {
                padding-left: 38px;
                padding-right: 15px;
            }

            .timeline::before {
                left: 20px;
            }

            .timeline-dot {
                left: -26px;
            }

            .history-top {
                flex-direction: column;
                gap: 8px;
            }
        }

        
        body.dark-mode {
            background: #0f1728 !important;
            color: #edf3ff !important;
        }

        body.dark-mode .main {
            background:
                radial-gradient(
                    circle at 90% 0%,
                    rgba(54, 91, 177, .12),
                    transparent 28%
                ),
                #0f1728 !important;
        }

        /* HEADER */

        body.dark-mode .header {
            background: rgba(15, 23, 40, .92) !important;
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

        body.dark-mode .search:focus-within {
            background: #141f33 !important;
            border-color: #5d83d5 !important;
        }

        body.dark-mode .notification {
            background: #162238 !important;
            border-color: #334463 !important;
            color: #cbd7ed !important;
        }

        body.dark-mode .notification-dot {
            border-color: #162238 !important;
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


        /* CONTENT */

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

        body.dark-mode .page-title {
            color: #edf3ff !important;
        }

        body.dark-mode .page-description {
            color: #9aa8c0 !important;
        }


        /* STUDENT CARD */

        body.dark-mode .student-card {
            background: #172238 !important;
            border-color: #293752 !important;
            box-shadow: 0 18px 45px rgba(0, 0, 0, .18) !important;
        }

        body.dark-mode .student-cover {
            background:
                linear-gradient(
                    135deg,
                    #203d7c,
                    #19346d
                ) !important;
        }

        body.dark-mode .avatar {
            border-color: #172238 !important;
            background:
                linear-gradient(
                    135deg,
                    #1d2c47,
                    #263a60
                ) !important;
            color: #a9c5ff !important;
        }

        body.dark-mode .student-name {
            color: #edf3ff !important;
        }

        body.dark-mode .student-nis {
            color: #9aa8c0 !important;
        }

        body.dark-mode .class-badge {
            background: #1d2c47 !important;
            color: #a9c5ff !important;
        }

        body.dark-mode .student-info {
            border-top-color: #293752 !important;
        }

        body.dark-mode .info-row {
            border-bottom-color: #293752 !important;
        }

        body.dark-mode .info-label {
            color: #8998b0 !important;
        }

        body.dark-mode .info-value {
            color: #cbd7ed !important;
        }


        /* BUTTON */

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
            background: linear-gradient(
                135deg,
                #2a55b8,
                #173c91
            ) !important;
            border-color: #3967d1 !important;
            color: #ffffff !important;
        }

        body.dark-mode .btn-primary:hover {
            background: linear-gradient(
                135deg,
                #315fc9,
                #1b429c
            ) !important;
        }


        /* HISTORY */

        body.dark-mode .history-card {
            background: #172238 !important;
            border-color: #293752 !important;
            box-shadow: 0 18px 45px rgba(0, 0, 0, .18) !important;
        }

        body.dark-mode .history-header {
            border-bottom-color: #293752 !important;
        }

        body.dark-mode .history-title {
            color: #edf3ff !important;
        }

        body.dark-mode .history-subtitle {
            color: #9aa8c0 !important;
        }

        body.dark-mode .history-title-icon {
            background: #1d2c47 !important;
            color: #a9c5ff !important;
        }

        body.dark-mode .filter-button {
            background: #162238 !important;
            border-color: #334463 !important;
            color: #a9c5ff !important;
        }

        body.dark-mode .filter-button:hover,
        body.dark-mode .filter-button.active {
            background: #1d2c47 !important;
            border-color: #405578 !important;
        }


        /* FILTER */

        body.dark-mode .filter-panel {
            background:
                linear-gradient(
                    135deg,
                    #141f33,
                    #172238
                ) !important;
            border-color: #334463 !important;
            box-shadow: none !important;
        }

        body.dark-mode .filter-group label {
            color: #a9b7ce !important;
        }

        body.dark-mode .filter-control {
            background: #111d31 !important;
            border-color: #334463 !important;
            color: #edf3ff !important;
        }

        body.dark-mode .filter-control:focus {
            background: #142238 !important;
            border-color: #5d83d5 !important;
        }


        /* TIMELINE */

        body.dark-mode .timeline::before {
            background:
                linear-gradient(
                    180deg,
                    #405578,
                    #293752
                ) !important;
        }

        body.dark-mode .timeline-dot {
            border-color: #172238 !important;
            background: #53698f !important;
            box-shadow:
                0 0 0 1px #405578,
                0 3px 8px rgba(0, 0, 0, .18) !important;
        }

        body.dark-mode .history-item:first-child .timeline-dot {
            background: #5d83d5 !important;
            box-shadow:
                0 0 0 4px #1d2c47,
                0 0 0 1px #5d83d5 !important;
        }

        body.dark-mode .history-box {
            background: #172238 !important;
            border-color: #293752 !important;
            box-shadow: 0 6px 18px rgba(0, 0, 0, .12) !important;
        }

        body.dark-mode .history-box:hover {
            border-color: #405578 !important;
        }

        body.dark-mode .problem-badge {
            background: #1d2c47 !important;
            color: #a9c5ff !important;
        }

        body.dark-mode .history-date {
            color: #9aa8c0 !important;
        }

        body.dark-mode .history-name {
            color: #edf3ff !important;
        }

        body.dark-mode .history-description {
            color: #9aa8c0 !important;
        }

        body.dark-mode .history-footer {
            border-top-color: #293752 !important;
        }

        body.dark-mode .history-action {
            color: #a9c5ff !important;
        }

        body.dark-mode .history-action.edit {
            color: #9aa8c0 !important;
        }


        /* STATUS */

        body.dark-mode .status-badge.proses {
            background: #1d2c47 !important;
            color: #a9c5ff !important;
        }

        body.dark-mode .status-badge.selesai {
            background: #193a2a !important;
            color: #75d6a0 !important;
        }


        /* EMPTY HISTORY */

        body.dark-mode .empty-history {
            background: #141f33 !important;
            border-color: #405578 !important;
            color: #9aa8c0 !important;
        }

        body.dark-mode .empty-history strong {
            color: #edf3ff !important;
        }

        body.dark-mode .empty-icon {
            background: #1d2c47 !important;
            color: #a9c5ff !important;
        }

    </style>
</head>

<body>

<div class="app">

    
    <aside class="sidebar sirasi-sidebar">

        <div>

            <div class="brand sirasi-sidebar__brand">

                <div class="brand-logo sirasi-sidebar__logo">
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


            <nav class="menu sirasi-sidebar__nav">

                <a
                    href="{{ route('dashboard') }}"class="menu-item sirasi-nav-link">
                    <span class="menu-icon"><i data-lucide="home"></i></span>
                    Dashboard
                </a>

                <a
                    href="{{ route('siswa.index') }}" class="menu-item {{ request('from') === 'riwayat' ? '' : 'active' }}">
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
                    href="{{ route('siswa.riwayat') }}" class="menu-item {{ request('from') === 'riwayat' ? 'active' : '' }}">
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


        <div class="sidebar-bottom">

            <form action="{{ route('logout') }}" method="POST" onsubmit="return confirm('Anda yakin ingin keluar?');">

                @csrf

                <button
                    type="submit" class="menu-item sirasi-nav-link logout-button">
                    <span class="menu-icon"><i data-lucide="log-out"></i></span>
                    Logout
                </button>

            </form>

        </div>

    </aside>


    
    <main class="main">


        
        <header class="header">

            <div class="search">

                <span class="search-icon"><i data-lucide="search"></i></span>


                <input
                    type="text"
                    placeholder="Cari data konseling..."
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

                            {{ auth()->user()->nama ?? 'Guru BK' }}

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
                href="{{ request('from') === 'riwayat' ? route('siswa.riwayat') : route('siswa.index') }}"
                class="back-link"
                title="{{ request('from') === 'riwayat' ? 'Kembali ke Riwayat Siswa' : 'Kembali ke Data Siswa' }}"
            >
                <i data-lucide="arrow-left"></i>
            </a>


            <div class="page-heading">

                <div>

                    <div class="eyebrow">
                        Profil & Riwayat
                    </div>

                    <h1 class="page-title">
                        Riwayat Siswa
                    </h1>

                    <p class="page-description">
                        Lihat informasi siswa dan seluruh riwayat
                        sesi bimbingan konseling secara terstruktur.
                    </p>

                </div>

            </div>


            <div class="layout">


                
                <div class="student-card">

                    <div class="student-cover"></div>


                    <div class="student-body">


                        <div class="avatar">

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


                        <div class="student-name">
                            {{ $siswa->nama_siswa }}
                        </div>


                        <div class="student-nis">
                            NIS: {{ $siswa->nis ?? '-' }}
                        </div>


                        <div class="class-badge">
                            <i data-lucide="graduation-cap"></i>
                            Kelas {{ $siswa->kelas->nama_kelas ?? '-' }}
                        </div>


                        <div class="student-info">


                            <div class="info-row">

                                <span class="info-label">
                                    Jenis Kelamin
                                </span>

                                <span class="info-value">

                                    @if ($siswa->jenis_kelamin === 'L')
                                        Laki-laki
                                    @elseif ($siswa->jenis_kelamin === 'P')
                                        Perempuan
                                    @else
                                        -
                                    @endif

                                </span>

                            </div>


                            <div class="info-row">

                                <span class="info-label">
                                    Nomor Telepon
                                </span>

                                <span class="info-value">
                                    {{ $siswa->no_telp ?: '-' }}
                                </span>

                            </div>


                            <div class="info-row">

                                <span class="info-label">
                                    Total Konseling
                                </span>

                                <span class="info-value">
                                    {{ $totalKonseling }} Sesi
                                </span>

                            </div>


                            <div class="info-row">

                                <span class="info-label">
                                    Konseling Terakhir
                                </span>

                                <span class="info-value">

                                    @if ($konselingTerakhir)

                                        {{ \Carbon\Carbon::parse($konselingTerakhir->tanggal)->format('d M Y') }}

                                    @else

                                        Belum ada

                                    @endif

                                </span>

                            </div>


                        </div>


                        <div class="student-actions">

                            <a
                                href="{{ route('konseling.create', ['id_siswa' => $siswa->id_siswa]) }}"
                                class="btn btn-primary btn-session"
                                title="Tambah Sesi Baru"
                            >
                                <i data-lucide="plus"></i>
                                Sesi
                            </a>

                            @if ($totalKonseling >= 3)
                                <a
                                    href="{{ route('siswa.surat_panggilan', $siswa->id_siswa) }}"
                                    class="btn btn-primary btn-sp"
                                    title="Buat Surat Panggilan Orang Tua"
                                >
                                    SP
                                </a>
                            @endif

                            <a
                                href="{{ route('siswa.edit', $siswa->id_siswa) }}"
                                class="btn btn-edit"
                                title="Edit siswa"
                            >
                                <i data-lucide="pencil"></i>
                            </a>

                        </div>

                    </div>

                </div>


                
                <div class="history-card">


                    <div class="history-header">

                        <div class="history-title-wrap">

                            <div class="history-title-icon">
                                <i data-lucide="history"></i>
                            </div>

                            <div>

                                <div class="history-title">
                                    Riwayat Konseling
                                </div>

                                <div class="history-subtitle">
                                    Catatan sesi konseling siswa
                                </div>

                            </div>

                        </div>


                        <button
                            type="button"
                            id="filterButton"
                            class="filter-button"
                            onclick="toggleFilter()"
                        >
                            <i data-lucide="sliders-horizontal"></i>
                            Filter
                            <span id="filterArrow">
                                <i data-lucide="chevron-down"></i>
                            </span>
                        </button>

                    </div>


                    
                    <div
                        id="filterPanel"
                        class="filter-panel"
                        style="display: none;"
                    >

                        <form
                            action="{{ route('siswa.show', $siswa->id_siswa) }}"
                            method="GET"
                        >
                            @if (request('from'))
                                <input type="hidden" name="from" value="{{ request('from') }}">
                            @endif

                            <div class="filter-grid">


                                
                                <div class="filter-group">

                                    <label for="id_jenis">
                                        Jenis Masalah
                                    </label>

                                    <select
                                        name="id_jenis"
                                        id="id_jenis"
                                        class="filter-control"
                                    >

                                        <option value="">
                                            Semua Jenis Masalah
                                        </option>

                                        @foreach ($jenisMasalah as $jenis)

                                            <option
                                                value="{{ $jenis->id_jenis }}"
                                                {{ request('id_jenis') == $jenis->id_jenis ? 'selected' : '' }}
                                            >
                                                {{ $jenis->nama_jenis }}
                                            </option>

                                        @endforeach

                                    </select>

                                </div>


                                
                                <div class="filter-group">

                                    <label for="status">
                                        Status
                                    </label>

                                    <select
                                        name="status"
                                        id="status"
                                        class="filter-control"
                                    >

                                        <option value="">
                                            Semua Status
                                        </option>

                                        <option
                                            value="Proses"
                                            {{ request('status') == 'Proses' ? 'selected' : '' }}
                                        >
                                            Proses
                                        </option>

                                        <option
                                            value="Selesai"
                                            {{ request('status') == 'Selesai' ? 'selected' : '' }}
                                        >
                                            Selesai
                                        </option>

                                    </select>

                                </div>



                                <div class="filter-group">

                                    <label for="tanggal_mulai">
                                        Dari Tanggal
                                    </label>

                                    <input
                                        type="date"
                                        name="tanggal_mulai"
                                        id="tanggal_mulai"
                                        class="filter-control"
                                        value="{{ request('tanggal_mulai') }}"
                                    >

                                </div>



                                <div class="filter-group">

                                    <label for="tanggal_akhir">
                                        Sampai Tanggal
                                    </label>

                                    <input
                                        type="date"
                                        name="tanggal_akhir"
                                        id="tanggal_akhir"
                                        class="filter-control"
                                        value="{{ request('tanggal_akhir') }}"
                                    >

                                </div>

                            </div>


                            <div class="filter-actions">

                                <a
                                    href="{{ request('from') ? route('siswa.show', ['siswa' => $siswa->id_siswa, 'from' => request('from')]) : route('siswa.show', $siswa->id_siswa) }}"
                                    class="btn"
                                >
                                    Reset
                                </a>

                                <button
                                    type="submit"
                                    class="btn btn-primary"
                                >
                                    <i data-lucide="check"></i>
                                    Terapkan Filter
                                </button>

                            </div>

                        </form>

                    </div>


                    
                    @if ($konseling->count())

                        <div class="timeline">


                            @foreach ($konseling as $index => $item)

                                <div class="history-item">


                                    <span class="timeline-dot"></span>


                                    <div class="history-box">


                                        <div class="history-top">

                                            <div>

                                                @if ($item->jenisMasalah)

                                                    <span class="problem-badge">
                                                        {{ $item->jenisMasalah->nama_jenis }}
                                                    </span>

                                                @else

                                                    <span class="problem-badge">
                                                        Konseling
                                                    </span>

                                                @endif

                                            </div>


                                            <div class="history-date">

                                                <span style="margin-right:5px;">
                                                    <i data-lucide="calendar-days"></i>
                                                </span>

                                                {{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}

                                            </div>

                                        </div>


                                        <div class="history-name">

                                            {{ $item->jenisMasalah->nama_jenis ?? 'Sesi Konseling' }}

                                        </div>


                                        <div class="history-description">

                                            {{ $item->masalah ?: 'Tidak ada keterangan masalah.' }}

                                        </div>


                                        
                                        @if (!empty($item->status))

                                            <div class="history-meta">

                                                @if ($item->status === 'Selesai')

                                                    <span class="status-badge selesai">
                                                        <i data-lucide="circle-check"></i>
                                                        Selesai
                                                    </span>

                                                @else

                                                    <span class="status-badge proses">
                                                        <i data-lucide="clock-3"></i>
                                                        {{ $item->status }}
                                                    </span>
                                                @endif

                                            </div>

                                        @endif


                                        <div class="history-footer">

                                            <a
                                                href="{{ route('konseling.show', $item->id_konseling) }}"
                                                class="history-action"
                                            >
                                                Lihat Detail <i data-lucide="arrow-right"></i>
                                            </a>


                                            <a
                                                href="{{ route('konseling.edit', $item->id_konseling) }}"
                                                class="history-action edit"
                                            >
                                                <i data-lucide="pencil"></i>
                                                &nbsp;Edit
                                            </a>

                                        </div>

                                    </div>

                                </div>

                            @endforeach


                        </div>

                    @else


                        <div class="empty-history">

                            <div class="history-title-icon">
                                <i data-lucide="history"></i>
                            </div>

                            <strong style="display:block; margin-bottom:6px;">
                                Belum Ada Riwayat
                            </strong>

                            <span>
                                Tidak ada riwayat konseling yang sesuai
                                dengan filter yang dipilih.
                            </span>

                        </div>


                    @endif


                </div>

            </div>

        </section>

    </main>

</div>


<script>

    function toggleFilter() {
        const panel = document.getElementById('filterPanel');
        const button = document.getElementById('filterButton');
        const arrow = document.getElementById('filterArrow');

        if (
            panel.style.display === 'none' ||
            panel.style.display === ''
        ) {

            panel.style.display = 'block';
            button.classList.add('active');

            arrow.innerHTML = '<i data-lucide="chevron-up"></i>';
            lucide.createIcons();

        } else {

            panel.style.display = 'none';
            button.classList.remove('active');

            arrow.innerHTML = '<i data-lucide="chevron-down"></i>';
            lucide.createIcons();
        }
    }

</script>

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
