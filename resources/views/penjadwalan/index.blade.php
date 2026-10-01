<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Penjadwalan BK - SIRASI-BK</title>

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

            --orange: #c98516;
            --orange-bg: #fff7e8;

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

        .menu-icon svg {
            width: 22px;
            height: 22px;
            stroke-width: 2;
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

            color: inherit;
            font: inherit;
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

        .header-space {
            flex: 1;
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

            cursor: pointer;
        }

        .notification svg {
            width: 17px;
            height: 17px;
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
            max-width: 1700px;
            margin: auto;
        }

        .page-header {
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

        .page-title h1 {
            font-size: 27px;
            line-height: 1.2;
            font-weight: 800;
            letter-spacing: -.5px;
        }

        .page-title p {
            margin-top: 7px;

            color: var(--muted);

            font-size: 13px;
        }



        .btn {
            height: 42px;

            display: inline-flex;
            align-items: center;
            justify-content: center;

            gap: 7px;

            padding: 0 16px;

            border: 1px solid var(--border);
            border-radius: 11px;

            background: white;

            color: var(--text);

            font-size: 12px;
            font-weight: 700;

            cursor: pointer;

            box-shadow: var(--shadow-sm);

            transition: .2s ease;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-md);
        }

        .btn svg {
            width: 16px;
            height: 16px;
        }

        .btn-primary {
            background: var(--primary);
            border-color: var(--primary);
            color: white;

            box-shadow:
                0 8px 20px rgba(23,60,145,.20);
        }

        .btn-primary:hover {
            background: var(--primary-dark);
        }



        .summary-grid {
            display: grid;

            grid-template-columns: repeat(3, 1fr);

            gap: 16px;

            margin-bottom: 20px;
        }

        .summary-card {
            position: relative;

            overflow: hidden;

            padding: 18px 20px;

            border: 1px solid var(--border);
            border-radius: 17px;

            background: white;

            box-shadow: var(--shadow-sm);
        }

        .summary-card::after {
            content: "";

            position: absolute;

            width: 110px;
            height: 110px;

            right: -50px;
            top: -55px;

            border-radius: 50%;

            background: rgba(23,60,145,.035);
        }

        .summary-label {
            position: relative;
            z-index: 1;

            color: var(--muted);

            font-size: 10px;
            font-weight: 700;
        }

        .summary-number {
            position: relative;
            z-index: 1;

            margin-top: 4px;

            color: var(--text);

            font-size: 24px;
            font-weight: 800;
        }



        .filter-card {
            position: relative;

            overflow: hidden;

            margin-bottom: 20px;

            padding: 20px;

            border: 1px solid var(--border);
            border-radius: 18px;

            background: white;

            box-shadow: var(--shadow-sm);
        }

        .filter-card::before {
            content: "";

            position: absolute;

            width: 180px;
            height: 180px;

            right: -120px;
            bottom: -120px;

            border-radius: 50%;

            background: rgba(23,60,145,.035);
        }

        .filter-header {
            display: flex;
            align-items: center;

            gap: 11px;

            margin-bottom: 15px;
        }

        .filter-icon {
            width: 34px;
            height: 34px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 10px;

            background: var(--primary-light);

            color: var(--primary);

            font-size: 14px;
        }

        .filter-icon svg {
            width: 17px;
            height: 17px;
        }

        .filter-title {
            font-size: 14px;
            font-weight: 800;
        }

        .filter-subtitle {
            margin-top: 3px;

            color: var(--muted);

            font-size: 10px;
        }

        .filter-form {
            position: relative;
            z-index: 1;

            display: grid;

            grid-template-columns:
                minmax(220px, 1fr)
                180px
                180px
                auto;

            gap: 10px;
        }

        .input {
            width: 100%;
            height: 42px;

            padding: 0 13px;

            border: 1px solid var(--border);
            border-radius: 11px;

            outline: none;

            background: #fafbfe;

            color: var(--text);

            font-size: 12px;

            transition: .2s ease;
        }

        .input:focus {
            border-color: #9bb0e8;

            background: white;

            box-shadow:
                0 0 0 4px rgba(23,60,145,.05);
        }

        select.input {
            cursor: pointer;
        }

        .filter-button {
            height: 42px;

            display: inline-flex;
            align-items: center;
            justify-content: center;

            gap: 7px;

            padding: 0 17px;

            border: 0;
            border-radius: 11px;

            background: var(--primary);

            color: white;

            font-size: 12px;
            font-weight: 700;

            cursor: pointer;

            box-shadow:
                0 8px 20px rgba(23,60,145,.20);

            transition: .2s ease;
        }

        .filter-button:hover {
            background: var(--primary-dark);
            transform: translateY(-1px);
        }

        .filter-button svg {
            width: 16px;
            height: 16px;
        }



        .table-card {
            overflow: hidden;

            border: 1px solid var(--border);
            border-radius: 18px;

            background: white;

            box-shadow: var(--shadow-sm);
        }

        .table-top {
            min-height: 68px;

            display: flex;
            align-items: center;
            justify-content: space-between;

            padding: 0 21px;

            border-bottom: 1px solid var(--border);
        }

        .table-title-area {
            display: flex;
            align-items: center;

            gap: 10px;
        }

        .table-title-icon {
            width: 35px;
            height: 35px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 10px;

            background: var(--primary-light);

            color: var(--primary);
        }

        .table-title-icon svg {
            width: 17px;
            height: 17px;
        }

        .table-title {
            font-size: 14px;
            font-weight: 800;
        }

        .table-subtitle {
            margin-top: 3px;

            color: var(--muted);

            font-size: 10px;
        }

        .result-count {
            padding: 6px 10px;

            border-radius: 8px;

            background: var(--primary-soft);

            color: var(--primary);

            font-size: 10px;
            font-weight: 700;
        }

        .schedule-list {
            padding: 20px;

            display: grid;

            grid-template-columns: repeat(
                auto-fit,
                minmax(320px, 1fr)
            );

            gap: 16px;
        }

        .schedule-card {
            position: relative;

            display: flex;
            flex-direction: column;

            min-width: 0;

            padding: 18px;

            border: 1px solid var(--border);
            border-radius: 17px;

            background: #ffffff;

            box-shadow: 0 4px 12px rgba(23,60,145,.045);

            transition: .2s ease;
        }

        .schedule-card:hover {
            transform: translateY(-3px);

            border-color: #d2dcf1;

            box-shadow: var(--shadow-md);
        }

        .schedule-card-top {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;

            gap: 12px;

            padding-bottom: 15px;

            border-bottom: 1px solid #edf0f5;
        }

        .schedule-number {
            width: 30px;
            height: 30px;

            display: flex;
            align-items: center;
            justify-content: center;

            flex-shrink: 0;

            border-radius: 9px;

            background: var(--primary-light);

            color: var(--primary);

            font-size: 11px;
            font-weight: 800;
        }

        .schedule-status {
            margin-left: auto;
        }



        .schedule-student {
            display: flex;
            align-items: center;

            gap: 11px;

            margin-top: 16px;
        }

        .student-avatar {
            width: 43px;
            height: 43px;

            flex-shrink: 0;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 13px;

            background:
                linear-gradient(
                    135deg,
                    #e8eeff,
                    #dce6ff
                );

            color: var(--primary);

            font-size: 13px;
            font-weight: 800;
        }

        .student-info {
            min-width: 0;
        }

        .student-info strong {
            display: block;

            color: var(--text);

            font-size: 13px;
            font-weight: 800;

            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .student-info span {
            display: block;

            margin-top: 3px;

            color: #9299a8;

            font-size: 10px;
        }



        .schedule-info {
            display: grid;

            grid-template-columns: 1fr 1fr;

            gap: 10px;

            margin-top: 17px;
        }

        .info-box {
            min-width: 0;

            padding: 11px;

            border-radius: 11px;

            background: #f8faff;

            border: 1px solid #edf1f8;
        }

        .info-label {
            display: flex;
            align-items: center;

            gap: 5px;

            margin-bottom: 5px;

            color: #8a94a6;

            font-size: 9px;
            font-weight: 700;

            text-transform: uppercase;
            letter-spacing: .3px;
        }

        .info-label svg {
            width: 12px;
            height: 12px;
        }

        .info-value {
            color: var(--text);

            font-size: 11px;
            font-weight: 700;

            line-height: 1.4;
        }

        .schedule-type {
            margin-top: 11px;

            padding: 11px;

            border-radius: 11px;

            background: #f8faff;

            border: 1px solid #edf1f8;
        }

        .schedule-type .info-value {
            color: #4f596b;
        }



        .schedule-note {
            margin-top: 11px;

            padding: 11px;

            border-radius: 11px;

            background: #fffaf0;

            border: 1px solid #f3e8cf;
        }

        .schedule-note .info-label {
            color: #a27832;
        }

        .schedule-note .info-value {
            color: #665638;

            font-weight: 500;
        }



        .status-badge {
            display: inline-flex;
            align-items: center;

            gap: 6px;

            padding: 6px 9px;

            border-radius: 8px;

            font-size: 10px;
            font-weight: 700;
        }

        .status-dot {
            width: 6px;
            height: 6px;

            border-radius: 50%;
        }

        .status-terjadwal {
            background: #eef4ff;
            color: #2855b7;
        }

        .status-terjadwal .status-dot {
            background: #5c82dc;
        }

        .status-selesai {
            background: var(--green-bg);
            color: var(--green);
        }

        .status-selesai .status-dot {
            background: #55c98a;
        }

        .status-dibatalkan {
            background: var(--red-bg);
            color: var(--red);
        }

        .status-dibatalkan .status-dot {
            background: #e46c6c;
        }



        .schedule-actions {
            display: flex;
            align-items: center;

            gap: 7px;

            margin-top: 16px;
            padding-top: 15px;

            border-top: 1px solid #edf0f5;
        }

        .action-button {
            height: 34px;

            flex: 1;

            display: inline-flex;
            align-items: center;
            justify-content: center;

            gap: 6px;

            padding: 0 10px;

            border: 1px solid #dce3ef;
            border-radius: 9px;

            background: white;

            color: #60708a;

            cursor: pointer;

            font-size: 10px;
            font-weight: 700;

            transition: .2s ease;
        }

        .action-button:hover {
            background: #f2f5fb;

            border-color: #c5d1e5;

            color: var(--primary);
        }

        .action-button.delete {
            flex: 0 0 38px;

            color: var(--red);
        }

        .action-button.delete:hover {
            background: var(--red-bg);

            border-color: #efcaca;

            color: #c93434;
        }

        .action-button svg {
            width: 14px;
            height: 14px;
        }



        .empty-state {
            padding: 60px 20px;

            text-align: center;
        }

        .empty-icon {
            width: 55px;
            height: 55px;

            display: flex;
            align-items: center;
            justify-content: center;

            margin: 0 auto 13px;

            border-radius: 15px;

            background: var(--primary-light);

            color: var(--primary);
        }

        .empty-icon svg {
            width: 25px;
            height: 25px;
        }

        .empty-title {
            color: var(--text);

            font-size: 14px;
            font-weight: 800;
        }

        .empty-text {
            margin-top: 6px;

            color: var(--muted);

            font-size: 11px;
        }



        .table-footer {
            min-height: 62px;

            display: flex;
            align-items: center;
            justify-content: space-between;

            gap: 15px;

            padding: 0 20px;

            border-top: 1px solid var(--border);

            background: #fcfdff;
        }

        .table-count {
            color: var(--muted);

            font-size: 10px;
        }

        .table-count strong {
            color: var(--text);
        }

        .pagination-wrapper {
            display: flex;
            align-items: center;
        }

        .pagination-wrapper nav {
            display: flex;
            align-items: center;
        }

        .pagination-wrapper svg {
            width: 14px;
            height: 14px;
        }

        .pagination-wrapper a,
        .pagination-wrapper span {
            font-size: 10px !important;
        }



        @media (max-width: 1050px) {

            .sidebar {
                width: 250px;
            }

            .main {
                margin-left: 250px;
            }

            .filter-form {
                grid-template-columns: 1fr 1fr;
            }

            .filter-button {
                width: 100%;
            }

            .summary-grid {
                grid-template-columns: 1fr 1fr;
            }

            .schedule-list {
                grid-template-columns: repeat(
                    auto-fit,
                    minmax(290px, 1fr)
                );
            }

        }


        @media (max-width: 750px) {

            .sidebar {
                width: 80px;
                padding: 20px 10px;
            }

            .main {
                margin-left: 80px;
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

            .profile-info {
                display: none;
            }

            .profile {
                padding-left: 12px;
            }

            .content {
                padding: 24px 15px 35px;
            }

            .page-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 16px;
            }

            .page-header > a {
                width: 100%;
            }

            .summary-grid {
                grid-template-columns: 1fr;
            }

            .filter-form {
                grid-template-columns: 1fr;
            }

            .schedule-list {
                grid-template-columns: 1fr;

                padding: 15px;
            }

            .schedule-info {
                grid-template-columns: 1fr 1fr;
            }

            .table-footer {
                flex-direction: column;

                align-items: flex-start;

                padding: 15px 20px;
            }

        }


        @media (max-width: 430px) {

            .schedule-info {
                grid-template-columns: 1fr;
            }

            .schedule-actions {
                flex-wrap: wrap;
            }

            .action-button.delete {
                flex: 0 0 38px;
            }

        }



        body.dark-mode {
            background:
                radial-gradient(
                    circle at 85% 0%,
                    rgba(54,91,177,.12),
                    transparent 28%
                ),
                #0f1728 !important;

            color: #edf3ff !important;
        }

        body.dark-mode .main {
            background: transparent !important;
        }

        body.dark-mode .header {
            background: rgba(15,23,40,.92) !important;
            border-bottom-color: #293752 !important;
        }

        body.dark-mode .notification {
            background: #172238 !important;
            border-color: #334463 !important;
            color: #cbd7ed !important;
            box-shadow: none !important;
        }

        body.dark-mode .notification-dot {
            border-color: #172238 !important;
        }

        body.dark-mode .profile {
            border-left-color: #334463 !important;
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

        body.dark-mode .page-title h1 {
            color: #edf3ff !important;
        }

        body.dark-mode .page-title p {
            color: #9aa8c0 !important;
        }

        body.dark-mode .eyebrow {
            color: #7fa7ff !important;
        }


        /* SUMMARY */

        body.dark-mode .summary-card {
            background:
                linear-gradient(
                    145deg,
                    #18253b 0%,
                    #141f33 100%
                ) !important;

            border-color: #2c3b57 !important;

            box-shadow:
                0 15px 35px rgba(0,0,0,.22) !important;
        }

        body.dark-mode .summary-label {
            color: #9aa8c0 !important;
        }

        body.dark-mode .summary-number {
            color: #f1f5ff !important;
        }


        /* FILTER */

        body.dark-mode .filter-card {
            background:
                linear-gradient(
                    145deg,
                    #18253b 0%,
                    #141f33 100%
                ) !important;

            border-color: #2c3b57 !important;

            box-shadow:
                0 15px 35px rgba(0,0,0,.22) !important;
        }

        body.dark-mode .filter-title {
            color: #f1f5ff !important;
        }

        body.dark-mode .filter-subtitle {
            color: #9aa8c0 !important;
        }

        body.dark-mode .filter-icon {
            background: #1d3154 !important;
            color: #9fc0ff !important;
            border-color: #304b78 !important;
        }

        body.dark-mode .input {
            background: #111c2e !important;
            border-color: #344560 !important;
            color: #edf3ff !important;
        }

        body.dark-mode .input::placeholder {
            color: #697a96 !important;
        }

        body.dark-mode .input:focus {
            background: #142137 !important;
            border-color: #6286d1 !important;

            box-shadow:
                0 0 0 3px rgba(98,134,209,.15) !important;
        }


        /* CARD CONTAINER */

        body.dark-mode .table-card {
            background:
                linear-gradient(
                    145deg,
                    #18253b 0%,
                    #141f33 100%
                ) !important;

            border-color: #2c3b57 !important;

            box-shadow:
                0 15px 35px rgba(0,0,0,.22) !important;
        }

        body.dark-mode .table-top {
            border-bottom-color: #293752 !important;
        }

        body.dark-mode .table-title {
            color: #f1f5ff !important;
        }

        body.dark-mode .table-subtitle {
            color: #9aa8c0 !important;
        }

        body.dark-mode .table-title-icon {
            background: #1d3154 !important;
            color: #9fc0ff !important;
            border-color: #304b78 !important;
        }

        body.dark-mode .result-count {
            background: #1d2c47 !important;
            color: #a9c5ff !important;
        }


        /* SCHEDULE CARD */

        body.dark-mode .schedule-card {
            background:
                linear-gradient(
                    145deg,
                    #18253b 0%,
                    #141f33 100%
                ) !important;

            border-color: #2d3d5b !important;

            box-shadow:
                0 8px 20px rgba(0,0,0,.18) !important;
        }

        body.dark-mode .schedule-card:hover {
            border-color: #45618f !important;

            box-shadow:
                0 15px 30px rgba(0,0,0,.25) !important;
        }

        body.dark-mode .schedule-card-top {
            border-bottom-color: #293752 !important;
        }

        body.dark-mode .schedule-number {
            background: #1d3154 !important;
            color: #9fc0ff !important;
        }

        body.dark-mode .student-avatar {
            background: #1d2c47 !important;
            color: #a9c5ff !important;
        }

        body.dark-mode .student-info strong {
            color: #f1f5ff !important;
        }

        body.dark-mode .student-info span {
            color: #8797b2 !important;
        }

        body.dark-mode .info-box,
        body.dark-mode .schedule-type {
            background: #111c2e !important;

            border-color: #293a58 !important;
        }

        body.dark-mode .info-label {
            color: #8293ae !important;
        }

        body.dark-mode .info-value {
            color: #edf3ff !important;
        }

        body.dark-mode .schedule-type .info-value {
            color: #c0cadb !important;
        }

        body.dark-mode .schedule-note {
            background: #302a20 !important;

            border-color: #5a4b31 !important;
        }

        body.dark-mode .schedule-note .info-label {
            color: #c5a45d !important;
        }

        body.dark-mode .schedule-note .info-value {
            color: #d5c7a9 !important;
        }

        body.dark-mode .schedule-actions {
            border-top-color: #293752 !important;
        }


        /* STATUS */

        body.dark-mode .status-terjadwal {
            background: #1d2c47 !important;
            color: #a9c5ff !important;
        }

        body.dark-mode .status-terjadwal .status-dot {
            background: #6f9cff !important;
        }

        body.dark-mode .status-selesai {
            background: #193a2a !important;
            color: #9be0b8 !important;
        }

        body.dark-mode .status-selesai .status-dot {
            background: #55c98a !important;
        }

        body.dark-mode .status-dibatalkan {
            background: #3a2028 !important;
            color: #ff9aa5 !important;
        }

        body.dark-mode .status-dibatalkan .status-dot {
            background: #e46c6c !important;
        }


        /* ACTION */

        body.dark-mode .action-button {
            background: #18253b !important;

            border-color: #3b5685 !important;

            color: #a9c5ff !important;

            box-shadow: none !important;
        }

        body.dark-mode .action-button:hover {
            background: #22365a !important;

            border-color: #5d83d5 !important;

            color: #ffffff !important;
        }

        body.dark-mode .action-button.delete {
            color: #ff8f9a !important;
        }

        body.dark-mode .action-button.delete:hover {
            background: #3a2028 !important;
            border-color: #75404a !important;
        }


        /* EMPTY */

        body.dark-mode .empty-icon {
            background: #1d3154 !important;
            color: #9fc0ff !important;
        }

        body.dark-mode .empty-title {
            color: #f1f5ff !important;
        }

        body.dark-mode .empty-text {
            color: #9aa8c0 !important;
        }


        /* FOOTER */

        body.dark-mode .table-footer {
            background: #141f33 !important;
            border-top-color: #293752 !important;
        }

        body.dark-mode .table-count {
            color: #9aa8c0 !important;
        }

        body.dark-mode .table-count strong {
            color: #edf3ff !important;
        }

        body.dark-mode .pagination-wrapper a,
        body.dark-mode .pagination-wrapper span {
            background: #18253b !important;
            border-color: #334463 !important;
            color: #aebbd0 !important;
        }

        body.dark-mode .pagination-wrapper span[aria-current="page"] {
            background: #2855b7 !important;
            border-color: #3967d1 !important;
            color: #ffffff !important;
        }


        /* SIDEBAR DARK */

        body.dark-mode .sidebar {
            background:
                linear-gradient(
                    180deg,
                    #193f96 0%,
                    #173887 52%,
                    #112e70 100%
                ) !important;
        }

        body.dark-mode .brand-subtitle {
            color: #b9c9ef !important;
        }

        body.dark-mode .menu-title {
            color: #91a9dc !important;
        }


        .penjadwalan-modal {
            display: none;
            position: fixed;
            inset: 0;
            z-index: 9999;
            align-items: center;
            justify-content: center;
            padding: 24px;
        }

        .penjadwalan-modal.active {
            display: flex;
        }

        .penjadwalan-modal-overlay {
            position: absolute;
            inset: 0;
            background: rgba(10, 25, 55, 0.62);
            backdrop-filter: blur(5px);
        }

        .penjadwalan-modal-card {
            position: relative;
            z-index: 2;
            width: min(720px, 100%);
            max-height: 90vh;
            overflow-y: auto;
            background: var(--card-bg, #ffffff);
            border-radius: 20px;
            box-shadow: 0 25px 70px rgba(0, 0, 0, 0.25);
            animation: penjadwalanModalIn .2s ease;
        }

        @keyframes penjadwalanModalIn {
            from {
                opacity: 0;
                transform: translateY(15px) scale(.97);
            }

            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        .penjadwalan-modal-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 22px 24px;
            border-bottom: 1px solid var(--border-color, #e5e7eb);
        }

        .penjadwalan-modal-title {
            display: flex;
            align-items: center;
            gap: 13px;
        }

        .penjadwalan-modal-icon {
            width: 42px;
            height: 42px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #eaf0ff;
            color: #1749ad;
        }

        .penjadwalan-modal-title h3 {
            margin: 0;
            font-size: 18px;
            font-weight: 700;
        }

        .penjadwalan-modal-title p {
            margin: 3px 0 0;
            font-size: 12px;
            color: #718096;
        }

        .penjadwalan-modal-close {
            width: 36px;
            height: 36px;
            border: none;
            border-radius: 10px;
            background: transparent;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #64748b;
        }

        .penjadwalan-modal-close:hover {
            background: #f1f5f9;
            color: #dc2626;
        }

        .penjadwalan-modal-body {
            padding: 24px;
        }

        .penjadwalan-form-group {
            margin-bottom: 18px;
        }

        .penjadwalan-form-group label {
            display: block;
            margin-bottom: 7px;
            font-size: 13px;
            font-weight: 600;
        }

        .penjadwalan-form-group label span {
            color: #dc2626;
        }

        .penjadwalan-form-input {
            width: 100%;
            box-sizing: border-box;
            padding: 11px 13px;
            border: 1px solid #d9e0ea;
            border-radius: 10px;
            background: #fff;
            color: #172033;
            font-size: 13px;
            outline: none;
        }

        .penjadwalan-form-input:focus {
            border-color: #315ccf;
            box-shadow: 0 0 0 3px rgba(49, 92, 207, .1);
        }

        .penjadwalan-form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
        }

        .penjadwalan-modal-footer {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            padding: 18px 24px;
            border-top: 1px solid #e5e7eb;
        }

        .penjadwalan-btn-secondary,
        .penjadwalan-btn-primary {
            border: none;
            border-radius: 10px;
            padding: 10px 17px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
        }

        .penjadwalan-btn-secondary {
            background: #f1f5f9;
            color: #475569;
        }

        .penjadwalan-btn-primary {
            background: #1749ad;
            color: white;
        }

        .penjadwalan-detail-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 14px;
        }

        .penjadwalan-detail-item {
            padding: 15px;
            border: 1px solid #e5eaf1;
            border-radius: 12px;
        }

        .penjadwalan-detail-label {
            font-size: 11px;
            color: #7b8798;
            margin-bottom: 5px;
        }

        .penjadwalan-detail-value {
            font-size: 14px;
            font-weight: 600;
        }

        @media (max-width: 650px) {
            .penjadwalan-modal {
                padding: 12px;
            }

            .penjadwalan-form-grid,
            .penjadwalan-detail-grid {
                grid-template-columns: 1fr;
            }

            .penjadwalan-modal-body {
                padding: 18px;
            }
        }

    </style>

</head>


<body>

<div class="app">



    <aside class="sidebar">

        <div>


            <div class="brand">

                <div class="brand-logo">

                    <img
                        src="{{ asset('images/logo-smpn2-dramaga.png') }}"
                        alt="Logo SMP Negeri 2 Dramaga"
                    >

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

        </div>



        <div class="sidebar-bottom">

            <form
                action="{{ route('logout') }}"
                method="POST"
                onsubmit="return confirm('Anda yakin ingin keluar?');">

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

            <div class="header-space"></div>


            <div class="profile-area">

                <button
                    type="button"
                    class="notification"
                    title="Notifikasi"
                >

                    <i data-lucide="bell"></i>

                    <span class="notification-dot"></span>

                </button>


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

                            <i data-lucide="user"></i>

                        @endif

                    </div>

                </div>

            </div>

        </header>



        <section class="content">



            <div class="page-header">

                <div class="page-title">

                    <div class="eyebrow">
                        Manajemen Bimbingan Konseling
                    </div>

                    <h1>
                        Penjadwalan BK
                    </h1>

                    <p>
                        Kelola dan pantau jadwal bimbingan konseling siswa SMP Negeri 2 Dramaga.
                    </p>

                </div>
                <button
                    type="button"
                    class="btn btn-primary"
                    onclick="openPenjadwalanModal('createModal')"
                >
                    <i data-lucide="calendar-plus"></i>
                    Tambah Jadwal
                </button>
            </div>


            <div class="summary-grid">

                <div class="summary-card">

                    <div class="summary-label">
                        TOTAL JADWAL
                    </div>

                    <div class="summary-number">
                        {{ $penjadwalan->total() }}
                    </div>

                </div>


                <div class="summary-card">

                    <div class="summary-label">
                        DATA DITAMPILKAN
                    </div>

                    <div class="summary-number">
                        {{ $penjadwalan->count() }}
                    </div>

                </div>


                <div class="summary-card">

                    <div class="summary-label">
                        HALAMAN
                    </div>

                    <div class="summary-number">
                        {{ $penjadwalan->currentPage() }}
                    </div>

                </div>

            </div>



            <div class="filter-card">

                <div class="filter-header">

                    <div class="filter-icon">
                        <i data-lucide="list-filter"></i>
                    </div>

                    <div>

                        <div class="filter-title">
                            Filter & Pencarian
                        </div>

                        <div class="filter-subtitle">
                            Gunakan filter untuk menemukan jadwal dengan cepat.
                        </div>

                    </div>

                </div>


                <form
                    action="{{ route('penjadwalan.index') }}"
                    method="GET"
                    class="filter-form"
                >

                    <input
                        type="text"
                        name="search"
                        class="input"
                        placeholder="Cari nama siswa, jenis bimbingan, atau catatan..."
                        value="{{ request('search') }}"
                    >


                    <input
                        type="date"
                        name="tanggal"
                        class="input"
                        value="{{ request('tanggal') }}"
                    >


                    <select
                        name="status"
                        class="input"
                    >

                        <option value="">
                            Semua Status
                        </option>

                        <option
                            value="Terjadwal"
                            {{ request('status') == 'Terjadwal' ? 'selected' : '' }}
                        >
                            Terjadwal
                        </option>

                        <option
                            value="Selesai"
                            {{ request('status') == 'Selesai' ? 'selected' : '' }}
                        >
                            Selesai
                        </option>

                        <option
                            value="Dibatalkan"
                            {{ request('status') == 'Dibatalkan' ? 'selected' : '' }}
                        >
                            Dibatalkan
                        </option>

                    </select>


                    <button
                        type="submit"
                        class="filter-button"
                    >

                        <i data-lucide="search"></i>

                        Terapkan

                    </button>

                </form>

            </div>



            <div class="table-card">



                <div class="table-top">

                    <div class="table-title-area">

                        <div class="table-title-icon">
                            <i data-lucide="calendar-days"></i>
                        </div>

                        <div>

                            <div class="table-title">
                                Daftar Jadwal Bimbingan
                            </div>

                            <div class="table-subtitle">
                                Data jadwal bimbingan konseling siswa
                            </div>

                        </div>

                    </div>


                    <div class="result-count">
                        {{ $penjadwalan->total() }} Jadwal
                    </div>

                </div>



                @if ($penjadwalan->count() > 0)

                    <div class="schedule-list">

                        @foreach ($penjadwalan as $item)

                            <div class="schedule-card">


                                <div class="schedule-card-top">

                                    <div class="schedule-number">
                                        {{ $penjadwalan->firstItem() + $loop->index }}
                                    </div>


                                    <div class="schedule-status">

                                        @if ($item->status === 'Terjadwal')

                                            <span class="status-badge status-terjadwal">

                                                <span class="status-dot"></span>

                                                Terjadwal

                                            </span>

                                        @elseif ($item->status === 'Selesai')

                                            <span class="status-badge status-selesai">

                                                <span class="status-dot"></span>

                                                Selesai

                                            </span>

                                        @else

                                            <span class="status-badge status-dibatalkan">

                                                <span class="status-dot"></span>

                                                Dibatalkan

                                            </span>

                                        @endif

                                    </div>

                                </div>



                                <div class="schedule-student">

                                    <div class="student-avatar">

                                        {{
                                            strtoupper(
                                                substr(
                                                    $item->siswa->nama_siswa ?? 'S',
                                                    0,
                                                    1
                                                )
                                            )
                                        }}

                                    </div>


                                    <div class="student-info">

                                        <strong>
                                            {{ $item->siswa->nama_siswa ?? '-' }}
                                        </strong>

                                        <span>
                                            NIS:
                                            {{ $item->siswa->nis ?? '-' }}
                                            &nbsp; • &nbsp;
                                            Kelas:
                                            {{ $item->siswa->kelas->nama_kelas ?? '-' }}
                                        </span>

                                    </div>

                                </div>



                                <div class="schedule-info">

                                    <div class="info-box">

                                        <div class="info-label">

                                            <i data-lucide="calendar-days"></i>

                                            Tanggal

                                        </div>

                                        <div class="info-value">

                                            {{ \Carbon\Carbon::parse($item->tanggal)->format('d/m/Y') }}

                                            <br>

                                            <small style="font-size:9px;color:#9299a8;">
                                                {{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('l') }}
                                            </small>

                                        </div>

                                    </div>


                                    <div class="info-box">

                                        <div class="info-label">

                                            <i data-lucide="clock-3"></i>

                                            Waktu

                                        </div>

                                        <div class="info-value">

                                            {{
                                                \Carbon\Carbon::parse($item->waktu_mulai)->format('H:i')
                                            }}

                                            -

                                            {{
                                                \Carbon\Carbon::parse($item->waktu_selesai)->format('H:i')
                                            }}

                                        </div>

                                    </div>

                                </div>



                                <div class="schedule-type">

                                    <div class="info-label">

                                        <i data-lucide="users"></i>

                                        Jenis Bimbingan

                                    </div>

                                    <div class="info-value">

                                        {{ $item->jenis_bimbingan }}

                                    </div>

                                </div>



                                @if (!empty($item->catatan))

                                    <div class="schedule-note">

                                        <div class="info-label">

                                            <i data-lucide="notebook-pen"></i>

                                            Catatan

                                        </div>

                                        <div class="info-value">

                                            {{ $item->catatan }}

                                        </div>

                                    </div>

                                @endif



                                <div class="schedule-actions">


                                    <button
                                        type="button"
                                        class="action-button"
                                        title="Edit Jadwal"
                                        onclick="openPenjadwalanModal('editModal{{ $item->id_penjadwalan }}')"
                                    >
                                        <i data-lucide="pencil"></i>
                                    </button>


                                    <form
                                        action="{{ route('penjadwalan.destroy', $item->id_penjadwalan) }}"
                                        method="POST"
                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus jadwal ini?');"
                                        style="display:inline;flex:0 0 38px;"
                                    >

                                        @csrf

                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="action-button delete"
                                            title="Hapus Jadwal"
                                        >

                                            <i data-lucide="trash-2"></i>

                                        </button>

                                    </form>

                                </div>

                            </div>



                            <div
                                id="editModal{{ $item->id_penjadwalan }}"
                                class="penjadwalan-modal"
                            >
                                <div
                                    class="penjadwalan-modal-overlay"
                                    onclick="closePenjadwalanModal('editModal{{ $item->id_penjadwalan }}')"
                                ></div>

                                <div class="penjadwalan-modal-card">

                                    <div class="penjadwalan-modal-header">

                                        <div class="penjadwalan-modal-title">

                                            <div class="penjadwalan-modal-icon">
                                                <i data-lucide="calendar-pen"></i>
                                            </div>

                                            <div>
                                                <h3>Edit Jadwal BK</h3>
                                                <p>Perbarui informasi jadwal bimbingan siswa.</p>
                                            </div>

                                        </div>

                                        <button
                                            type="button"
                                            class="penjadwalan-modal-close"
                                            onclick="closePenjadwalanModal('editModal{{ $item->id_penjadwalan }}')"
                                        >
                                            <i data-lucide="x"></i>
                                        </button>

                                    </div>


                                    <form
                                        action="{{ route('penjadwalan.update', $item->id_penjadwalan) }}"
                                        method="POST"
                                    >

                                        @csrf
                                        @method('PUT')


                                        <div class="penjadwalan-modal-body">


                                            <div class="penjadwalan-form-group">

                                                <label>
                                                    Siswa <span>*</span>
                                                </label>

                                                <select
                                                    name="id_siswa"
                                                    class="penjadwalan-form-input"
                                                    required
                                                >

                                                    @foreach ($siswa as $student)

                                                        <option
                                                            value="{{ $student->id_siswa }}"
                                                            {{ $item->id_siswa == $student->id_siswa ? 'selected' : '' }}
                                                        >
                                                            {{ $student->nama_siswa }}
                                                            — {{ $student->kelas->nama_kelas ?? '-' }}
                                                        </option>

                                                    @endforeach

                                                </select>

                                            </div>



                                            <div class="penjadwalan-form-grid">

                                                <div class="penjadwalan-form-group">

                                                    <label>
                                                        Tanggal <span>*</span>
                                                    </label>

                                                    <input
                                                        type="date"
                                                        name="tanggal"
                                                        class="penjadwalan-form-input"
                                                        value="{{ $item->tanggal }}"
                                                        required
                                                    >

                                                </div>


                                                <div class="penjadwalan-form-group">

                                                    <label>
                                                        Jenis Bimbingan <span>*</span>
                                                    </label>

                                                    <select
                                                        name="jenis_bimbingan"
                                                        class="penjadwalan-form-input"
                                                        required
                                                    >

                                                        <option
                                                            value="Individu"
                                                            {{ $item->jenis_bimbingan == 'Individu' ? 'selected' : '' }}
                                                        >
                                                            Individu
                                                        </option>

                                                        <option
                                                            value="Kelompok"
                                                            {{ $item->jenis_bimbingan == 'Kelompok' ? 'selected' : '' }}
                                                        >
                                                            Kelompok
                                                        </option>

                                                    </select>

                                                </div>

                                            </div>



                                            <div class="penjadwalan-form-grid">

                                                <div class="penjadwalan-form-group">

                                                    <label>
                                                        Waktu Mulai <span>*</span>
                                                    </label>

                                                    <input
                                                        type="time"
                                                        name="waktu_mulai"
                                                        class="penjadwalan-form-input"
                                                        value="{{ \Carbon\Carbon::parse($item->waktu_mulai)->format('H:i') }}"
                                                        required
                                                    >

                                                </div>


                                                <div class="penjadwalan-form-group">

                                                    <label>
                                                        Waktu Selesai <span>*</span>
                                                    </label>

                                                    <input
                                                        type="time"
                                                        name="waktu_selesai"
                                                        class="penjadwalan-form-input"
                                                        value="{{ \Carbon\Carbon::parse($item->waktu_selesai)->format('H:i') }}"
                                                        required
                                                    >

                                                </div>

                                            </div>



                                            <div class="penjadwalan-form-group">

                                                <label>
                                                    Status <span>*</span>
                                                </label>

                                                <select
                                                    name="status"
                                                    class="penjadwalan-form-input"
                                                    required
                                                >

                                                    <option
                                                        value="Terjadwal"
                                                        {{ $item->status == 'Terjadwal' ? 'selected' : '' }}
                                                    >
                                                        Terjadwal
                                                    </option>

                                                    <option
                                                        value="Selesai"
                                                        {{ $item->status == 'Selesai' ? 'selected' : '' }}
                                                    >
                                                        Selesai
                                                    </option>

                                                    <option
                                                        value="Dibatalkan"
                                                        {{ $item->status == 'Dibatalkan' ? 'selected' : '' }}
                                                    >
                                                        Dibatalkan
                                                    </option>

                                                </select>

                                            </div>



                                            <div class="penjadwalan-form-group">

                                                <label>
                                                    Catatan
                                                </label>

                                                <textarea
                                                    name="catatan"
                                                    class="penjadwalan-form-input"
                                                    rows="4"
                                                    placeholder="Tambahkan catatan jika diperlukan..."
                                                >{{ $item->catatan }}</textarea>

                                            </div>

                                        </div>



                                        <div class="penjadwalan-modal-footer">

                                            <button
                                                type="button"
                                                class="penjadwalan-btn-secondary"
                                                onclick="closePenjadwalanModal('editModal{{ $item->id_penjadwalan }}')"
                                            >
                                                Batal
                                            </button>

                                            <button
                                                type="submit"
                                                class="penjadwalan-btn-primary"
                                            >
                                                <i data-lucide="save"></i>
                                                Simpan Perubahan
                                            </button>

                                        </div>

                                    </form>

                                </div>

                            </div>
                        @endforeach

                    </div>

                @else

                    <div class="empty-state">

                        <div class="empty-icon">

                            <i data-lucide="calendar-x-2"></i>

                        </div>

                        <div class="empty-title">
                            Belum Ada Jadwal
                        </div>

                        <div class="empty-text">
                            Belum terdapat data jadwal bimbingan konseling.
                        </div>

                    </div>

                @endif



                @if ($penjadwalan->total() > 0)

                    <div class="table-footer">

                        <div class="table-count">

                            Menampilkan

                            <strong>
                                {{ $penjadwalan->firstItem() }}
                            </strong>

                            sampai

                            <strong>
                                {{ $penjadwalan->lastItem() }}
                            </strong>

                            dari

                            <strong>
                                {{ $penjadwalan->total() }}
                            </strong>

                            jadwal

                        </div>


                        <div class="pagination-wrapper">

                            {{ $penjadwalan->onEachSide(1)->links('pagination::simple-tailwind') }}

                        </div>

                    </div>

                @endif

            </div>

        </section>

    </main>

</div>


<script>

    function openPenjadwalanModal(modalId) {
        const modal = document.getElementById(modalId);

        if (modal) {
            modal.classList.add('active');
            document.body.style.overflow = 'hidden';

            lucide.createIcons();
        }
    }

    function closePenjadwalanModal(modalId) {
        const modal = document.getElementById(modalId);

        if (modal) {
            modal.classList.remove('active');
            document.body.style.overflow = '';
        }
    }

    document.addEventListener('keydown', function (event) {

        if (event.key === 'Escape') {

            document.querySelectorAll('.penjadwalan-modal.active')
                .forEach(function (modal) {
                    modal.classList.remove('active');
                });

            document.body.style.overflow = '';
        }

    });

    document.addEventListener('DOMContentLoaded', function () {
        lucide.createIcons();
    });

</script>

<div
    id="createModal"
    class="penjadwalan-modal"
>
    <div
        class="penjadwalan-modal-overlay"
        onclick="closePenjadwalanModal('createModal')"
    ></div>

    <div class="penjadwalan-modal-card">

        <div class="penjadwalan-modal-header">

            <div class="penjadwalan-modal-title">

                <div class="penjadwalan-modal-icon">
                    <i data-lucide="calendar-plus"></i>
                </div>

                <div>
                    <h3>Tambah Jadwal BK</h3>
                    <p>Buat jadwal bimbingan konseling siswa.</p>
                </div>

            </div>

            <button
                type="button"
                class="penjadwalan-modal-close"
                onclick="closePenjadwalanModal('createModal')"
            >
                <i data-lucide="x"></i>
            </button>

        </div>

        <form
            action="{{ route('penjadwalan.store') }}"
            method="POST"
        >

            @csrf

            <div class="penjadwalan-modal-body">

                <div class="penjadwalan-form-group">

                    <label>
                        Siswa <span>*</span>
                    </label>

                    <select
                        name="id_siswa"
                        class="penjadwalan-form-input"
                        required
                    >

                        <option value="">
                            -- Pilih Siswa --
                        </option>

                        @foreach ($siswa as $student)

                            <option value="{{ $student->id_siswa }}">
                                {{ $student->nama_siswa }}
                                — {{ $student->kelas->nama_kelas ?? '-' }}
                            </option>

                        @endforeach

                    </select>

                </div>

                <div class="penjadwalan-form-grid">

                    <div class="penjadwalan-form-group">

                        <label>
                            Tanggal <span>*</span>
                        </label>

                        <input
                            type="date"
                            name="tanggal"
                            class="penjadwalan-form-input"
                            required
                        >

                    </div>

                    <div class="penjadwalan-form-group">

                        <label>
                            Jenis Bimbingan <span>*</span>
                        </label>

                        <select
                            name="jenis_bimbingan"
                            class="penjadwalan-form-input"
                            required
                        >

                            <option value="">
                                -- Pilih --
                            </option>

                            <option value="Individu">
                                Individu
                            </option>

                            <option value="Kelompok">
                                Kelompok
                            </option>

                        </select>

                    </div>

                </div>

                <div class="penjadwalan-form-grid">

                    <div class="penjadwalan-form-group">

                        <label>
                            Waktu Mulai <span>*</span>
                        </label>

                        <input
                            type="time"
                            name="waktu_mulai"
                            class="penjadwalan-form-input"
                            required
                        >

                    </div>

                    <div class="penjadwalan-form-group">

                        <label>
                            Waktu Selesai <span>*</span>
                        </label>

                        <input
                            type="time"
                            name="waktu_selesai"
                            class="penjadwalan-form-input"
                            required
                        >

                    </div>

                </div>

                <div class="penjadwalan-form-group">

                    <label>Catatan</label>

                    <textarea
                        name="catatan"
                        class="penjadwalan-form-input"
                        rows="4"
                        placeholder="Tambahkan catatan jika diperlukan..."
                    ></textarea>

                </div>

            </div>

            <div class="penjadwalan-modal-footer">

                <button
                    type="button"
                    class="penjadwalan-btn-secondary"
                    onclick="closePenjadwalanModal('createModal')"
                >
                    Batal
                </button>

                <button
                    type="submit"
                    class="penjadwalan-btn-primary"
                >
                    <i data-lucide="save"></i>
                    Simpan Jadwal
                </button>

            </div>

        </form>

    </div>
</div>

</body>

</html>
