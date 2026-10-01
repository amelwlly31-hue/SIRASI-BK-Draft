<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Data Konseling - SIRASI-BK</title>

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
            --white: #ffffff;

            --text: #172033;
            --muted: #737b8c;
            --border: #e3e7ef;

            --success: #16894a;
            --success-bg: #eaf8f0;

            --warning: #a96b00;
            --warning-bg: #fff5df;

            --danger: #d64545;
            --danger-bg: #fff0f0;

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

        /*app*/
        .app {
            min-height: 100vh;
            display: flex;
        }

        /*sidebar*/
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

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 8px;

            background: rgba(255,255,255,.07);

            font-size: 14px;
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

        /*main*/
        .main {
            flex: 1;
            min-width: 0;
            margin-left: 270px;
        }

        /*header*/
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

        .search input,
        .search input:hover,
        .search input:focus,
        .search input:focus-visible,
        .search input:active {
            width: 100% !important;
            height: 100% !important;
            border: none !important;
            border-width: 0 !important;
            outline: none !important;
            box-shadow: none !important;
            -webkit-box-shadow: none !important;
            background: transparent !important;
            background-color: transparent !important;
            color: var(--text) !important;
            font-size: 13px !important;
            padding: 0 !important;
            margin: 0 !important;
            border-radius: 0 !important;
        }

        .search input::placeholder {
            color: #9aa1af !important;
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
        }

        /*content*/
        .content {
            padding: 32px;

            max-width: 1500px;
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

            letter-spacing: -.5px;
        }

        .page-description {
            margin-top: 7px;

            color: var(--muted);

            font-size: 13px;
            line-height: 1.6;
        }

        /*add button*/
        .btn {
            min-height: 42px;

            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;

            padding: 0 15px;

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

            background:
                linear-gradient(
                    135deg,
                    #2149a2,
                    #173c91
                );

            color: white;

            box-shadow:
                0 8px 20px rgba(23,60,145,.20);
        }

        .btn-primary:hover {
            background: var(--primary-dark);
        }

        /*filter card*/
        .filter-card {
            position: relative;
            overflow: hidden;

            margin-bottom: 20px;

            padding: 18px;

            border: 1px solid var(--border);
            border-radius: 18px;

            background: white;

            box-shadow: var(--shadow-sm);
        }

        .filter-card::before {
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

        .filter-heading {
            display: flex;
            align-items: center;
            gap: 10px;

            margin-bottom: 13px;
        }

        .filter-heading-icon {
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

        .filter-heading-title {
            font-size: 12px;
            font-weight: 800;
        }

        .filter-heading-text {
            margin-top: 2px;

            color: var(--muted);

            font-size: 9px;
        }

        .filter-form {
            display: grid;

            grid-template-columns: minmax(260px, 1fr) 150px 145px 150px auto;

            gap: 10px;

            align-items: center;
        }

        .search-box {
            height: 42px;

            display: flex;
            align-items: center;

            gap: 9px;

            padding: 0 12px;

            border: 1px solid var(--border);
            border-radius: 10px;

            background: #f9fafc;

            transition: .2s ease;
        }

        .search-box:focus-within {
            background: white;
            border-color: #91a8df;

            box-shadow:
                0 0 0 4px rgba(23,60,145,.05);
        }

        .search-box span {
            color: #8a92a2;
            font-size: 18px;
        }

        .search-box input,
        .search-box input:hover,
        .search-box input:focus,
        .search-box input:focus-visible,
        .search-box input:active {
            width: 100% !important;
            height: 100% !important;
            border: none !important;
            border-width: 0 !important;
            outline: none !important;
            box-shadow: none !important;
            -webkit-box-shadow: none !important;
            background: transparent !important;
            background-color: transparent !important;
            color: var(--text) !important;
            font-size: 11px !important;
            padding: 0 !important;
            margin: 0 !important;
            border-radius: 0 !important;
        }

        .search-box input::placeholder {
            color: #9ba2af !important;
        }

        .filter-select,
        .filter-date {
            width: 100%;
            height: 42px;

            padding: 0 11px;

            border: 1px solid var(--border);
            border-radius: 10px;

            outline: none;

            background: white;
            color: #5d6676;

            font-size: 11px;

            transition: .2s ease;
        }

        .filter-select:focus,
        .filter-date:focus {
            border-color: #91a8df;

            box-shadow:
                0 0 0 4px rgba(23,60,145,.05);
        }

        .filter-submit {
            height: 42px;
            white-space: nowrap;
        }

        /*table card*/
        .table-card {
            position: relative;
            overflow: hidden;

            border: 1px solid var(--border);
            border-radius: 20px;

            background: white;

            box-shadow: var(--shadow-md);
        }

        .table-top {
            min-height: 72px;

            display: flex;
            align-items: center;
            justify-content: space-between;

            padding: 15px 21px;

            border-bottom: 1px solid var(--border);
        }

        .table-title-wrap {
            display: flex;
            align-items: center;
            gap: 11px;
        }

        .table-title-icon {
            width: 38px;
            height: 38px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 11px;

            background: var(--primary-light);
            color: var(--primary);

            font-size: 16px;
        }

        .table-title {
            font-size: 14px;
            font-weight: 800;
        }

        .table-subtitle {
            margin-top: 3px;

            color: var(--muted);

            font-size: 9px;
        }

        .data-count {
            display: inline-flex;
            align-items: center;
            gap: 7px;

            padding: 7px 10px;

            border: 1px solid #d8e0f4;
            border-radius: 9px;

            background: var(--primary-soft);

            color: var(--primary);

            font-size: 9px;
            font-weight: 800;
        }

        .data-count-dot {
            width: 6px;
            height: 6px;

            border-radius: 50%;

            background: #3e67c1;
        }

        .table-wrapper {
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;

            border-collapse: separate;
            border-spacing: 0;

            min-width: 970px;
        }

        thead th {
            height: 48px;

            padding: 0 17px;

            background:
                linear-gradient(
                    180deg,
                    #f8f9fd,
                    #f4f6fb
                );

            border-bottom: 1px solid var(--border);

            color: #687182;

            text-align: left;

            font-size: 9px;
            font-weight: 800;

            text-transform: uppercase;
            letter-spacing: .5px;

            white-space: nowrap;
        }

        thead th:first-child {
            padding-left: 21px;
        }

        thead th:last-child {
            text-align: center;
        }

        tbody td {
            padding: 15px 17px;

            border-bottom: 1px solid #edf0f4;

            color: #606a7a;

            font-size: 10.5px;

            vertical-align: middle;
        }

        tbody td:first-child {
            padding-left: 21px;

            color: #969eac;

            font-size: 10px;
            font-weight: 700;

            text-align: center;
        }

        tbody tr {
            transition: .2s ease;
        }

        tbody tr:hover {
            background: #fafbff;
        }

        tbody tr:last-child td {
            border-bottom: 0;
        }

        /*date*/
        .date-cell {
            display: flex;
            align-items: center;
            gap: 8px;

            white-space: nowrap;
        }

        .date-icon {
            width: 29px;
            height: 29px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 8px;

            background: #f1f4fa;
            color: #667085;

            font-size: 12px;
        }

        html.dark-mode .date-icon {
            background: #1d2c47 !important;
            color: #a9c5ff !important;
        }

        html.dark-mode .date-icon svg {
            color: #a9c5ff !important;
            stroke: #a9c5ff !important;
        }

        .date-text {
            color: #505a6b;
            font-weight: 600;
        }

        /*student*/
        .student-cell {
            display: flex;
            align-items: center;
            gap: 9px;
        }

        .student-avatar {
            width: 34px;
            height: 34px;

            flex-shrink: 0;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 10px;

            background:
                linear-gradient(
                    135deg,
                    #eaf0ff,
                    #dce6ff
                );

            color: var(--primary);

            font-size: 11px;
            font-weight: 800;
        }

        .student-name {
            color: var(--text);

            font-size: 11px;
            font-weight: 800;
        }

        .student-label {
            margin-top: 2px;

            color: #9aa1ae;

            font-size: 8px;
        }

        /*class*/
        .class-badge {
            display: inline-flex;
            align-items: center;

            padding: 6px 9px;

            border-radius: 8px;

            background: #f3f5fa;

            color: #5e6777;

            font-size: 9px;
            font-weight: 700;
        }

        /*problem*/
        .problem-badge {
            display: inline-flex;
            align-items: center;

            max-width: 170px;

            padding: 6px 9px;

            border-radius: 8px;

            background: var(--primary-light);

            color: var(--primary);

            font-size: 9px;
            font-weight: 700;

            line-height: 1.4;
        }

        .problem-empty {
            color: #a0a7b3;

            font-size: 10px;
        }

        /*follow up*/
        .follow-up {
            max-width: 190px;

            color: #687182;

            line-height: 1.45;
        }

        .follow-up-empty {
            display: inline-flex;
            align-items: center;

            padding: 5px 8px;

            border-radius: 7px;

            background: #f5f6f8;

            color: #9aa1ae;

            font-size: 9px;
        }

        /*status*/
        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: 5px;

            padding: 6px 9px;

            border-radius: 8px;

            font-size: 9px;
            font-weight: 800;

            white-space: nowrap;
        }

        .status-dot {
            width: 5px;
            height: 5px;

            border-radius: 50%;
        }

        .status-badge.selesai {
            background: var(--success-bg);
            color: var(--success);
        }

        .status-badge.selesai .status-dot {
            background: var(--success);
        }

        .status-badge.proses {
            background: var(--warning-bg);
            color: var(--warning);
        }

        .status-badge.proses .status-dot {
            background: var(--warning);
        }

        html.dark-mode .status-badge.proses {
            background: #3b2d1d !important;
            color: #f2b866 !important;
        }

        html.dark-mode .status-badge.proses .status-dot {
            background: #e9a23b !important;
        }

        .status-badge.default {
            background: var(--primary-light);
            color: var(--primary);
        }

        .status-badge.default .status-dot {
            background: var(--primary);
        }

        /*action*/
        .actions {
            display: flex;

            align-items: center;
            justify-content: center;

            gap: 6px;
        }

        .action-link,
        .action-button {
            width: 28px;
            height: 28px;

            display: inline-flex;
            align-items: center;
            justify-content: center;

            border: 1px solid var(--border);
            border-radius: 9px;

            background: white;

            color: var(--primary);

            font-size: 13px;

            cursor: pointer;

            box-shadow: var(--shadow-sm);

            transition: .2s ease;
        }

        .action-link svg,
        .action-button svg {
            width: 16px;
            height: 16px;
        }

        .action-link:hover,
        .action-button:hover {
            background: var(--primary-light);

            border-color: #cbd7f2;

            transform: translateY(-2px);
        }

        .action-link.delete,
        .action-button.delete {
            color: var(--danger);
        }

        .action-link.delete:hover,
        .action-button.delete:hover {
            background: var(--danger-bg);
            border-color: #f0caca;
        }

        /*empty*/
        .empty {
            padding: 65px 20px !important;

            text-align: center;

            color: var(--muted) !important;
        }

        .empty-icon {
            width: 56px;
            height: 56px;

            display: flex;
            align-items: center;
            justify-content: center;

            margin: 0 auto 13px;

            border-radius: 16px;

            background: var(--primary-light);

            color: var(--primary);

            font-size: 22px;
        }

        .empty-title {
            color: var(--text);

            font-size: 13px;
            font-weight: 800;
        }

        .empty-description {
            margin-top: 5px;

            color: var(--muted);

            font-size: 10px;
        }

        /*footer*/

        .table-footer {
            min-height: 52px;

            display: flex;
            align-items: center;
            justify-content: space-between;

            gap: 15px;

            padding: 12px 21px;

            border-top: 1px solid var(--border);

            background: #fcfcfd;
        }

        .table-count {
            color: var(--muted);

            font-size: 10px;
        }

        .table-count strong {
            color: var(--text);
        }

        .pagination-text {
            color: var(--muted);
            font-size: 11px;
        }

        .pagination-text strong {
            color: var(--text);
        }

        .pagination-wrapper nav {
            display: flex;
            align-items: center;
            padding-top: 8px;
            padding-bottom: 8px;
        }

        .pagination-wrapper nav > div:nth-child(2) > div:nth-child(2) {
            margin-top: 5px;
        }

        .pagination-wrapper nav > div:first-child {
            margin-right: 12px;
        }

        .pagination-wrapper svg {
            width: 12px;
            height: 12px;
        }

        .pagination-wrapper a,
        .pagination-wrapper span {
            min-width: 25px;
            height: 25px;

            display: inline-flex;
            align-items: center;
            justify-content: center;

            margin-left: 2px;

            border: 1px solid var(--border);
            border-radius: 6px;

            background: white;
            color: #6d7686;

            font-size: 9px;

            text-decoration: none;
        }

        .pagination-wrapper a:hover {
            background: var(--primary-light);
            color: var(--primary);
        }

        .pagination-wrapper span[aria-current="page"] {
            background: var(--primary);
            border-color: var(--primary);
            color: white;
        }

        .pagination-wrapper .text-sm {
            font-size: 11px;
        }

        /*responsive*/

        @media (max-width: 1200px) {

            .filter-form {
                grid-template-columns:
                    minmax(230px, 1fr)
                    140px
                    135px
                    140px
                    auto;
            }
        }

        @media (max-width: 1050px) {

            .sidebar {
                width: 235px;
            }

            .main {
                margin-left: 235px;
            }

            .search {
                width: 300px;
            }

            .filter-form {
                grid-template-columns: 1fr 1fr 1fr;
            }

            .search-box {
                grid-column: 1 / -1;
            }
        }

        @media (max-width: 800px) {

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
                width: 280px;
            }

            .content {
                padding: 24px 18px;
            }

            .page-heading {
                align-items: flex-start;
            }

            .filter-form {
                grid-template-columns: 1fr 1fr;
            }

            .search-box {
                grid-column: 1 / -1;
            }

            .filter-submit {
                width: 100%;
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

            .notification {
                display: none;
            }

            .profile-info {
                display: none;
            }

            .profile {
                padding-left: 0;
                border-left: 0;
            }

            .content {
                padding: 18px 13px;
            }

            .page-title {
                font-size: 23px;
            }

            .page-heading {
                flex-direction: column;
            }

            .filter-form {
                grid-template-columns: 1fr;
            }

            .search-box {
                grid-column: auto;
            }

            .table-top {
                align-items: flex-start;
            }

            .table-footer {
                flex-direction: column;
                align-items: flex-start;
            }
        }

        /*pagination*/
        body.dark-mode .pagination-wrapper a,
        body.dark-mode .pagination-wrapper span {
            background: #162238 !important;
            border-color: #334463 !important;
            color: #cbd7ed !important;
        }

        body.dark-mode .pagination-wrapper span[aria-current="page"] {
            background: #2a55b8 !important;
            border-color: #3967d1 !important;
            color: #ffffff !important;
        }
    </style>
<style>

/*SIRASI-BK*/
:root{
  --ui-primary:#2855b7;
  --ui-primary-2:#3d6fd1;
  --ui-primary-dark:#17377f;
  --ui-ink:#17233b;
  --ui-muted:#73809a;
  --ui-bg:#f4f7fc;
  --ui-card:#ffffff;
  --ui-line:#e2e8f3;
  --ui-soft:#eef4ff;
  --ui-soft-2:#f7f9fe;
  --ui-shadow:0 8px 24px rgba(28,55,110,.07);
  --ui-shadow-hover:0 16px 36px rgba(28,55,110,.13);
}

html{scroll-behavior:smooth}
body{
  background:
    radial-gradient(circle at 90% 0%,rgba(70,112,207,.10),transparent 28%),
    linear-gradient(180deg,#f8faff 0%,var(--ui-bg) 48%,#f2f5fb 100%);
  color:var(--ui-ink);
}

/*sidebar/navigation*/
.sidebar{
  background:
    linear-gradient(180deg,#21499e 0%,#1b408f 48%,#153575 100%) !important;
  box-shadow:12px 0 36px rgba(17,48,113,.14) !important;
}
.brand-logo{
  background:linear-gradient(145deg,rgba(255,255,255,.20),rgba(255,255,255,.08)) !important;
  border-color:rgba(255,255,255,.25) !important;
  box-shadow:inset 0 1px 0 rgba(255,255,255,.20),0 9px 22px rgba(0,0,0,.12) !important;
}
.brand-name,.brand-title{letter-spacing:.1px}
.menu{gap:6px !important}
.menu-item,.menu a{
  position:relative;
  min-height:46px !important;
  border:1px solid transparent !important;
  border-radius:13px !important;
  color:#dce5ff !important;
  font-weight:700 !important;
  transition:background .20s ease,color .20s ease,transform .20s ease,box-shadow .20s ease,border-color .20s ease !important;
}
.menu-item::after,.menu a::after{
  content:"";
  position:absolute;
  left:10px;right:10px;bottom:5px;height:2px;
  border-radius:999px;
  background:linear-gradient(90deg,transparent,rgba(160,195,255,.75),transparent);
  transform:scaleX(0);opacity:0;
  transition:.22s ease;
}
.menu-item:hover,.menu a:hover{
  color:#fff !important;
  background:linear-gradient(90deg,rgba(255,255,255,.13),rgba(255,255,255,.06)) !important;
  border-color:rgba(255,255,255,.08) !important;
  transform:translateX(2px) !important;
  box-shadow:0 7px 18px rgba(6,28,75,.10) !important;
}
.menu-item:hover::after,.menu a:hover::after{transform:scaleX(1);opacity:1}
.menu-item:active,.menu a:active{
  background:linear-gradient(90deg,rgba(151,190,255,.27),rgba(255,255,255,.10)) !important;
  transform:translateX(1px) scale(.995) !important;
}
.menu-item.active,.menu a.active{
  color:#fff !important;
  background:linear-gradient(90deg,rgba(255,255,255,.17),rgba(255,255,255,.07)) !important;
  border-color:rgba(255,255,255,.12) !important;
  box-shadow:inset 3px 0 0 #a7c3ff,0 9px 22px rgba(5,28,74,.13) !important;
}
.menu-item.active::after,.menu a.active::after{transform:scaleX(1);opacity:.9}
.menu-icon{
  background:rgba(255,255,255,.085) !important;
  border:1px solid rgba(255,255,255,.035);
  transition:.2s ease;
}
.menu-item:hover .menu-icon,.menu a:hover .menu-icon{background:rgba(255,255,255,.15) !important}
.menu-item.active .menu-icon,.menu a.active .menu-icon{
  background:rgba(255,255,255,.14) !important;
  box-shadow:inset 0 0 0 1px rgba(255,255,255,.06);
}
.sidebar-logout button,.logout-button{
  min-height:46px !important;
  border-radius:13px !important;
  color:#dce5ff !important;
  font-weight:700 !important;
  transition:.2s ease !important;
}
.sidebar-logout button:hover,.logout-button:hover{
  color:#fff !important;
  background:rgba(255,255,255,.09) !important;
  transform:translateX(2px);
}
.sidebar-logout button:active,.logout-button:active{background:rgba(151,190,255,.20) !important}

/*topbar*/
.header,.topbar{
  background:rgba(255,255,255,.90) !important;
  backdrop-filter:blur(16px) !important;
  -webkit-backdrop-filter:blur(16px);
  border-bottom:1px solid rgba(218,225,238,.85) !important;
  box-shadow:0 2px 18px rgba(25,48,95,.035);
}
.search-box,.search,.notification,.bell{
  border-color:#e0e6f1 !important;
  background:rgba(248,250,254,.92) !important;
  box-shadow:0 4px 14px rgba(30,58,110,.045) !important;
}
.search-box:focus-within,.search:focus-within{
  border-color:#9bb8ed !important;
  box-shadow:0 0 0 4px rgba(40,85,183,.08),0 8px 20px rgba(40,85,183,.06) !important;
}
.profile{border-left-color:#e0e6f0 !important}
.profile-name,.user-name{font-weight:800 !important;color:#18243a !important}
.profile-role,.user-role{color:#7a8599 !important}
.profile-photo,.user-avatar{
  background:linear-gradient(145deg,#edf3ff,#dbe6ff) !important;
  color:#2855b7 !important;
  box-shadow:inset 0 0 0 1px rgba(40,85,183,.10),0 6px 14px rgba(40,85,183,.07) !important;
}

/*page header*/
.page-title,h1{color:#17233b}
.eyebrow{color:#2855b7 !important;letter-spacing:1.15px !important}
.page-subtitle,.page-description{color:#77839a !important}

/*universal cards*/
.card,.panel,.table-card,.filter-card,.parameter-card,.result-card,.stat-card,.welcome-card,.option-card,.application-card{
  border-color:#e1e7f1 !important;
  box-shadow:var(--ui-shadow) !important;
  background:linear-gradient(145deg,#fff 0%,#fcfdff 100%) !important;
}
.card,.panel,.table-card,.filter-card,.parameter-card,.result-card,.option-card,.application-card{position:relative;overflow:hidden}
.card::before,.panel::before,.table-card::before,.filter-card::after,.parameter-card::before,.result-card::before,.option-card::before,.application-card::before{
  content:"";position:absolute;pointer-events:none;inset:0;
  background:linear-gradient(135deg,rgba(70,112,207,.045),transparent 28%,transparent 72%,rgba(70,112,207,.025));
  opacity:.9;
}
.card:hover,.panel:hover,.table-card:hover,.filter-card:hover,.parameter-card:hover,.result-card:hover,.option-card:hover,.application-card:hover{
  border-color:#cbd8ef !important;
  box-shadow:var(--ui-shadow-hover) !important;
}

/*welcome/hero*/
.welcome-card{
  border-radius:22px !important;
  background:linear-gradient(135deg,#fff 0%,#f5f8ff 100%) !important;
  box-shadow:0 14px 34px rgba(30,59,118,.09) !important;
}
.welcome-card::before{background:radial-gradient(circle,rgba(54,97,190,.11),transparent 66%) !important}
.btn,.show-button,.btn-primary{
  transition:transform .20s ease,box-shadow .20s ease,background .20s ease,border-color .20s ease !important;
}
.btn:hover,.show-button:hover{transform:translateY(-2px) !important;box-shadow:0 12px 24px rgba(29,61,126,.13) !important}
.btn:active,.show-button:active{transform:translateY(0) scale(.985) !important}
.btn-primary,.show-button{
  background:linear-gradient(135deg,#315fc4,#234a9f) !important;
  border-color:#234a9f !important;
  box-shadow:0 9px 22px rgba(40,85,183,.22) !important;
}
.btn-primary:hover,.show-button:hover{background:linear-gradient(135deg,#3c6ed3,#234a9f) !important}

/*stat cards*/
.stat-card{border-radius:19px !important}
.stat-card::after{background:radial-gradient(circle,rgba(62,101,191,.12),rgba(62,101,191,.02) 68%,transparent 70%) !important}
.stat-card:hover{transform:translateY(-5px) !important}
.stat-icon,.panel-heading-icon,.filter-heading-icon,.table-title-icon,.card-icon,.option-icon,.application-icon{
  background:linear-gradient(145deg,#edf3ff,#e1ebff) !important;
  color:#2855b7 !important;
  box-shadow:inset 0 0 0 1px rgba(40,85,183,.06) !important;
}

/*tables*/
thead th,th{background:linear-gradient(180deg,#f8faff,#f3f6fb) !important;color:#68758c !important}
tbody tr{transition:background .16s ease,transform .16s ease !important}
tbody tr:hover{background:#f7faff !important}
.student-avatar{background:linear-gradient(145deg,#edf3ff,#dce7ff) !important;color:#2855b7 !important}

/*report type card*/
.report-types{gap:16px !important}
.report-type{
  position:relative !important;
  overflow:hidden !important;
  border:1px solid #e0e6f0 !important;
  border-radius:18px !important;
  background:linear-gradient(145deg,#fff 0%,#fbfcff 100%) !important;
  box-shadow:var(--ui-shadow) !important;
  transition:transform .22s ease,box-shadow .22s ease,border-color .22s ease,background .22s ease !important;
}
.report-type::after{
  content:"";position:absolute;inset:0;pointer-events:none;
  background:linear-gradient(135deg,rgba(56,99,195,.06),transparent 42%,rgba(56,99,195,.025));
  opacity:0;transition:.22s ease;
}
.report-type::before{background:linear-gradient(180deg,#315fc4,#8fb0ee) !important}
.report-type:hover{
  transform:translateY(-5px) !important;
  border-color:#b9cbed !important;
  box-shadow:0 18px 36px rgba(34,67,135,.13) !important;
}
.report-type:hover::after{opacity:1}
.report-type:active{
  transform:translateY(-1px) scale(.995) !important;
  background:linear-gradient(145deg,#eef4ff,#fff) !important;
  box-shadow:0 10px 24px rgba(40,85,183,.16) !important;
}
.report-type.active{
  border-color:#8ea9df !important;
  background:linear-gradient(145deg,#f1f5ff,#fff) !important;
  box-shadow:0 14px 32px rgba(40,85,183,.12) !important;
}
.report-type.active::after{opacity:1}
.report-icon{transition:transform .22s ease,box-shadow .22s ease,background .22s ease !important}
.report-type:hover .report-icon{transform:translateY(-2px) scale(1.035)}
.report-type.active .report-icon{
  background:linear-gradient(145deg,#2f5fbe,#21499d) !important;
  box-shadow:0 9px 20px rgba(40,85,183,.20) !important;
}
.report-arrow{transition:transform .2s ease,color .2s ease !important}
.report-type:hover .report-arrow{transform:translateX(4px) !important;color:#2855b7 !important}

/*settings*/
.option-card{
  border-radius:17px !important;
  transition:transform .22s ease,box-shadow .22s ease,border-color .22s ease,background .22s ease !important;
}
.option-card:hover{transform:translateY(-4px) !important}
.option-card:active{transform:translateY(-1px) scale(.995) !important;background:#f1f5ff !important}
.option-icon{transition:transform .22s ease}
.option-card:hover .option-icon{transform:scale(1.05) rotate(-2deg)}
.application-card{border-radius:17px !important}

/*forms controls*/
input,select,textarea,.form-control,.filter-select,.filter-date{
  border-color:#dce4f0 !important;
  background:#fbfcfe !important;
  color:#26334b !important;
  transition:border-color .18s ease,box-shadow .18s ease,background .18s ease !important;
}
input:hover,select:hover,textarea:hover,.form-control:hover,.filter-select:hover,.filter-date:hover{border-color:#c7d5eb !important}

/*focus/click feedback*/
a:focus-visible,button:focus-visible,input:focus-visible,select:focus-visible,textarea:focus-visible{
  outline:3px solid rgba(91,132,211,.28) !important;
  outline-offset:2px;
}

/*responsive*/
@media(max-width:900px){
  .report-types{grid-template-columns:1fr !important}
}
@media(max-width:650px){
  .menu-item,.menu a{font-size:13px !important}
  .profile-name,.user-name{font-size:12px !important}
}

/*data konseling-dark mode*/
body.dark-mode .date-icon {         /*ikon tanggal*/
    background: #1d2c47 !important;
    color: #a9c5ff !important;
}

body.dark-mode .date-icon svg {
    color: #a9c5ff !important;
    stroke: #a9c5ff !important;
}


/*status proses*/
body.dark-mode .status-badge.proses {
    background: #1d2c47 !important;
    color: #a9c5ff !important;
}

body.dark-mode .status-badge.proses .status-dot {
    background: #6f9cff !important;
}


/*status selesai*/
body.dark-mode .status-badge.selesai {
    background: #193a2a !important;
    color: #9aa8c0 !important;
}

body.dark-mode .status-badge.selesai .status-dot {
    background: #55c98a !important;
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
                    href="{{ route('penjadwalan.index') }}" class="menu-item">
                    <span class="menu-icon"><i data-lucide="calendar-clock"></i></span>
                    Penjadwalan
                </a>

                <a
                    href="{{ route('konseling.index') }}" class="menu-item active">
                   <span class="menu-icon"><i data-lucide="clipboard-list"></i></span>
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

            <form
                action="{{ route('konseling.index') }}"
                method="GET"
                class="search"
            >
                <span class="search-icon">
                    <i data-lucide="search"></i>
                </span>

                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="Cari nama siswa atau data..."
                >
            </form>

            <div class="profile-area">

                <div class="notification-wrapper">

                    <button
                        type="button"
                        class="notification"
                        id="notificationButton"
                    >
                        <i data-lucide="bell"></i>

                        @if ($notifikasis->where('dibaca', false)->count() > 0)
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

                        @forelse ($notifikasis as $notifikasi)

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
                            {{ auth()->user()->role ?? 'Administrator' }}
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


            <div class="page-heading">

                <div>

                    <div class="eyebrow">
                        Pengelolaan Konseling
                    </div>

                    <h1 class="page-title">
                        Data Konseling
                    </h1>

                    <p class="page-description">
                        Kelola seluruh catatan dan sesi bimbingan
                        konseling siswa dengan mudah.
                    </p>

                </div>

                <a
                    href="{{ route('konseling.create') }}"
                    class="btn btn-primary"
                >
                    <i data-lucide="clipboard-plus"></i>
                    Tambah Konseling
                </a>

            </div>


            
            <div class="filter-card">

                <div class="filter-heading">

                    <div class="filter-heading-icon">
                        <i data-lucide="list-filter"></i>
                    </div>

                    <div>

                        <div class="filter-heading-title">
                            Filter Data Konseling
                        </div>

                        <div class="filter-heading-text">
                            Gunakan filter untuk menemukan data dengan cepat.
                        </div>

                    </div>

                </div>

                <form
                    action="{{ route('konseling.index') }}"
                    method="GET"
                    class="filter-form"
                >


                    <div class="search-box">

                        <span>
                            <i data-lucide="search"></i>
                        </span>

                        <input
                            type="text"
                            name="search"
                            value="{{ request('search') }}"
                            placeholder="Cari nama siswa, masalah, atau tindak lanjut..."
                        >

                    </div>

                    
                    <select
                        name="kelas"
                        class="filter-select"
                    >
                        <option value="">
                            Semua Kelas
                        </option>

                        @if (isset($kelas))

                            @foreach ($kelas as $item)

                                <option
                                    value="{{ $item->id_kelas }}"
                                    {{ request('kelas') == $item->id_kelas ? 'selected' : '' }}
                                >
                                    {{ $item->nama_kelas }}
                                </option>

                            @endforeach

                        @endif

                    </select>

                    
                    <input
                        type="date"
                        name="tanggal"
                        value="{{ request('tanggal') }}"
                        class="filter-date"
                        title="Pilih tanggal"
                    >


                    <select
                        name="periode"
                        class="filter-select"
                    >
                        <option value="">
                            Periode
                        </option>

                        <option
                            value="bulan_ini"
                            {{ request('periode') == 'bulan_ini' ? 'selected' : '' }}
                        >
                            Bulan Ini
                        </option>

                        <option
                            value="bulan_lalu"
                            {{ request('periode') == 'bulan_lalu' ? 'selected' : '' }}
                        >
                            Bulan Lalu
                        </option>

                        <option
                            value="tahun_ini"
                            {{ request('periode') == 'tahun_ini' ? 'selected' : '' }}
                        >
                            Tahun Ini
                        </option>

                    </select>

                    <button
                        type="submit"
                        class="btn filter-submit"
                    >
                        <i data-lucide="filter"></i>
                        Terapkan
                    </button>

                </form>

            </div>


            <div class="table-card">

                <div class="table-top">

                    <div class="table-title-wrap">

                        <div class="table-title-icon">
                            <i data-lucide="clipboard-list"></i>
                        </div>

                        <div>

                            <div class="table-title">
                                Daftar Konseling
                            </div>

                            <div class="table-subtitle">
                                Seluruh catatan konseling yang tersimpan
                                dalam sistem.
                            </div>

                        </div>

                    </div>

                    <div class="data-count">

                        <span class="data-count-dot"></span>

                        {{ $konseling->count() }} Data

                    </div>

                </div>

                <div class="table-wrapper">

                    <table>

                        <thead>

                            <tr>

                                <th style="width:55px;">
                                    No
                                </th>

                                <th>
                                    Tanggal
                                </th>

                                <th>
                                    Nama Siswa
                                </th>

                                <th>
                                    Kelas
                                </th>

                                <th>
                                    Masalah
                                </th>

                                <th>
                                    Tindak Lanjut
                                </th>

                                <th>
                                    Status
                                </th>

                                <th>
                                    Aksi
                                </th>

                            </tr>

                        </thead>

                        <tbody>

                            @forelse ($konseling as $index => $item)

                                <tr>

                                    <td>
                                        {{ $index + 1 }}
                                    </td>

                                                                        <td>

                                        <div class="date-cell">

                                            <div class="date-icon">
                                                <i data-lucide="calendar-days"></i>
                                            </div>

                                            <span class="date-text">

                                                {{
                                                    \Carbon\Carbon::parse(
                                                        $item->tanggal
                                                    )->format('d M Y')
                                                }}

                                            </span>

                                        </div>

                                    </td>

                                                                        <td>

                                        <div class="student-cell">

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

                                            <div>

                                                <div class="student-name">
                                                    {{ $item->siswa->nama_siswa ?? '-' }}
                                                </div>

                                                <div class="student-label">
                                                    NIS:
                                                    {{ $item->siswa->nis ?? '-' }}
                                                </div>

                                            </div>

                                        </div>

                                    </td>

                                                                        <td>

                                        <span class="class-badge">

                                            <i data-lucide="graduation-cap"></i>

                                            {{ $item->siswa->kelas->nama_kelas ?? '-' }}

                                        </span>
                                    </td>

                                    <td>

                                        @if ($item->jenisMasalah)

                                            <span class="problem-badge">
                                                {{ $item->jenisMasalah->nama_jenis }}
                                            </span>

                                        @else

                                            <span class="problem-empty">
                                                Tidak ada jenis masalah
                                            </span>

                                        @endif

                                    </td>


                                    <td>

                                        @if (
                                            $item->tindakLanjut &&
                                            $item->tindakLanjut->count()
                                        )

                                            <div class="follow-up">

                                                {{ $item->tindakLanjut->first()->tindakan }}

                                            </div>

                                        @else

                                            <span class="follow-up-empty">
                                                Belum ada
                                            </span>

                                        @endif

                                    </td>

                                                                        <td>

                                        @if (!empty($item->status))

                                            @if (strtolower($item->status) === 'selesai')

                                                <span class="status-badge selesai">

                                                    <span class="status-dot"></span>
                                                    Selesai
                                                </span>

                                            @elseif (strtolower($item->status) === 'proses')

                                                <span class="status-badge proses">

                                                    <span class="status-dot"></span>
                                                    Proses
                                                </span>

                                            @else

                                                <span class="status-badge default">

                                                    <span class="status-dot"></span>

                                                    {{ $item->status }}

                                                </span>

                                            @endif

                                        @else

                                            <span class="status-badge default">

                                                <span class="status-dot"></span>
                                                -
                                            </span>

                                        @endif

                                    </td>

                                    <td>

                                        <div class="actions">

                                            <a
                                                href="{{ route(
                                                    'konseling.show',
                                                    $item->id_konseling
                                                ) }}"
                                                class="action-link"
                                                title="Lihat Detail"
                                            >
                                                <i data-lucide="eye"></i>
                                            </a>

                                            <a
                                                href="{{ route(
                                                    'konseling.edit',
                                                    $item->id_konseling
                                                ) }}"
                                                class="action-link"
                                                title="Edit"
                                            >
                                                <i data-lucide="pencil"></i>
                                            </a>

                                            <form
                                                action="{{ route(
                                                    'konseling.destroy',
                                                    $item->id_konseling
                                                ) }}"
                                                method="POST"
                                                style="display:inline;"
                                                onsubmit="return confirm('Yakin ingin menghapus catatan konseling ini?');"
                                            >

                                                @csrf

                                                @method('DELETE')

                                                <button
                                                    type="submit"
                                                    class="action-button delete"
                                                    title="Hapus"
                                                >
                                                    <i data-lucide="trash-2"></i>
                                                </button>

                                            </form>

                                        </div>

                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td
                                        colspan="8"
                                        class="empty"
                                    >

                                        <div class="empty-icon">
                                            <i data-lucide="clipboard-list"></i>
                                        </div>

                                        <div class="empty-title">
                                            Belum Ada Data Konseling
                                        </div>

                                        <div class="empty-description">
                                            Belum ada catatan konseling
                                            yang tersedia.
                                        </div>

                                    </td>

                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

                                @if ($konseling->total() > 0)

                    <div class="table-footer">

                        <div class="pagination-text">

                            Menampilkan

                            <strong>
                                {{ $konseling->firstItem() }}
                            </strong>

                            sampai

                            <strong>
                                {{ $konseling->lastItem() }}
                            </strong>

                            dari

                            <strong>
                                {{ $konseling->total() }}
                            </strong>

                            data konseling

                        </div>

                        <div class="pagination-wrapper">
                            {{ $konseling->links() }}
                        </div>

                    </div>

                @endif

            </div>

        </section>

    </main>

</div>

<script>
    lucide.createIcons();

    const notificationButton = document.getElementById('notificationButton');
    const notificationDropdown = document.getElementById('notificationDropdown');

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
</script>

</body>

</html>
