<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Data Siswa - SIRASI-BK</title>

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
                radial-gradient(circle at 85% 0%, rgba(41, 67, 143, .08), transparent 28%),
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

            padding: 24px 16px;

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

        .header-search {
            width: 430px;
            height: 42px;
            display: flex;
            align-items: center;
            padding: 0 14px;
            border: 1px solid var(--border);
            border-radius: 12px;
            background: #111c2e;
            transition: .2s ease;
        }

        .header-search:focus-within {
            border-color: #9bb0e8;
            background: #111c2e;
            box-shadow: 0 0 0 4px rgba(23,60,145,.06);
        }

        .header-search span {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-right: 10px;
            color: #8b93a3;
            flex-shrink: 0;
        }

        .header-search span svg,
        .header-search span i {
            width: 15px !important;
            height: 15px !important;
            display: block;
        }

        .header-search input,
        .header-search input:hover,
        .header-search input:focus,
        .header-search input:focus-visible,
        .header-search input:active {
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

        .header-search input::placeholder {
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

        .btn-danger {
            color: var(--red);
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

            background: rgba(255, 255, 255, .08);
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
            grid-template-columns: minmax(220px, 1fr) 180px 180px auto;
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

        select.input {
            cursor: pointer;
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

        .table-wrap {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        thead {
            background: #fafbfe;
        }

        th {
            padding: 13px 18px;

            text-align: left;

            color: #858d9d;

            font-size: 9px;
            font-weight: 800;

            text-transform: uppercase;
            letter-spacing: .55px;

            white-space: nowrap;
        }

        td {
            padding: 14px 18px;

            border-top: 1px solid #f0f2f6;

            color: #626b7b;

            font-size: 12px;

            white-space: nowrap;
        }

        tbody tr {
            transition: .18s ease;
        }

        tbody tr:hover {
            background: #f9fbff;
        }

        .student-cell {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .student-avatar {
            width: 36px;
            height: 36px;

            flex-shrink: 0;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 11px;

            background:
                linear-gradient(
                    135deg,
                    #e8eeff,
                    #dce6ff
                );

            color: var(--primary);

            font-size: 11px;
            font-weight: 800;
        }

        .student-info strong {
            display: block;

            color: var(--text);

            font-size: 12px;
            font-weight: 700;
        }

        .student-info span {
            display: block;

            margin-top: 3px;

            color: #9299a8;

            font-size: 9px;
        }

        .nis {
            color: #7d8594;
            font-size: 11px;
        }

        .class-badge {
            display: inline-flex;

            padding: 6px 9px;

            border-radius: 8px;

            background: #f2f5fb;
            color: #556078;

            font-size: 10px;
            font-weight: 700;
        }

        .gender-badge {
            width: 27px;
            height: 27px;

            display: inline-flex;
            align-items: center;
            justify-content: center;

            border-radius: 8px;

            background: var(--primary-light);
            color: var(--primary);

            font-size: 10px;
            font-weight: 800;
        }

        .count {
            min-width: 28px;
            height: 28px;

            display: inline-flex;
            align-items: center;
            justify-content: center;

            padding: 0 8px;

            border-radius: 9px;

            background: var(--primary-light);
            color: var(--primary);

            font-size: 10px;
            font-weight: 800;
        }

        .date {
            color: #727b8c;
            font-size: 11px;
        }

        .status {
            display: inline-flex;
            align-items: center;
            gap: 5px;

            padding: 6px 9px;

            border-radius: 8px;

            font-size: 9px;
            font-weight: 800;
        }

        .status::before {
            content: "";

            width: 5px;
            height: 5px;

            border-radius: 50%;
        }

        .status-active {
            background: var(--green-bg);
            color: var(--green);
        }

        .status-active::before {
            background: var(--green);
        }

        .status-inactive {
            background: rgba(220, 38, 38, 0.15);
            color: #ef4444;
        }

        .status-inactive::before {
            background: #ef4444;
        }

        .actions {
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .actions form {
            display: inline-flex;
            margin: 0;
            padding: 0;
        }

        .action-link,
        .action-button {
            width: 30px;
            height: 30px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0;
            border: 1px solid var(--border);
            border-radius: 8px;
            background: transparent;
            color: var(--primary);
            cursor: pointer;
            text-decoration: none;
            transition: .18s ease;
            box-sizing: border-box;
            flex-shrink: 0;
        }

        .action-link:hover,
        .action-button:hover {
            background: var(--primary);
            color: #ffffff;
            border-color: var(--primary);
        }

        .action-link svg,
        .action-link i,
        .action-button svg,
        .action-button i,
        .status-toggle svg,
        .status-toggle i,
        .delete-button svg,
        .delete-button i {
            width: 14px !important;
            height: 14px !important;
            display: block;
            margin: auto;
        }

        .status-toggle,
        .delete-button,
        .action-button.delete {
            color: #d64545 !important;
            border-color: #fca5a5 !important;
            background: #fff5f5 !important;
        }

        .status-toggle:hover,
        .delete-button:hover,
        .action-button.delete:hover {
            background: #d64545 !important;
            border-color: #d64545 !important;
            color: #ffffff !important;
        }

        .action {
            height: 30px;

            display: inline-flex;
            align-items: center;
            justify-content: center;

            padding: 0 9px;

            border: 1px solid var(--border);
            border-radius: 8px;

            background: white;
            color: var(--primary);

            font-size: 9px;
            font-weight: 700;

            cursor: pointer;

            transition: .18s ease;
        }

        .action:hover {
            background: var(--primary-light);
            border-color: #d2dcf6;
            transform: translateY(-1px);
        }

        .empty {
            padding: 65px 20px;

            text-align: center;

            color: var(--muted);

            font-size: 12px;
        }

        .empty-icon {
            width: 55px;
            height: 55px;

            display: flex;
            align-items: center;
            justify-content: center;

            margin: 0 auto 12px;

            border-radius: 16px;

            background: var(--primary-soft);
            color: var(--primary);

            font-size: 22px;
        }


        .table-footer {
            min-height: 52px;

            display: flex;
            align-items: center;
            justify-content: space-between;

            gap: 10px;

            padding: 0 14px;

            border-top: 1px solid var(--border);
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


        .modal-overlay {
            position: fixed;
            inset: 0;

            display: none;
            align-items: center;
            justify-content: center;

            padding: 20px;

            background: rgba(12, 25, 60, .55);
            backdrop-filter: blur(5px);

            z-index: 1000;
        }

        .modal-overlay.show {
            display: flex;
        }

        .modal {
            width: 100%;
            max-width: 680px;
            max-height: 90vh;

            overflow: hidden;

            border: 1px solid rgba(255,255,255,.7);
            border-radius: 22px;

            background: white;

            box-shadow: 0 30px 80px rgba(0,0,0,.22);

            animation: modalIn .2s ease;
        }

        @keyframes modalIn {
            from {
                opacity: 0;
                transform: translateY(10px) scale(.98);
            }

            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        .modal-header {
            min-height: 72px;

            display: flex;
            align-items: center;
            justify-content: space-between;

            padding: 0 24px;

            border-bottom: 1px solid var(--border);
        }

        .modal-heading {
            display: flex;
            align-items: center;
            gap: 11px;
        }

        .modal-heading-icon {
            width: 37px;
            height: 37px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 11px;

            background: var(--primary-light);
            color: var(--primary);
        }

        .modal-title {
            font-size: 17px;
            font-weight: 800;
        }

        .modal-subtitle {
            margin-top: 3px;
            color: var(--muted);
            font-size: 10px;
        }

        .modal-close {
            width: 35px;
            height: 35px;

            border: 0;
            border-radius: 10px;

            background: #f5f6f9;
            color: #667085;

            font-size: 21px;

            cursor: pointer;
        }

        .modal-close:hover {
            background: #eceef3;
        }

        .modal-body {
            padding: 24px;

            max-height: calc(90vh - 145px);

            overflow-y: auto;
        }

        .modal-grid {
            display: grid;

            grid-template-columns: 1fr 1fr;

            gap: 17px;
        }

        .field {
            display: flex;
            flex-direction: column;
        }

        .field.full {
            grid-column: 1 / -1;
        }

        .field label {
            margin-bottom: 7px;

            color: #374151;

            font-size: 11px;
            font-weight: 700;
        }

        .required {
            color: var(--red);
        }

        .field-control {
            width: 100%;
            min-height: 42px;

            padding: 9px 12px;

            border: 1px solid var(--border);
            border-radius: 10px;

            outline: none;

            background: #fafbfe;
            color: var(--text);

            font-size: 12px;

            transition: .2s ease;
        }

        .field-control:focus {
            border-color: #9bb0e8;
            background: white;

            box-shadow:
                0 0 0 4px rgba(23,60,145,.05);
        }

        textarea.field-control {
            min-height: 95px;
            resize: vertical;
            line-height: 1.5;
        }

        .gender {
            min-height: 42px;

            display: flex;
            align-items: center;
            gap: 20px;
        }

        .gender label {
            display: flex;
            align-items: center;
            gap: 7px;

            margin: 0;

            font-size: 12px;
            font-weight: 500;

            cursor: pointer;
        }

        .gender input {
            appearance: none;
            -webkit-appearance: none;

            width: 14px;
            height: 14px;

            border: 2px solid #60789f;
            border-radius: 50%;

            background: #111c2e;

            cursor: pointer;
        }

        .gender input:checked {
            border-color: var(--primary);
            background:
                radial-gradient(
                    circle,
                    var(--primary) 0 4px,
                    transparent 4.5px
                );
        }

        body.dark-mode .gender input {
            border-color: #60789f;
            background: #111c2e;
        }

        body.dark-mode .gender input:checked {
            border-color: #6f9cff;
            background:
                radial-gradient(
                    circle,
                    #6f9cff 0 4px,
                    transparent 4.5px
                );
        }

        .field-error {
            margin-top: 6px;

            color: var(--red);

            font-size: 10px;
        }

        .error-summary {
            margin-bottom: 18px;
            padding: 13px 15px;

            border: 1px solid #f1cccc;
            border-radius: 11px;

            background: var(--red-bg);
            color: var(--red);

            font-size: 11px;
        }

        .error-summary strong {
            display: block;
            margin-bottom: 5px;
        }

        .error-summary ul {
            padding-left: 17px;
        }

        .import-guide {
            margin-bottom: 18px;
            padding: 13px 15px;
            border: 1px solid #dbe4ff;
            border-radius: 11px;
            background: var(--primary-soft);
            color: var(--primary);
            font-size: 11px;
            line-height: 1.5;
        }

        .import-guide strong {
            display: block;
            margin-bottom: 5px;
            color: var(--primary-dark);
        }

        input[type="file"].field-control {
            padding: 7px 10px;
        }

        input[type="file"]::file-selector-button,
        input[type="file"]::-webkit-file-upload-button {
            background: #eef2f6;
            color: #334155;
            border: 1px solid #cbd5e1;
            border-radius: 6px;
            padding: 5px 12px;
            margin-right: 12px;
            cursor: pointer;
            font-size: 11px;
            font-weight: 600;
            transition: .2s ease;
        }

        input[type="file"]::file-selector-button:hover,
        input[type="file"]::-webkit-file-upload-button:hover {
            background: #e2e8f0;
        }

        .modal-footer {
            min-height: 75px;

            display: flex;
            align-items: center;
            justify-content: flex-end;

            gap: 10px;

            padding: 0 24px;

            border-top: 1px solid var(--border);
        }


        @media (max-width: 1200px) {

            .sidebar {
                width: 235px;
            }

            .main {
                margin-left: 235px;
            }

            .filter-form {
                grid-template-columns: 1fr 1fr;
            }

            .summary-grid {
                grid-template-columns: repeat(3, 1fr);
            }
        }

        @media (max-width: 900px) {

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

            .header-search {
                width: 300px;
            }

            .content {
                padding: 22px;
            }
        }

        @media (max-width: 700px) {

            .header {
                min-height: 72px;
                height: auto;

                padding: 14px;

                gap: 12px;
            }

            .header-search {
                width: 100%;
            }

            .profile-info {
                display: none;
            }

            .profile {
                padding-left: 0;
                border-left: 0;
            }

            .page-header {
                align-items: flex-start;
                flex-direction: column;
            }

            .summary-grid {
                grid-template-columns: 1fr;
            }

            .filter-form {
                grid-template-columns: 1fr;
            }

            .table-card {
                overflow-x: auto;
            }

            table {
                min-width: 1050px;
            }

            .table-footer {
                flex-direction: column;
                align-items: flex-start;

                padding: 15px 20px;
            }

            .modal-grid {
                grid-template-columns: 1fr;
            }

            .field.full {
                grid-column: auto;
            }

            .modal-footer {
                flex-direction: column-reverse;

                height: auto;

                padding: 14px 24px;
            }

            .modal-footer .btn {
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
                padding: 16px;
            }

            .header {
                padding: 11px;
            }

            .header-search {
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

            .page-title h1 {
                font-size: 23px;
            }
        }

        .status-toggle {
            width: 28px;
            height: 28px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border: 1px solid var(--border);
            border-radius: 9px;
            background: transparent;
            color: var(--primary);
            cursor: pointer;
            transition: .18s ease;
        }

        .status-toggle svg {
            width: 16px;
            height: 16px;
        }

        .status-toggle:hover {
            background: var(--primary);
            color: #ffffff;
        }

        .status-toggle-danger {
            color: #ef4444;
            border-color: #ef4444;
        }

        .status-toggle-danger:hover {
            background: #ef4444;
            color: #ffffff;
        }

        .delete-button {
            width: 28px !important;
            height: 28px !important;
            padding: 0 !important;
            display: inline-flex !important;
            align-items: center !important;
            justify-content: center !important;
            border: 1px solid #ef4444 !important;
            border-radius: 9px !important;
            background: transparent !important;
            color: #ff6b81 !important;
            cursor: pointer;
            transition: .18s ease;
        }

        .delete-button svg {
            width: 16px !important;
            height: 16px !important;
            color: #ff6b81 !important;
            stroke: #ff6b81 !important;
        }

        .delete-button:hover {
            background: rgba(239, 68, 68, 0.12) !important;
            border-color: #ff6b81 !important;
            color: #ff6b81 !important;
        }

    </style>


<!-- SIRASI-BK MODERN UI OVERRIDES -->
<style>

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

.page-title,h1{color:#17233b}
.eyebrow{color:#2855b7 !important;letter-spacing:1.15px !important}
.page-subtitle,.page-description{color:#77839a !important}

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

.stat-card{border-radius:19px !important}
.stat-card::after{background:radial-gradient(circle,rgba(62,101,191,.12),rgba(62,101,191,.02) 68%,transparent 70%) !important}
.stat-card:hover{transform:translateY(-5px) !important}
.stat-icon,.panel-heading-icon,.filter-heading-icon,.table-title-icon,.card-icon,.option-icon,.application-icon{
  background:linear-gradient(145deg,#edf3ff,#e1ebff) !important;
  color:#2855b7 !important;
  box-shadow:inset 0 0 0 1px rgba(40,85,183,.06) !important;
}

thead th,th{background:linear-gradient(180deg,#f8faff,#f3f6fb) !important;color:#68758c !important}
tbody tr{transition:background .16s ease,transform .16s ease !important}
tbody tr:hover{background:#f7faff !important}
.student-avatar{background:linear-gradient(145deg,#edf3ff,#dce7ff) !important;color:#2855b7 !important}

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

.option-card{
  border-radius:17px !important;
  transition:transform .22s ease,box-shadow .22s ease,border-color .22s ease,background .22s ease !important;
}
.option-card:hover{transform:translateY(-4px) !important}
.option-card:active{transform:translateY(-1px) scale(.995) !important;background:#f1f5ff !important}
.option-icon{transition:transform .22s ease}
.option-card:hover .option-icon{transform:scale(1.05) rotate(-2deg)}
.application-card{border-radius:17px !important}

input,select,textarea,.form-control,.filter-select,.filter-date{
  border-color:#dce4f0 !important;
  background:#fbfcfe !important;
  color:#26334b !important;
  transition:border-color .18s ease,box-shadow .18s ease,background .18s ease !important;
}
input:hover,select:hover,textarea:hover,.form-control:hover,.filter-select:hover,.filter-date:hover{border-color:#c7d5eb !important}
body:not(.dark-mode) .header-search {
    background: #f8f9fc !important;
    border-color: #dce4f0 !important;
}

html.dark-mode body,
body.dark-mode {
    background:
        radial-gradient(circle at 90% 0%, rgba(67, 105, 190, .16), transparent 30%),
        #0f1728 !important;
    color: #edf3ff !important;
}

/* TOPBAR */
body.dark-mode .header,
body.dark-mode .topbar {
    background: rgba(19, 30, 50, .96) !important;
    border-bottom-color: #2a3852 !important;
}

body.dark-mode .search-box,
body.dark-mode .search,
body.dark-mode .notification,
body.dark-mode .bell {
    background: #111c2e !important;
    border-color: #344560 !important;
    color: #edf3ff !important;
}

body.dark-mode .profile {
    border-left-color: #334463 !important;
}

body.dark-mode .profile-name,
body.dark-mode .user-name {
    color: #f1f5ff !important;
}

body.dark-mode .profile-role,
body.dark-mode .user-role {
    color: #9aa8c0 !important;
}

/* PAGE HEADER */
body.dark-mode .page-title,
body.dark-mode h1 {
    color: #edf3ff !important;
}

body.dark-mode .page-subtitle,
body.dark-mode .page-description {
    color: #9aa8c0 !important;
}

/* CARDS */
body.dark-mode .card,
body.dark-mode .panel,
body.dark-mode .table-card,
body.dark-mode .filter-card,
body.dark-mode .parameter-card,
body.dark-mode .result-card,
body.dark-mode .stat-card,
body.dark-mode .welcome-card,
body.dark-mode .option-card,
body.dark-mode .application-card {
    background: linear-gradient(145deg, #18253b 0%, #141f33 100%) !important;
    border-color: #2c3b57 !important;
    color: #edf3ff !important;
    box-shadow: 0 15px 35px rgba(0,0,0,.22) !important;
}

body.dark-mode .welcome-card {
    background: linear-gradient(135deg, #18253b 0%, #141f33 100%) !important;
}

/* TABLE */
body.dark-mode thead,
body.dark-mode thead th,
body.dark-mode th {
    background: #141e32 !important;
    color: #9db2d6 !important;
    border-color: #293752 !important;
}

body.dark-mode tbody tr {
    background: transparent !important;
}

body.dark-mode tbody tr:hover {
    background: #1b2942 !important;
}

body.dark-mode td {
    color: #dbe4f4 !important;
    border-color: #24334d !important;
}

body.dark-mode .student-info strong {
    color: #edf3ff !important;
}

body.dark-mode .student-info span,
body.dark-mode .nis,
body.dark-mode .date {
    color: #9aa8c0 !important;
}

body.dark-mode .class-badge {
    background: #1d2c47 !important;
    color: #cbd7ed !important;
}

/* FILTER */
body.dark-mode .filter-title,
body.dark-mode .table-title {
    color: #edf3ff !important;
}

body.dark-mode .filter-icon {
    background: #1d3154 !important;
    border-color: #304b78 !important;
    color: #9fc0ff !important;
}

body.dark-mode .filter-subtitle,
body.dark-mode .table-subtitle {
    color: #9aa8c0 !important;
}

/* FORM */
body.dark-mode input,
body.dark-mode select,
body.dark-mode textarea,
body.dark-mode .form-control,
body.dark-mode .filter-select,
body.dark-mode .filter-date,
body.dark-mode .input,
body.dark-mode .field-control {
    background: #111c2e !important;
    border-color: #344560 !important;
    color: #edf3ff !important;
}

body.dark-mode input::placeholder,
body.dark-mode textarea::placeholder {
    color: #7f8da5 !important;
}

/* REPORT TYPE */
body.dark-mode .report-type {
    background: linear-gradient(145deg, #18253b 0%, #141f33 100%) !important;
    border-color: #2c3b57 !important;
    color: #edf3ff !important;
}

body.dark-mode .report-type.active {
    background: linear-gradient(145deg, #20365d 0%, #1a2c4c 100%) !important;
    border-color: #5d83d5 !important;
}

/* BUTTON */
body.dark-mode .btn,
body.dark-mode .action {
    background: #162238 !important;
    border-color: #334463 !important;
    color: #cbd7ed !important;
}

body.dark-mode .btn-primary,
body.dark-mode .show-button {
    background: linear-gradient(135deg, #2a55b8, #173c91) !important;
    border-color: #3967d1 !important;
    color: #ffffff !important;
}

/* PAGINATION */
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

/* EMPTY STATE */
body.dark-mode .empty {
    color: #9aa8c0 !important;
}

/* MODAL */
body.dark-mode .modal {
    background: linear-gradient(145deg, #18253b 0%, #121d30 100%) !important;
    border-color: #334463 !important;
    color: #edf3ff !important;
}

body.dark-mode .modal-header,
body.dark-mode .modal-footer {
    border-color: #293752 !important;
}

body.dark-mode .modal-title,
body.dark-mode .modal-heading {
    color: #edf3ff !important;
}

body.dark-mode .modal-subtitle,
body.dark-mode .field label {
    color: #9aa8c0 !important;
}

body.dark-mode .modal-close {
    background: #1d2c47 !important;
    color: #cbd7ed !important;
}

body.dark-mode .modal-heading-icon {
    background: #1d2c47 !important;
    color: #a9c5ff !important;
}

body.dark-mode .gender-badge {
    background: #1d2c47 !important;
    color: #a9c5ff !important;
}

body.dark-mode .count {
    background: #1d2c47 !important;
    color: #a9c5ff !important;
}

body.dark-mode .result-count {
    background: #1d2c47 !important;
    color: #a9c5ff !important;
}

body.dark-mode .import-guide {
    background: #192742 !important;
    border-color: #2e436d !important;
    color: #c9d8fa !important;
}

body.dark-mode .import-guide strong {
    color: #ffffff !important;
}

body.dark-mode input[type="file"].field-control {
    background: #111c2e !important;
    border-color: #344560 !important;
    color: #edf3ff !important;
}

body.dark-mode input[type="file"]::file-selector-button,
body.dark-mode input[type="file"]::-webkit-file-upload-button {
    background: #1e2c45 !important;
    color: #dce5ff !important;
    border: 1px solid #344560 !important;
    border-radius: 6px !important;
    padding: 5px 12px !important;
    margin-right: 12px !important;
    cursor: pointer !important;
    font-size: 11px !important;
    font-weight: 600 !important;
    transition: .2s ease !important;
}

body.dark-mode input[type="file"]::file-selector-button:hover,
body.dark-mode input[type="file"]::-webkit-file-upload-button:hover {
    background: #273957 !important;
    color: #ffffff !important;
    border-color: #4a638b !important;
}

body.dark-mode .status-active {
    background: #193a2a !important;
    color: #75d6a0 !important;
}

body.dark-mode .status-active::before {
    background: #55c98a !important;
}

body.dark-mode .actions .action-link,
body.dark-mode .actions .action-button {
    background: #18253b !important;
    border-color: #3b5685 !important;
    color: #a9c5ff !important;
}

body.dark-mode .actions .action-link:hover,
body.dark-mode .actions .action-button:hover {
    background: #22365a !important;
    border-color: #5d83d5 !important;
    color: #ffffff !important;
}

body.dark-mode .actions .status-toggle,
body.dark-mode .actions .delete-button,
body.dark-mode .actions .action-button.delete {
    background: rgba(225, 76, 76, .12) !important;
    border-color: rgba(225, 76, 76, .35) !important;
    color: #ff8f9a !important;
}

body.dark-mode .actions .status-toggle:hover,
body.dark-mode .actions .delete-button:hover,
body.dark-mode .actions .action-button.delete:hover {
    background: #d64545 !important;
    border-color: #d64545 !important;
    color: #ffffff !important;
}

body.dark-mode form .logout-button {
    background: transparent !important;
    border: 1px solid transparent !important;
    color: #dce5ff !important;
    box-shadow: none !important;
    outline: none !important;
}

body.dark-mode form .logout-button .menu-icon {
    background: rgba(255,255,255,.085) !important;
    color: #dce5ff !important;
}

body.dark-mode form .logout-button:hover {
    background: rgba(255,255,255,.09) !important;
    border-color: transparent !important;
    color: #ffffff !important;
}

body.dark-mode form .logout-button:hover .menu-icon {
    background: rgba(255,255,255,.15) !important;
    color: #ffffff !important;
}

a:focus-visible,button:focus-visible,input:focus-visible,select:focus-visible,textarea:focus-visible{
  outline:3px solid rgba(91,132,211,.28) !important;
  outline-offset:2px;
}

@media(max-width:900px){
  .report-types{grid-template-columns:1fr !important}
}
@media(max-width:650px){
  .menu-item,.menu a{font-size:13px !important}
  .profile-name,.user-name{font-size:12px !important}
}

</style>
    @include('partials.theme')
</head>

<body>

<div class="app">


    <aside class="sidebar">

        <div>

            <div class="brand">

                <div class="brand-logo">
                    <img src="{{ asset('images/logo-smpn2-dramaga.png') }}" alt="Logo SMPN 2 Dramaga">
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
                action="{{ route('siswa.index') }}"
                method="GET"
                class="header-search"
            >
                <span>
                    <i data-lucide="search"></i>
                </span>

                <input
                    type="text"
                    name="search"
                    placeholder="Cari siswa atau data..."
                    value="{{ request('search') }}"
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
                        Manajemen Data
                    </div>

                    <h1>
                        Data Siswa
                    </h1>

                    <p>
                        Kelola dan pantau data siswa SMP Negeri 2 Dramaga.
                    </p>

                </div>


                <div style="display: flex; gap: 10px; align-items: center;">

                    <button
                        type="button"
                        class="btn"
                        onclick="openImportModal()"
                    >
                        <i data-lucide="file-up"></i>
                        Import Excel
                    </button>

                    <a
                        href="{{ route('siswa.create') }}"
                        class="btn btn-primary"
                    >
                        <i data-lucide="user-plus"></i>
                        Tambah Siswa
                    </a>

                </div>

            </div>



            <div class="summary-grid">

                <div class="summary-card">

                    <div class="summary-label">
                        TOTAL SISWA
                    </div>

                    <div class="summary-number">
                        {{ $siswa->total() }}
                    </div>

                </div>


                <div class="summary-card">

                    <div class="summary-label">
                        DATA DITAMPILKAN
                    </div>

                    <div class="summary-number">
                        {{ $siswa->count() }}
                    </div>

                </div>


                <div class="summary-card">

                    <div class="summary-label">
                        HALAMAN
                    </div>

                    <div class="summary-number">
                        {{ $siswa->currentPage() }}
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
                            Gunakan filter untuk menemukan siswa dengan cepat.
                        </div>

                    </div>

                </div>


                <form
                    action="{{ route('siswa.index') }}"
                    method="GET"
                    class="filter-form"
                >

                    <input
                        type="text"
                        name="search"
                        class="input"
                        placeholder="Cari nama atau kelas siswa..."
                        value="{{ request('search') }}"
                    >


                    <select
                        name="tingkat"
                        class="input"
                    >

                        <option value="">
                            Semua Tingkat
                        </option>

                        @foreach ([7, 8, 9] as $tingkat)

                            <option
                                value="{{ $tingkat }}"
                                {{ request('tingkat') == $tingkat ? 'selected' : '' }}
                            >
                                Kelas {{ $tingkat }}
                            </option>

                        @endforeach

                    </select>


                    <select
                        name="kelas"
                        class="input"
                    >

                        <option value="">
                            Semua Kelas
                        </option>

                        @foreach (\App\Models\Kelas::all() as $kelas)

                            <option
                                value="{{ $kelas->id_kelas }}"
                                {{ request('kelas') == $kelas->id_kelas ? 'selected' : '' }}
                            >
                                {{ $kelas->nama_kelas }}
                            </option>

                        @endforeach

                    </select>


                    <button
                        type="submit"
                        class="btn btn-primary"
                    >
                        <i data-lucide="search"></i>
                        Cari
                    </button>

                </form>

            </div>



            <div class="table-card">

                <div class="table-top">

                    <div class="table-title-area">

                        <div class="table-title-icon">
                            <i data-lucide="users-round"></i>
                        </div>

                        <div>

                            <div class="table-title">
                                Daftar Siswa
                            </div>

                            <div class="table-subtitle">
                                Data siswa yang terdaftar dalam sistem.
                            </div>

                        </div>

                    </div>


                    <div class="result-count">
                        {{ $siswa->total() }} Siswa
                    </div>

                </div>


                <div class="table-wrap">

                    <table>

                        <thead>

                            <tr>

                                <th style="width:60px;">
                                    No
                                </th>

                                <th>
                                    Siswa
                                </th>

                                <th>
                                    NIS
                                </th>

                                <th>
                                    Jenis Kelamin
                                </th>

                                <th>
                                    Kelas
                                </th>

                                <th>
                                    Konseling
                                </th>

                                <th>
                                    Konseling Terakhir
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

                            @forelse ($siswa as $index => $item)

                                <tr>

                                    <td>
                                        {{ $siswa->firstItem() + $index }}
                                    </td>


                                    <td>

                                        <div class="student-cell">

                                            <div class="student-avatar">

                                                {{
                                                    strtoupper(
                                                        substr(
                                                            $item->nama_siswa ?? 'S',
                                                            0,
                                                            1
                                                        )
                                                    )
                                                }}

                                            </div>

                                            <div class="student-info">

                                                <strong>
                                                    {{ $item->nama_siswa }}
                                                </strong>

                                                <span>
                                                    ID #{{ $item->id_siswa }}
                                                </span>

                                            </div>

                                        </div>

                                    </td>


                                    <td>

                                        <span class="nis">
                                            {{ $item->nis ?: '-' }}
                                        </span>

                                    </td>


                                    <td>

                                        <span class="gender-badge">
                                            {{ $item->jenis_kelamin }}
                                        </span>

                                    </td>


                                    <td>

                                        <span class="class-badge">
                                            {{ $item->kelas->nama_kelas ?? '-' }}
                                        </span>

                                    </td>


                                    <td>

                                        <span class="count">
                                            {{ $item->konseling_count }}
                                        </span>

                                    </td>


                                    <td>

                                        @if ($item->konseling_terakhir)

                                            <span class="date">

                                                {{
                                                    \Carbon\Carbon::parse(
                                                        $item->konseling_terakhir
                                                    )->format('d M Y')
                                                }}

                                            </span>

                                        @else

                                            <span class="date">
                                                Belum ada
                                            </span>

                                        @endif

                                    </td>


                                    <td>

                                        @if (($item->status ?? 'Aktif') === 'Aktif')

                                            <span class="status status-active">
                                                Aktif
                                            </span>

                                        @else

                                            <span class="status status-inactive">
                                                {{ $item->status }}
                                            </span>

                                        @endif

                                    </td>


                                    <td>

                                        <div class="actions">

                                            <a
                                                href="{{ route('siswa.show', $item->id_siswa) }}"
                                                class="action-link"
                                                title="Lihat Detail"
                                            >
                                                <i data-lucide="eye"></i>
                                            </a>


                                            <a
                                                href="{{ route('siswa.edit', $item->id_siswa) }}"
                                                class="action-link"
                                                title="Edit"
                                            >
                                                <i data-lucide="pencil"></i>
                                            </a>

                                            <form
                                                action="{{ route('siswa.toggleStatus', $item->id_siswa) }}"
                                                method="POST"
                                                style="display:inline;"
                                                onsubmit="return confirm('Yakin ingin mengubah status siswa ini?');"
                                            >
                                                @csrf
                                                @method('PATCH')

                                                <button
                                                    type="submit"
                                                    class="action-button status-toggle {{ ($item->status ?? 'Aktif') === 'Aktif' ? 'status-toggle-danger' : '' }}"
                                                    title="{{ ($item->status ?? 'Aktif') === 'Aktif' ? 'Nonaktifkan Siswa' : 'Aktifkan Siswa' }}"
                                                >
                                                    <i data-lucide="power"></i>
                                                </button>
                                            </form>

                                            <form
                                                action="{{ route('siswa.destroy', $item->id_siswa) }}"
                                                method="POST"
                                                style="display:inline;"
                                                onsubmit="return confirmDelete()"
                                            >

                                                @csrf

                                                @method('DELETE')

                                                <button
                                                    type="submit"
                                                    class="action-button delete-button"
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
                                        colspan="9"
                                        class="empty"
                                    >

                                        <div class="empty-icon">
                                            <i data-lucide="users-round"></i>
                                        </div>

                                        <strong>
                                            Belum ada data siswa
                                        </strong>

                                        <div style="margin-top:6px;">
                                            Tambahkan siswa untuk mulai mengelola data.
                                        </div>

                                    </td>

                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>


                @if ($siswa->total() > 0)

                    <div class="table-footer">

                        <div class="pagination-text">

                            Menampilkan

                            <strong>
                                {{ $siswa->firstItem() }}
                            </strong>

                            sampai

                            <strong>
                                {{ $siswa->lastItem() }}
                            </strong>

                            dari

                            <strong>
                                {{ $siswa->total() }}
                            </strong>

                            siswa

                        </div>


                        <div class="pagination-wrapper">

                            {{ $siswa->links() }}

                        </div>

                    </div>

                @endif

            </div>


        </section>

    </main>

</div>



<div
    id="createModal"
    class="modal-overlay"
    onclick="closeOutside(event, 'createModal')"
>

    <div
        class="modal"
        onclick="event.stopPropagation()"
    >

        <div class="modal-header">

            <div class="modal-heading">

                <div class="modal-heading-icon">
                    <i data-lucide="user-plus"></i>
                </div>

                <div>

                    <div class="modal-title">
                        Tambah Data Siswa
                    </div>

                    <div class="modal-subtitle">
                        Masukkan informasi siswa baru.
                    </div>

                </div>

            </div>


            <button
                type="button"
                class="modal-close"
                onclick="closeCreateModal()"
            >
                <i data-lucide="x"></i>
            </button>

        </div>


        <form
            action="{{ route('siswa.store') }}"
            method="POST"
        >

            @csrf


            <div class="modal-body">

                @if ($errors->any())

                    <div class="error-summary">

                        <strong>
                            Data belum dapat disimpan.
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


                <div class="modal-grid">


                    <div class="field">

                        <label>
                            Nama Lengkap Siswa
                            <span class="required">*</span>
                        </label>

                        <input
                            type="text"
                            name="nama_siswa"
                            class="field-control"
                            placeholder="Contoh: Budi Santoso"
                            value="{{ old('nama_siswa') }}"
                            required
                        >

                        @error('nama_siswa')

                            <div class="field-error">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>


                    <div class="field">

                        <label>
                            NIS / Nomor Induk
                        </label>

                        <input
                            type="text"
                            name="nis"
                            class="field-control"
                            placeholder="Masukkan NIS"
                            value="{{ old('nis') }}"
                        >

                        @error('nis')

                            <div class="field-error">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>


                    <div class="field">

                        <label>
                            Kelas
                            <span class="required">*</span>
                        </label>

                        <select
                            name="id_kelas"
                            class="field-control"
                            required
                        >

                            <option value="">
                                Pilih Kelas
                            </option>

                            @foreach (\App\Models\Kelas::all() as $kelas)

                                <option
                                    value="{{ $kelas->id_kelas }}"
                                    {{ old('id_kelas') == $kelas->id_kelas ? 'selected' : '' }}
                                >
                                    {{ $kelas->nama_kelas }}
                                </option>

                            @endforeach

                        </select>

                        @error('id_kelas')

                            <div class="field-error">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>


                    <div class="field">

                        <label>
                            Jenis Kelamin
                            <span class="required">*</span>
                        </label>

                        <div class="gender">

                            <label>

                                <input
                                    type="radio"
                                    name="jenis_kelamin"
                                    value="L"
                                    {{ old('jenis_kelamin') == 'L' ? 'checked' : '' }}
                                    required
                                >

                                Laki-laki

                            </label>


                            <label>

                                <input
                                    type="radio"
                                    name="jenis_kelamin"
                                    value="P"
                                    {{ old('jenis_kelamin') == 'P' ? 'checked' : '' }}
                                >

                                Perempuan

                            </label>

                        </div>

                        @error('jenis_kelamin')

                            <div class="field-error">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>


                    <div class="field">

                        <label>
                            Nomor Telepon
                        </label>

                        <input
                            type="text"
                            name="no_telp"
                            class="field-control"
                            placeholder="Contoh: 081234567890"
                            value="{{ old('no_telp') }}"
                        >

                        @error('no_telp')

                            <div class="field-error">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>


                    <div class="field">

                        <label>
                            Alamat
                        </label>

                        <textarea
                            name="alamat"
                            class="field-control"
                            placeholder="Masukkan alamat siswa..."
                        >{{ old('alamat') }}</textarea>

                        @error('alamat')

                            <div class="field-error">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>


                </div>

            </div>


            <div class="modal-footer">

                <button
                    type="button"
                    class="btn"
                    onclick="closeCreateModal()"
                >
                    Batal
                </button>

                <button
                    type="submit"
                    class="btn btn-primary"
                >
                    Simpan Data
                </button>

            </div>

        </form>

    </div>

</div>


<div
    id="importModal"
    class="modal-overlay"
    onclick="closeOutside(event, 'importModal')"
>

    <div
        class="modal"
        onclick="event.stopPropagation()"
    >

        <div class="modal-header">

            <div class="modal-heading">

                <div class="modal-heading-icon">
                    <i data-lucide="file-up"></i>
                </div>

                <div>

                    <div class="modal-title">
                        Import Data Siswa
                    </div>

                    <div class="modal-subtitle">
                        Tambahkan banyak data siswa melalui Excel.
                    </div>

                </div>

            </div>


            <button
                type="button"
                class="modal-close"
                onclick="closeImportModal()"
            >
                <i data-lucide="x"></i>
            </button>

        </div>


        <form
            action="{{ route('siswa.import') }}"
            method="POST"
            enctype="multipart/form-data"
        >

            @csrf

            <input
                type="hidden"
                name="form_type"
                value="import"
            >


            <div class="modal-body">

                <div class="import-guide">

                    <strong>
                        Petunjuk Import
                    </strong>

                    Pilih jenjang terlebih dahulu, kemudian pilih
                    kelas. Jika satu file berisi beberapa kelas
                    dalam jenjang yang sama, pilih
                    <strong>Semua Kelas</strong>.

                    <br><br>

                    Kolom Excel:
                    <strong>
                        Nama Siswa, NIS, Jenis Kelamin, Alamat,
                        No Telepon, Kelas.
                    </strong>

                    <br>

                    NIS, Alamat, dan No Telepon boleh dikosongkan.

                </div>


                <div class="modal-grid">

                                        <div class="field">

                        <label>
                            Jenjang
                            <span class="required">*</span>
                        </label>

                        <select
                            name="tingkat"
                            id="importTingkat"
                            class="field-control"
                            required
                        >

                            <option value="">
                                Pilih Jenjang
                            </option>

                            <option value="7">
                                Kelas 7
                            </option>

                            <option value="8">
                                Kelas 8
                            </option>

                            <option value="9">
                                Kelas 9
                            </option>

                        </select>

                    </div>


                                        <div class="field">

                        <label>
                            Kelas
                            <span class="required">*</span>
                        </label>

                        <select
                            name="kelas"
                            id="importKelas"
                            class="field-control"
                            required
                            disabled
                        >
                            <option value="">
                                Pilih jenjang terlebih dahulu
                            </option>

                            @foreach (\App\Models\Kelas::all() as $dataKelas)
                                <option
                                    value="{{ $dataKelas->id_kelas }}"
                                    data-tingkat="{{ $dataKelas->tingkat }}"
                                >
                                    {{ $dataKelas->nama_kelas }}
                                </option>
                            @endforeach

                        </select>

                        <div style="margin-top: 6px; color: var(--muted); font-size: 10px;">
                            Pilih Semua Kelas jika Excel berisi
                            beberapa kelas dalam jenjang yang sama.
                        </div>

                    </div>


                                        <div class="field full">

                        <label>
                            File Excel
                            <span class="required">*</span>
                        </label>

                        <input
                            type="file"
                            name="file"
                            class="field-control"
                            accept=".xlsx,.xls,.csv"
                            required
                        >

                        <div style="margin-top: 6px; color: var(--muted); font-size: 10px;">
                            Format XLSX, XLS, atau CSV. Maksimal 5 MB.
                        </div>

                    </div>

                </div>

            </div>


            <div class="modal-footer">

                <button
                    type="button"
                    class="btn"
                    onclick="closeImportModal()"
                >
                    Batal
                </button>

                <button
                    type="submit"
                    class="btn btn-primary"
                >
                    <i data-lucide="file-up"></i>
                    Import Data
                </button>

            </div>

        </form>

    </div>

</div>

<script>


    function openCreateModal() {

        document
            .getElementById('createModal')
            .classList
            .add('show');

        document.body.style.overflow = 'hidden';

    }


    function closeCreateModal() {

        document
            .getElementById('createModal')
            .classList
            .remove('show');

        document.body.style.overflow = '';

    }


    const kelasData = @json($daftarKelas);

    function openImportModal() {

        document
            .getElementById('importModal')
            .classList
            .add('show');

        document.body.style.overflow = 'hidden';

    }


    function closeImportModal() {

        document
            .getElementById('importModal')
            .classList
            .remove('show');

        document.body.style.overflow = '';

    }


    document.addEventListener('DOMContentLoaded', function () {

        const tingkatSelect =
            document.getElementById('importTingkat');

        const kelasSelect =
            document.getElementById('importKelas');


        if (!tingkatSelect || !kelasSelect) {
            return;
        }


        tingkatSelect.addEventListener('change', function () {

            const tingkat = this.value;

            kelasSelect.innerHTML = '';


            if (!tingkat) {

                kelasSelect.disabled = true;

                kelasSelect.innerHTML = `
                    <option value="">
                        Pilih jenjang terlebih dahulu
                    </option>
                `;

                return;
            }


            kelasSelect.disabled = false;


            kelasSelect.innerHTML = `
                <option value="all">
                    Semua Kelas
                </option>
            `;


            kelasData
                .filter(function (kelas) {
                    return String(kelas.tingkat) === String(tingkat);
                })
                .forEach(function (kelas) {

                    const option =
                        document.createElement('option');

                    option.value = kelas.id_kelas;
                    option.textContent = kelas.nama_kelas;

                    kelasSelect.appendChild(option);

                });

        });

    });



    function closeOutside(event, modalId) {

        if (event.target.id === modalId) {

            document
                .getElementById(modalId)
                .classList
                .remove('show');

            document.body.style.overflow = '';

        }

    }



    function confirmDelete() {

        return confirm(
            'Yakin ingin menghapus data siswa ini?\n\n' +
            'Jika siswa memiliki riwayat konseling, ' +
            'data tidak dapat dihapus.'
        );

    }



    document.addEventListener(
        'keydown',
        function(event) {

            if (event.key === 'Escape') {

                closeCreateModal();

            }

        }
    );



    @if ($errors->any())

        document.addEventListener(
            'DOMContentLoaded',
            function() {

                @if (old('form_type') === 'import')

                    openImportModal();

                    const tingkat =
                        document.getElementById('importTingkat');

                    if (tingkat) {

                        tingkat.value =
                            "{{ old('tingkat') }}";

                        tingkat.dispatchEvent(
                            new Event('change')
                        );

                        document.getElementById('importKelas').value =
                            "{{ old('kelas') }}";

                    }

                @else

                    openCreateModal();

                @endif

            }
        );

    @endif

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
