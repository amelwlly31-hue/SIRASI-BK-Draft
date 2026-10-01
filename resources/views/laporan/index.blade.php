<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Laporan - SIRASI-BK</title>

    <script src="https://unpkg.com/lucide@latest"></script>

    @include('partials.theme')

    <style>

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }


        :root {

            --primary: #173c91;
            --primary-dark: #102e70;
            --primary-soft: #edf2ff;

            --bg: #f5f7fb;
            --white: #ffffff;

            --text: #172033;
            --muted: #747d8e;

            --border: #e1e6ef;

            --shadow-sm:
                0 5px 18px rgba(23, 60, 145, .055);

            --shadow-md:
                0 15px 35px rgba(23, 60, 145, .09);

        }


        body {

            min-height: 100vh;

            font-family:
                Inter,
                "Segoe UI",
                Arial,
                sans-serif;

            color: var(--text);

            background:
                radial-gradient(
                    circle at 90% 0%,
                    rgba(40, 74, 160, .09),
                    transparent 30%
                ),
                var(--bg);

        }



        a,
        a:visited,
        a:hover,
        a:active {

            text-decoration: none;

        }


        .report-type,
        .report-type:visited,
        .report-type:hover,
        .report-type:active {

            color: var(--text);

            text-decoration: none;

        }


        .report-type-title {

            color: #172033;

        }


        .report-type-description {

            color: #747d8e;

        }


        .report-type:hover .report-type-title,
        .report-type:active .report-type-title,
        .report-type:visited .report-type-title {

            color: #172033;

        }


        button,
        input,
        select {

            font-family: inherit;

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

            color: white;

            background:
                linear-gradient(
                    180deg,
                    #193f96 0%,
                    #173887 52%,
                    #112e70 100%
                );

            box-shadow:
                12px 0 35px
                rgba(15, 45, 112, .10);

        }


        .brand {

            display: flex;

            align-items: center;

            gap: 13px;

            padding:
                4px 10px 28px;

        }


        .brand-logo {

            width: 55px;
            height: 55px;

            display: flex;

            align-items: center;
            justify-content: center;

            border-radius: 14px;

            background:
                rgba(255, 255, 255, .14);

            border:
                1px solid
                rgba(255, 255, 255, .20);

            font-size: 20px;

            font-weight: 800;

        }

        .brand-logo img {
            width: 200px;
            height: 150px;
            object-fit: contain;
            transform: translateY(20px);
        }


        .brand-title {

            font-size: 19px;

            font-weight: 800;

        }


        .brand-subtitle {

            margin-top: 4px;

            color: #cbd8ff;

            font-size: 11px;

        }


        .menu-title {

            padding:
                4px 12px 10px;

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


        .menu a {

            min-height: 47px;

            display: flex;

            align-items: center;

            gap: 13px;

            padding:
                0 14px;

            border-radius: 12px;

            color: #d2dcfa;

            font-size: 13.5px;

            font-weight: 500;

            border:
                1px solid transparent;

            transition: .2s ease;

        }


        .menu a:visited {

            color: #d2dcfa;

        }


        .menu a:hover {

            color: white;

            background:
                rgba(255, 255, 255, .09);

            transform:
                translateX(2px);

        }


        .menu a.active {

            color: white;

            background:
                linear-gradient(
                    90deg,
                    rgba(255,255,255,.17),
                    rgba(255,255,255,.08)
                );

            border-color:
                rgba(255,255,255,.10);

            box-shadow:
                inset 3px 0 0 #9db9ff;

        }


        .menu a.active:visited {

            color: white;

        }


        .menu-icon {
            width: 25px;
            height: 25px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 8px;
            background:
                rgba(255, 255, 255, .07);
            font-size: 14px;
        }

        .sidebar-logout {
            margin-top: auto;
            padding-top: 20px;
        }

        .sidebar-logout button {

            width: 100%;

            min-height: 47px;

            border: 0;

            background:
                transparent;

            color: #d2dcfa;

            cursor: pointer;

            text-align: left;

            padding:
                0 14px;

            border-radius: 12px;

            font-size: 13.5px;

            transition: .2s ease;

        }


        .sidebar-logout button:hover {

            background:
                rgba(255,255,255,.09);

            color: white;

        }



        .main {

            min-height: 100vh;

            margin-left: 270px;

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
            box-shadow: 0 0 0 4px rgba(23,60,145,.06);
        }

        .search-icon {
            margin-right: 10px;
            color: #8b93a3;
            font-size: 18px;
            display: inline-flex;
            align-items: center;
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
            font-size: 13px !important;
            padding: 0 !important;
            margin: 0 !important;
            border-radius: 0 !important;
        }

        .search-box input::placeholder {
            color: #9aa1af !important;
        }

        .topbar {

            height: 76px;

            display: flex;

            align-items: center;

            justify-content: space-between;

            padding:
                0 32px;

            background:
                rgba(255,255,255,.88);

            backdrop-filter:
                blur(14px);

            border-bottom:
                1px solid
                rgba(226,230,238,.8);

            position: sticky;

            top: 0;

            z-index: 40;

        }


        .topbar-right {

            display: flex;

            align-items: center;

            gap: 15px;

        }


        .bell {

            width: 38px;
            height: 38px;

            display: flex;

            align-items: center;
            justify-content: center;

            border:
                1px solid
                var(--border);

            border-radius: 11px;

            background: white;

            color:
                var(--primary);

            box-shadow:
                var(--shadow-sm);

            position: relative;

        }


        .bell-dot {

            width: 7px;
            height: 7px;

            position: absolute;

            top: 6px;
            right: 6px;

            border:
                2px solid white;

            border-radius: 50%;

            background:
                #e14c4c;

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


        .top-divider {

            width: 1px;

            height: 30px;

            background:
                var(--border);

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
            color: #172033;
            font-size: 13px;
            font-weight: 700;
            line-height: 1.1;
        }

        .profile-role {
            margin-top: 3px;
            color: var(--muted);
            font-size: 11px;
            line-height: 1.1;
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

            color:
                var(--primary);

            font-size: 13px;

            font-weight: 800;

        }

        .profile-photo img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 12px;
        }



        .content {

            width: 100%;

            max-width: 1450px;

            margin: auto;

            padding:
                32px;

        }



        .page-top {

            display: flex;

            align-items: flex-start;

            justify-content: space-between;

            gap: 20px;

            margin-bottom: 25px;

        }


        .eyebrow {

            margin-bottom: 7px;

            color:
                var(--primary);

            font-size: 10px;

            font-weight: 800;

            text-transform: uppercase;

            letter-spacing: 1px;

        }


        .page-title {

            font-size: 29px;

            font-weight: 800;

            letter-spacing: -.5px;

        }


        .page-subtitle {

            margin-top: 7px;

            color:
                var(--muted);

            font-size: 12px;

        }



        .report-types {

            display: grid;

            grid-template-columns:
                repeat(3, 1fr);

            gap: 15px;

            margin-bottom: 22px;

        }


        .report-type {

            position: relative;

            overflow: hidden;

            min-height: 125px;

            display: flex;

            align-items: flex-start;

            gap: 14px;

            padding: 18px;

            border:
                1px solid
                var(--border);

            border-radius: 16px;

            background:
                white;

            box-shadow:
                var(--shadow-sm);

            transition:
                transform .22s ease,
                box-shadow .22s ease,
                border-color .22s ease;

        }


        .report-type::before {

            content: "";

            position: absolute;

            left: 0;

            top: 0;

            bottom: 0;

            width: 0;

            background:
                var(--primary);

            box-shadow:
                0 0 18px
                rgba(23,60,145,.35);

            transition:
                width .25s ease;

        }


        .report-type:hover {

            transform:
                translateY(-3px);

            border-color:
                #c5d0e8;

            box-shadow:
                0 13px 30px
                rgba(23,60,145,.10);

        }


        .report-type.active {

            border-color:
                #8ea6df;

            background:
                linear-gradient(
                    145deg,
                    #f4f7ff,
                    #ffffff
                );

            box-shadow:
                0 13px 30px
                rgba(23,60,145,.11);

        }


        .report-type.active::before {

            width: 4px;

        }


        .report-icon {

            width: 44px;
            height: 44px;

            flex-shrink: 0;

            display: flex;

            align-items: center;
            justify-content: center;

            border-radius: 12px;

            background:
                var(--primary-soft);

            color:
                var(--primary);

            font-size: 17px;

            transition: .22s ease;

        }


        .report-type.active .report-icon {

            background:
                var(--primary);

            color:
                white;

            box-shadow:
                0 7px 16px
                rgba(23,60,145,.20);

        }


        .report-content {

            flex: 1;

        }


        .report-type-title {

            margin-bottom: 6px;

            font-size: 13px;

            font-weight: 800;

            color:
                #172033;

        }


        .report-type-description {

            color:
                #747d8e;

            font-size: 10px;

            line-height: 1.6;

        }


        .report-arrow {

            margin-top: 3px;

            color:
                #a3aab7;

            font-size: 20px;

            transition: .2s ease;

        }


        .report-type:hover .report-arrow {

            color:
                var(--primary);

            transform:
                translateX(3px);

        }



        .parameter-card {

            overflow: hidden;

            border:
                1px solid
                var(--border);

            border-radius: 18px;

            background:
                white;

            box-shadow:
                var(--shadow-sm);

            margin-bottom: 22px;

        }


        .parameter-header {

            padding:
                20px 22px;

            border-bottom:
                1px solid
                var(--border);

        }


        .parameter-title {

            font-size: 15px;

            font-weight: 800;

        }


        .parameter-description {

            margin-top: 5px;

            color:
                var(--muted);

            font-size: 10px;

        }


        .parameter-body {

            padding:
                22px;

        }


        .filter-grid {

            display: grid;

            grid-template-columns:
                1fr 1fr 1fr 1fr;

            gap: 14px;

        }


        .field label {

            display: block;

            margin-bottom: 7px;

            color:
                #586173;

            font-size: 9.5px;

            font-weight: 800;

            text-transform: uppercase;

            letter-spacing: .3px;

        }


        .field input,
        .field select {

            width: 100%;

            height: 43px;

            padding:
                0 12px;

            border:
                1px solid
                #dce2ec;

            border-radius: 10px;

            background:
                #fafbfc;

            color:
                var(--text);

            font-size: 10.5px;

            outline: none;

            transition: .2s ease;

        }


        .field input:focus,
        .field select:focus {


            background:
                white;

            border-color:
                #8ea6df;

            box-shadow:
                0 0 0 4px
                rgba(23,60,145,.06);

        }

        body.dark-mode input[type="date"]::-webkit-calendar-picker-indicator {
            filter: invert(1);
            opacity: .8;
        }


        .button-row {

            display: flex;

            justify-content: flex-end;

            margin-top: 20px;

        }


        .show-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;

            min-width: 147px;

            height: 43px;

            padding:
                0 18px;

            border:
                1px solid
                var(--primary);

            border-radius: 10px;

            background:
                linear-gradient(
                    135deg,
                    #2149a2,
                    #173c91
                );

            color:
                white;

            cursor: pointer;

            font-size: 10.5px;

            font-weight: 800;

            box-shadow:
                0 7px 16px
                rgba(23,60,145,.15);

            transition: .2s ease;

        }

        .show-button svg,
        .show-button i {
            width: 14px;
            height: 14px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }


        .show-button:hover {

            transform:
                translateY(-1px);

            box-shadow:
                0 10px 20px
                rgba(23,60,145,.21);

        }

        .print-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            height: 34px;
            padding: 0 14px;
            border: 1px solid #173c91;
            border-radius: 8px;
            background: linear-gradient(135deg, #2149a2, #173c91);
            color: #ffffff;
            cursor: pointer;
            font-size: 11px;
            font-weight: 700;
            box-shadow: 0 4px 12px rgba(23, 60, 145, .18);
            transition: .2s ease;
        }

        .print-button:hover {
            background: linear-gradient(135deg, #2854b8, #1a42a0);
            border-color: #1a42a0;
            color: #ffffff;
            transform: translateY(-1px);
            box-shadow: 0 6px 16px rgba(23, 60, 145, .25);
        }

        .print-button svg,
        .print-button i {
            width: 13px;
            height: 13px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        body.dark-mode .print-button {
            background: linear-gradient(135deg, #2a55b8, #173c91) !important;
            border-color: #3967d1 !important;
            color: #ffffff !important;
            box-shadow: 0 4px 12px rgba(0, 0, 0, .25) !important;
        }

        body.dark-mode .print-button:hover {
            background: linear-gradient(135deg, #3564cd, #1a429e) !important;
            border-color: #4f7ee8 !important;
            color: #ffffff !important;
        }



        .result-card {

            overflow: hidden;

            border:
                1px solid
                var(--border);

            border-radius: 18px;

            background:
                white;

            box-shadow:
                var(--shadow-sm);

        }


        .result-header {

            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 16px;

            padding:
                20px 22px;

            border-bottom:
                1px solid
                var(--border);

        }


        .result-title {

            font-size: 14px;

            font-weight: 800;

        }


        .result-description {

            margin-top: 5px;

            color:
                var(--muted);

            font-size: 10px;

        }


        .table-wrapper {

            overflow-x: auto;

        }


        table {

            width: 100%;

            border-collapse: collapse;

            min-width: 800px;

        }


        thead th {

            padding:
                13px 16px;

            background:
                #f8f9fc;

            border-bottom:
                1px solid
                var(--border);

            color:
                #70798a;

            font-size: 9px;

            font-weight: 800;

            text-align: left;

            text-transform: uppercase;

            letter-spacing: .35px;

        }


        tbody td {

            padding:
                15px 16px;

            border-bottom:
                1px solid
                #edf0f4;

            color:
                #4f5869;

            font-size: 10px;

        }


        tbody tr:last-child td {

            border-bottom: 0;

        }


        tbody tr:hover {

            background:
                #fafbff;

        }


        .student-name {

            color:
                var(--primary);

            font-weight: 800;

        }


        .problem-name {

            color:
                #172033;

            font-weight: 700;

        }


        .date {

            font-weight: 700;

        }


        .status {
            display: inline-flex;
            align-items: center;
            padding: 5px 9px;
            border-radius: 7px;
            font-size: 8.5px;
            font-weight: 800;
            background: #f1f5f9;
            color: #475569;
        }

        .status-selesai {
            color: #16834a;
            background: #eaf8f0;
        }

        .status-proses {
            color: #b77908;
            background: #fff7df;
        }

        body.dark-mode .status {
            background: #1e293b !important;
            color: #94a3b8 !important;
        }

        body.dark-mode .status-selesai {
            background: #173628 !important;
            color: #62d292 !important;
        }

        body.dark-mode .status-proses {
            background: #1d2c47 !important;
            color: #a9c5ff !important;
        }

        body.dark-mode .status-proses .status-dot {
            background: #6f95e8 !important;
        }

        .status-dot {
            width: 5px;
            height: 5px;
            flex: 0 0 5px;
            margin-right: 5px;
            border-radius: 50%;
            background: currentColor;
        }



        .empty {

            padding:
                50px 20px;

            text-align: center;

            color:
                var(--muted);

        }


        .empty-icon {

            width: 55px;
            height: 55px;

            display: flex;

            align-items: center;
            justify-content: center;

            margin:
                0 auto 12px;

            border-radius: 16px;

            background:
                #eef2f8;

            color:
                #8992a2;

            font-size: 21px;

        }


        .empty-title {

            margin-bottom: 5px;

            color:
                var(--text);

            font-size: 13px;

            font-weight: 800;

        }


        .empty-text {

            font-size: 10px;

        }



        @media (max-width: 1100px) {

            .filter-grid {

                grid-template-columns:
                    repeat(2, 1fr);

            }

            .report-types {

                grid-template-columns:
                    1fr;

            }

        }


        @media (max-width: 760px) {

            .sidebar {

                width: 76px;

                padding:
                    20px 9px;

            }


            .main {

                margin-left: 76px;

            }


            .brand {

                justify-content:
                    center;

                padding-left: 0;

                padding-right: 0;

            }


            .brand-title,
            .brand-subtitle,
            .menu-title {

                display: none;

            }


            .menu a {

                justify-content:
                    center;

                padding: 0;

            }


            .sidebar-logout button {

                text-align: center;

                padding: 0;

            }


            .content {

                padding:
                    24px 16px;

            }


            .page-top {

                flex-direction:
                    column;

            }


        }


        @media (max-width: 560px) {

            .filter-grid {

                grid-template-columns:
                    1fr;

            }


            .topbar {

                padding:
                    0 15px;

            }


            .user-info,
            .top-divider {

                display: none;

            }

        }


        @media (max-width: 430px) {

            .sidebar {

                display: none;

            }


            .main {

                margin-left: 0;

            }

        }



        /* SINGLE-PAGE REPORT MODES */
        .report-mode {
            animation: reportModeIn .22s ease;
        }

        @keyframes reportModeIn {
            from { opacity: .55; transform: translateY(4px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .summary-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 15px;
            margin-bottom: 20px;
        }

        .summary-card {
            position: relative;
            overflow: hidden;
            padding: 20px;
            border: 1px solid var(--border);
            border-radius: 16px;
            background: white;
            box-shadow: var(--shadow-sm);
            transition: .2s ease;
        }

        .summary-card:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-md);
        }

        .summary-card::after {
            content: "";
            position: absolute;
            width: 110px;
            height: 110px;
            right: -45px;
            bottom: -55px;
            border-radius: 50%;
            background: rgba(23,60,145,.055);
            pointer-events: none;
        }

        .summary-label {
            color: var(--muted);
            font-size: 9.5px;
            font-weight: 700;
        }

        .summary-value {
            margin-top: 7px;
            color: var(--primary);
            font-size: 25px;
            font-weight: 900;
        }

        .summary-description {
            margin-top: 4px;
            color: #9aa1ad;
            font-size: 9px;
        }

        .summary-card.highlight {
            border-color: #b9c9ec;
            background: linear-gradient(135deg, #f0f4ff, white);
        }

        .report-table-card {
            overflow: hidden;
            border: 1px solid var(--border);
            border-radius: 18px;
            background: white;
            box-shadow: var(--shadow-sm);
        }

        .report-table-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
            padding: 20px 21px;
            border-bottom: 1px solid var(--border);
        }

        .report-table-title {
            font-size: 14px;
            font-weight: 800;
        }

        .report-table-subtitle {
            margin-top: 4px;
            color: var(--muted);
            font-size: 9.5px;
        }

        .report-table {
            width: 100%;
            min-width: 650px;
            border-collapse: collapse;
        }

        .report-table th {
            padding: 14px 18px;
            background: #f8f9fc;
            border-bottom: 1px solid var(--border);
            color: #70798a;
            font-size: 9px;
            font-weight: 800;
            text-align: left;
            text-transform: uppercase;
            letter-spacing: .35px;
        }

        .report-table td {
            padding: 15px 18px;
            border-bottom: 1px solid #edf0f4;
            color: #4f5869;
            font-size: 10px;
            vertical-align: middle;
        }

        .report-table tbody tr:last-child td { border-bottom: 0; }
        .report-table tbody tr:hover { background: #fafbff; }

        .report-rank {
            width: 28px;
            height: 28px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 9px;
            background: var(--primary-soft);
            color: var(--primary);
            font-size: 10px;
            font-weight: 900;
        }

        body.dark-mode .report-rank {
            background: #1d2c47 !important;
            color: #a9c5ff !important;
        }

        body.dark-mode .report-rank.top {
            background: #2149a2 !important;
            color: #ffffff !important;
        }

        .report-rank.top {
            background: var(--primary);
            color: white;
        }

        .report-problem {
            color: var(--primary);
            font-weight: 800;
        }

        .report-count {
            color: var(--primary);
            font-size: 15px;
            font-weight: 900;
        }

        .report-progress-wrap {
            min-width: 180px;
        }

        .report-percentage {
            display: block;
            margin-bottom: 6px;
            color: #697285;
            font-size: 9px;
            font-weight: 700;
            text-align: right;
        }

        .report-progress {
            height: 7px;
            overflow: hidden;
            border-radius: 20px;
            background: #edf0f5;
        }

        .report-progress-fill {
            height: 100%;
            border-radius: inherit;
            background: linear-gradient(90deg, #2149a2, #5f82d7);
        }


        body.dark-mode .report-table-card {
            background: #172238 !important;
            border-color: #293752 !important;
        }

        body.dark-mode .report-table-header {
            background: #172238 !important;
            border-color: #293752 !important;
        }

        body.dark-mode .report-table-title {
            color: #edf3ff !important;
        }

        body.dark-mode .report-table-subtitle {
            color: #9aa8c0 !important;
        }

        body.dark-mode .report-table th {
            background: #141f33 !important;
            border-color: #293752 !important;
            color: #9aa8c0 !important;
        }

        body.dark-mode .report-table td {
            background: #172238 !important;
            border-color: #293752 !important;
            color: #cbd7ed !important;
        }

        body.dark-mode .report-table tbody tr:hover {
            background: #1d2c47 !important;
        }

        body.dark-mode .report-problem {
            color: #a9c5ff !important;
        }

        body.dark-mode .report-count {
            color: #a9c5ff !important;
        }

        body.dark-mode .report-percentage {
            color: #a9c5ff !important;
        }

        body.dark-mode .report-progress {
            background: #293752 !important;
        }

        .mode-empty {
            padding: 45px 20px;
            text-align: center;
        }

        @media (max-width: 1050px) {
            .summary-grid { grid-template-columns: 1fr; }
        }

        @media print {
            @page {
                size: A4 portrait;
                margin: 14mm 13mm 16mm;
            }

            html,
            body {
                width: 100%;
                background: #fff !important;
                color: #172033 !important;
            }

            .layout .sidebar,
            .layout .topbar,
            .content .page-top,
            .content .report-types,
            .report-mode .parameter-card,
            .result-header,
            .show-button,
            .print-button {
                display: none !important;
            }

            .layout .main {
                width: 100% !important;
                min-height: 0 !important;
                margin-left: 0 !important;
            }

            .layout .content {
                width: 100% !important;
                max-width: none !important;
                margin: 0 !important;
                padding: 0 !important;
            }

            .print-document-header[hidden] {
                display: block !important;
                margin-bottom: 14px;
                color: #172033;
            }

            .print-school-identity {
                display: grid;
                grid-template-columns: 110px minmax(0, 1fr) 110px;
                align-items: center;
                column-gap: 16px;
                padding-bottom: 12px;
                border-bottom: 2px solid #173c91;
            }

            .print-school-identity::after {
                content: "";
                grid-column: 3;
                width: 110px;
                height: 1px;
            }

            .print-school-logo {
                grid-column: 1;
                width: 110px;
                height: 110px;
                object-fit: contain;
            }

            .print-school-text {
                grid-column: 2;
                text-align: center;
            }

            .print-system-name {
                color: #173c91;
                font-size: 18px;
                font-weight: 900;
                letter-spacing: .6px;
            }

            .print-system-description {
                margin-top: 3px;
                font-size: 9.5px;
                line-height: 1.4;
            }

            .print-school-name {
                margin-top: 4px;
                font-size: 10.5px;
                font-weight: 800;
            }

            .print-report-title {
                margin-top: 12px;
                padding: 9px 12px;
                border: 1px solid #9caed1;
                background: #f3f6fc !important;
                text-align: center;
            }

            .print-report-title h1 {
                color: #173c91;
                font-size: 13px;
                font-weight: 900;
                letter-spacing: .35px;
            }

            .print-report-meta {
                display: grid;
                grid-template-columns: repeat(2, minmax(0, 1fr));
                gap: 0;
                margin-top: 10px;
                border: 1px solid #c8d1e1;
            }

            .print-meta-item {
                display: grid;
                grid-template-columns: 105px 1fr;
                min-height: 26px;
                border-bottom: 1px solid #d9e0eb;
            }

            .print-meta-item:nth-last-child(-n + 2) {
                border-bottom: 0;
            }

            .print-meta-item dt,
            .print-meta-item dd {
                margin: 0;
                padding: 6px 8px;
                font-size: 8.5px;
            }

            .print-meta-item dt {
                background: #f3f6fc !important;
                color: #4f5d75;
                font-weight: 800;
            }

            .print-meta-item dd {
                color: #172033;
                font-weight: 700;
            }

            .report-mode {
                width: 100% !important;
            }

            .result-card,
            .report-mode > .report-table-card {
                overflow: visible !important;
                border: 0 !important;
                border-radius: 0 !important;
                background: transparent !important;
                box-shadow: none !important;
            }

            .summary-grid {
                grid-template-columns: repeat(3, minmax(0, 1fr));
                gap: 8px;
                margin-bottom: 12px;
            }

            .summary-card,
            .summary-card.highlight {
                padding: 9px;
                border: 1px solid #c8d1e1;
                border-radius: 0;
                background: #fff !important;
                box-shadow: none !important;
                break-inside: avoid;
                page-break-inside: avoid;
            }

            .summary-card::after {
                display: none;
            }

            .summary-label {
                font-size: 8px;
            }

            .summary-value {
                margin-top: 4px;
                font-size: 17px;
            }

            .summary-description {
                font-size: 7.5px;
            }

            .report-table-header {
                padding: 0 0 7px;
                border-bottom: 0;
            }

            .report-table-title {
                font-size: 11px;
            }

            .report-table-subtitle {
                font-size: 8px;
            }

            .table-wrapper {
                width: 100% !important;
                overflow: visible !important;
            }

            table,
            .report-table {
                width: 100% !important;
                min-width: 0 !important;
                border-collapse: collapse;
                table-layout: fixed;
            }

            thead {
                display: table-header-group;
            }

            tr {
                break-inside: avoid;
                page-break-inside: avoid;
            }

            th,
            td {
                overflow-wrap: anywhere;
                word-break: break-word;
            }

            thead th,
            .report-table th {
                padding: 7px 5px;
                background: #e8eef9 !important;
                border: 1px solid #aebbd0;
                color: #173c91;
                font-size: 7.5px;
                font-weight: 900;
                line-height: 1.25;
            }

            tbody td,
            .report-table td {
                padding: 7px 5px;
                border: 1px solid #c8d1e1;
                color: #273247;
                font-size: 7.8px;
                line-height: 1.35;
                vertical-align: top;
            }

            .status {
                padding: 3px 5px;
                border: 1px solid currentColor;
                border-radius: 3px;
                background: transparent !important;
                font-size: 7px;
            }

            .status::before {
                content: "";

                width: 5px;
                height: 5px;

                margin-right: 5px;

                border-radius: 50%;

                background: currentColor;
            }

            .report-progress-wrap {
                min-width: 0 !important;
            }

            .report-progress {
                border: 1px solid #bfc9d8;
                background: #fff !important;
            }

            .report-progress-fill {
                background: #5572b7 !important;
            }

            .print-document-footer[hidden] {
                display: block !important;
                margin-top: 14px;
                padding-top: 7px;
                border-top: 1px solid #c8d1e1;
                color: #68758a;
                font-size: 8px;
                text-align: center;
            }
        }



        /* NAVBAR/SIDEBAR EXACT MATCH RIWAYAT SISWA */
        .sidebar{width:270px !important;min-height:100vh !important;position:fixed !important;left:0 !important;top:0 !important;bottom:0 !important;z-index:50 !important;display:flex !important;flex-direction:column !important;padding:24px 16px !important;color:white !important;background:linear-gradient(180deg,#193f96 0%,#173887 52%,#112e70 100%) !important;box-shadow:12px 0 35px rgba(15,45,112,.10) !important}
        .brand{display:flex !important;align-items:center !important;gap:13px !important;padding:4px 10px 28px !important}
        .brand-logo{width:55px !important;height:55px !important;display:flex !important;align-items:center !important;justify-content:center !important;border-radius:14px !important;background:rgba(255,255,255,.14) !important;border:1px solid rgba(255,255,255,.20) !important;box-shadow:inset 0 1px 0 rgba(255,255,255,.15),0 8px 20px rgba(0,0,0,.10) !important;font-size:20px !important;font-weight:800 !important}
        .brand-name,.brand-title{font-size:19px !important;font-weight:800 !important;letter-spacing:.2px !important}
        .brand-subtitle{margin-top:4px !important;color:#cbd8ff !important;font-size:11px !important}
        .menu-title{padding:4px 12px 10px !important;color:#9eb2e9 !important;font-size:10px !important;font-weight:800 !important;text-transform:uppercase !important;letter-spacing:1px !important}
        .menu{display:flex !important;flex-direction:column !important;gap:5px !important}
        .menu-item,.menu a{min-height:47px !important;display:flex !important;align-items:center !important;gap:13px !important;padding:0 14px !important;border-radius:12px !important;color:#d2dcfa !important;font-size:13.5px !important;font-weight:700 !important;border:1px solid transparent !important;text-decoration:none !important;transition:.2s ease !important;position:relative !important}
        .menu-item:hover,.menu a:hover{color:white !important;background:rgba(255,255,255,.09) !important;transform:translateX(2px) !important}
        .menu-item.active,.menu a.active{color:white !important;background:linear-gradient(90deg,rgba(255,255,255,.17),rgba(255,255,255,.08)) !important;border-color:rgba(255,255,255,.10) !important;box-shadow:inset 3px 0 0 #9db9ff,0 8px 20px rgba(0,0,0,.08) !important}
        .menu-icon{width:25px !important;height:25px !important;display:flex !important;align-items:center !important;justify-content:center !important;flex-shrink:0 !important;border-radius:8px !important;background:rgba(255,255,255,.07) !important;font-size:14px !important}
        .menu-item::after,.menu a::after{content:"";position:absolute;left:10px;right:10px;bottom:5px;height:2px;border-radius:999px;background:linear-gradient(90deg,transparent,rgba(160,195,255,.75),transparent);transform:scaleX(0);opacity:0;transition:.22s ease;pointer-events:none}
        .menu-item:hover::after,.menu a:hover::after{transform:scaleX(1);opacity:.9}
        .menu-item.active::after,.menu a.active::after{transform:scaleX(1);opacity:.9}
        .menu-item:hover .menu-icon,.menu a:hover .menu-icon{background:rgba(255,255,255,.15) !important}
        .menu-item.active .menu-icon,.menu a.active .menu-icon{background:rgba(255,255,255,.14) !important;box-shadow:inset 0 0 0 1px rgba(255,255,255,.06) !important}
        .sidebar-logout{margin-top:auto !important;padding-top:20px !important}
        .sidebar-logout button,.logout-button{width:100% !important;min-height:47px !important;border:1px solid transparent !important;border-radius:12px !important;background:transparent !important;color:#d2dcfa !important;cursor:pointer !important;text-align:left !important;padding:0 14px !important;font-size:13.5px !important;font-weight:700 !important;transition:.2s ease !important;position:relative !important;display:flex !important;align-items:center !important;gap:13px !important}
        .sidebar-logout button:hover,.logout-button:hover{color:white !important;background:rgba(255,255,255,.09) !important;transform:translateX(2px) !important;border-color:rgba(255,255,255,.08) !important}
        .sidebar-logout button:active,.logout-button:active{background:rgba(151,190,255,.20) !important;transform:translateX(1px) scale(.995) !important}
        .sidebar-logout button::after,.logout-button::after{content:"";position:absolute;left:10px;right:10px;bottom:5px;height:2px;border-radius:999px;background:linear-gradient(90deg,transparent,rgba(160,195,255,.75),transparent);transform:scaleX(0);opacity:0;transition:.22s ease;pointer-events:none}
        .sidebar-logout button:hover::after,.logout-button:hover::after,.sidebar-logout button:active::after,.logout-button:active::after{transform:scaleX(1);opacity:.9}
        .sidebar-logout button .menu-icon,.logout-button .menu-icon{background:rgba(255,255,255,.07) !important}
        .sidebar-logout button:hover .menu-icon,.logout-button:hover .menu-icon{background:rgba(255,255,255,.15) !important}
        .topbar{height:76px !important;display:flex !important;align-items:center !important;justify-content:space-between !important;padding:0 32px !important;background:rgba(255,255,255,.88) !important;backdrop-filter:blur(14px) !important;-webkit-backdrop-filter:blur(14px) !important;border-bottom:1px solid rgba(226,230,238,.8) !important;position:sticky !important;top:0 !important;z-index:40 !important}
        .topbar-right{display:flex !important;align-items:center !important;gap:20px !important}
        .bell{width:38px !important;height:38px !important;display:flex !important;align-items:center !important;justify-content:center !important;position:relative !important;border:1px solid #e3e7ef !important;border-radius:11px !important;background:white !important;color:#5c6575 !important;box-shadow:0 4px 14px rgba(23,60,145,.05) !important}
        .bell-dot{width:7px !important;height:7px !important;position:absolute !important;top:7px !important;right:7px !important;border:2px solid white !important;border-radius:50% !important;background:#e14c4c !important}
        .profile{display:flex !important;align-items:center !important;gap:11px !important;padding-left:18px !important;border-left:1px solid #e3e7ef !important}
        .profile-info{display:flex !important;flex-direction:column !important;align-items:flex-end !important;justify-content:center !important;gap:3px !important;text-align:right !important}
        .profile-name{color:#172033 !important;font-size:13px !important;font-weight:700 !important;line-height:1.1 !important}
        .profile-role{margin-top:0 !important;color:#737b8c !important;font-size:11px !important;font-weight:500 !important;line-height:1.1 !important}
        .user-avatar,.profile-photo{width:40px !important;height:40px !important;display:flex !important;align-items:center !important;justify-content:center !important;border-radius:12px !important;background:linear-gradient(135deg,#e8eeff,#d5e0ff) !important;color:#173c91 !important;font-size:13px !important;font-weight:800 !important;border:0 !important;box-shadow:none !important}
        @media(max-width:900px){.sidebar{width:78px !important;padding:20px 10px !important}.main{margin-left:78px !important}.brand-name,.brand-title,.brand-subtitle,.menu-title{display:none !important}.menu-item,.menu a,.sidebar-logout button,.logout-button{justify-content:center !important;padding:0 !important;font-size:0 !important}.menu-icon{font-size:14px !important}.search-box{width:300px !important}}
        @media(max-width:650px){.topbar{padding:0 15px !important}.profile-info{display:none !important}.search-box{width:100% !important;height:38px !important}}
</style>

</head>


<body>


<div class="layout">



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

                    <div class="brand-title">
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
                    href="{{ route('dashboard') }}">
                    <span class="menu-icon"><i data-lucide="home"></i></span>
                    Dashboard
                </a>

                <a
                    href="{{ route('siswa.index') }}">
                    <span class="menu-icon"><i data-lucide="users-round"></i></span>
                    Data Siswa
                </a>

                <a
                    href="{{ route('penjadwalan.index') }}">
                    <span class="menu-icon"><i data-lucide="calendar-clock"></i></span>
                    Penjadwalan
                </a>

                <a
                    href="{{ route('konseling.index') }}">
                    <span class="menu-icon"><i data-lucide="clipboard-list"></i></span>
                    Data Konseling
                </a>

                <a
                    href="{{ route('siswa.riwayat') }}">
                    <span class="menu-icon"><i data-lucide="history"></i></span>
                    Riwayat Siswa
                </a>

                <a
                    href="{{ route('laporan.index', ['jenis' => 'periode']) }}" class="active">
                    <span class="menu-icon"><i data-lucide="file-chart-column"></i></span>
                    Laporan
                </a>

                <a
                    href="{{ route('pengaturan.index') }}">
                    <span class="menu-icon"><i data-lucide="settings"></i></span>
                    Pengaturan
                </a>

            </nav>

        </div>

        <div class="sidebar-logout">

            <form action="{{ route('logout') }}" method="POST" onsubmit="return confirm('Anda yakin ingin keluar?');">

                @csrf

                <button type="submit" class="logout-button">
                    <span class="menu-icon"><i data-lucide="log-out"></i></span>
                    Logout
                </button>

            </form>

        </div>

    </aside>


    <main class="main">


        <header class="topbar">

            <form
                action="{{ route('siswa.index') }}"
                method="GET"
                class="search-box"
            >
                <span class="search-icon">
                    <i data-lucide="search"></i>
                </span>

                <input
                    type="text"
                    name="search"
                    placeholder="Cari siswa atau data..."
                    value="{{ request('search') }}"
                >
            </form>

            <div class="topbar-right">


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
                            <i data-lucide="user"></i>
                        @endif
                    </div>

                </div>


            </div>


        </header>



        <section class="content">

            <div class="print-document-header" hidden>
                <div class="print-school-identity">
                    <img
                        class="print-school-logo"
                        src="{{ asset('images/logo-smpn2-dramaga.png') }}"
                        alt="Logo SMP Negeri 2 Dramaga"
                    >

                    <div class="print-school-text">
                        <div class="print-system-name">SIRASI-BK</div>
                        <div class="print-system-description">
                            Sistem Informasi Riwayat dan Administrasi
                            Bimbingan Konseling Siswa
                        </div>
                        <div class="print-school-name">SMP Negeri 2 Dramaga</div>
                    </div>
                </div>

                <div class="print-report-title">
                    <h1>
                        @if ($jenisLaporan === 'periode')
                            LAPORAN KONSELING PER PERIODE
                        @elseif ($jenisLaporan === 'per_siswa')
                            LAPORAN KONSELING PER SISWA
                        @else
                            REKAP MASALAH SISWA
                        @endif
                    </h1>
                </div>

                <dl class="print-report-meta">
                    @if ($jenisLaporan === 'periode')
                        <div class="print-meta-item">
                            <dt>Periode</dt>
                            <dd>
                                {{ \Carbon\Carbon::parse($tanggalMulai)->translatedFormat('d F Y') }}
                                s.d.
                                {{ \Carbon\Carbon::parse($tanggalAkhir)->translatedFormat('d F Y') }}
                            </dd>
                        </div>

                        <div class="print-meta-item">
                            <dt>Kelas</dt>
                            <dd>
                                {{ $idKelas
                                    ? (optional($kelas->firstWhere('id_kelas', $idKelas))->nama_kelas ?? '-')
                                    : 'Semua Kelas' }}
                            </dd>
                        </div>

                        @if ($idSiswa)
                            <div class="print-meta-item">
                                <dt>Siswa</dt>
                                <dd>
                                    {{ optional($siswa->firstWhere('id_siswa', $idSiswa))->nama_siswa ?? '-' }}
                                </dd>
                            </div>
                        @endif
                    @elseif ($jenisLaporan === 'per_siswa')
                        <div class="print-meta-item">
                            <dt>Nama Siswa</dt>
                            <dd>{{ $siswaTerpilih->nama_siswa ?? '-' }}</dd>
                        </div>

                        <div class="print-meta-item">
                            <dt>Kelas</dt>
                            <dd>
                                {{ $siswaTerpilih && $siswaTerpilih->kelas
                                    ? $siswaTerpilih->kelas->nama_kelas
                                    : '-' }}
                            </dd>
                        </div>

                        <div class="print-meta-item">
                            <dt>Informasi</dt>
                            <dd>
                                {{ $konselingSiswa->count() }}
                                catatan riwayat konseling
                            </dd>
                        </div>
                    @else
                        <div class="print-meta-item">
                            <dt>Total Konseling</dt>
                            <dd>{{ $totalKonselingMasalah }} catatan</dd>
                        </div>

                        <div class="print-meta-item">
                            <dt>Jumlah Jenis Masalah</dt>
                            <dd>{{ $totalJenisMasalah }} jenis</dd>
                        </div>

                        <div class="print-meta-item">
                            <dt>Masalah Terbanyak</dt>
                            <dd>
                                {{ $masalahTerbanyak['nama_jenis'] ?? 'Belum ada data' }}
                            </dd>
                        </div>
                    @endif
                </dl>
            </div>



            <div class="page-top">


                <div>

                    <div class="eyebrow">
                        SIRASI-BK
                    </div>


                    <h1 class="page-title">
                        Laporan
                    </h1>


                    <p class="page-subtitle">
                        Hasilkan dan unduh rekapitulasi data bimbingan konseling.
                    </p>

                </div>


            </div>



            <div class="report-types">



                <a
                    href="{{ route('laporan.index', ['jenis' => 'periode']) }}"
                    class="report-type {{ $jenisLaporan === 'periode' ? 'active' : '' }}"
                >


                    <div class="report-icon">
                        <i data-lucide="file-text"></i>
                    </div>


                    <div class="report-content">


                        <div class="report-type-title">
                            Laporan Konseling per Periode
                        </div>


                        <div class="report-type-description">
                            Rekapitulasi seluruh aktivitas konseling
                            dalam rentang waktu tertentu.
                        </div>


                    </div>


                </a>



                <a
                    href="{{ route('laporan.index', ['jenis' => 'per_siswa']) }}"
                    class="report-type {{ $jenisLaporan === 'per_siswa' ? 'active' : '' }}"
                >


                    <div class="report-icon">
                        <i data-lucide="users-round"></i>
                    </div>


                    <div class="report-content">


                        <div class="report-type-title">
                            Laporan Konseling per Siswa
                        </div>


                        <div class="report-type-description">
                            Detail riwayat konseling berdasarkan siswa tertentu.
                        </div>


                    </div>


                    <div class="report-arrow">
                        <i data-lucide="arrow-right"></i>
                    </div>


                </a>



                <a
                    href="{{ route('laporan.index', ['jenis' => 'rekap_masalah']) }}"
                    class="report-type {{ $jenisLaporan === 'rekap_masalah' ? 'active' : '' }}"
                >


                    <div class="report-icon">
                        <i data-lucide="file-chart-column"></i>
                    </div>


                    <div class="report-content">


                        <div class="report-type-title">
                            Rekap Masalah Siswa
                        </div>


                        <div class="report-type-description">
                            Statistik jenis permasalahan yang
                            ditangani dalam konseling.
                        </div>


                    </div>


                    <div class="report-arrow">
                        <i data-lucide="arrow-right"></i>
                    </div>


                </a>


            </div>

            @if ($jenisLaporan === 'periode')

                <div class="report-mode">

                    <div class="parameter-card">
                        <div class="parameter-header">
                            <div class="parameter-title">Parameter Laporan</div>
                            <div class="parameter-description">
                                Tentukan periode dan data siswa yang ingin ditampilkan.
                            </div>
                        </div>

                        <div class="parameter-body">
                            <form action="{{ route('laporan.index') }}" method="GET">
                                <input type="hidden" name="jenis" value="periode">

                                <div class="filter-grid">

                                    <div class="field">
                                        <label for="tanggal_mulai">Tanggal Mulai</label>
                                        <input
                                            type="date"
                                            id="tanggal_mulai"
                                            name="tanggal_mulai"
                                            value="{{ $tanggalMulai }}"
                                        >
                                    </div>

                                    <div class="field">
                                        <label for="tanggal_akhir">Tanggal Akhir</label>
                                        <input
                                            type="date"
                                            id="tanggal_akhir"
                                            name="tanggal_akhir"
                                            value="{{ $tanggalAkhir }}"
                                        >
                                    </div>

                                    <div class="field">
                                        <label for="id_kelas">Kelas</label>
                                        <select name="id_kelas" id="id_kelas">
                                            <option value="">Semua Kelas</option>
                                            @foreach ($kelas as $item)
                                                <option
                                                    value="{{ $item->id_kelas }}"
                                                    {{ (string) $idKelas === (string) $item->id_kelas ? 'selected' : '' }}
                                                >
                                                    {{ $item->nama_kelas }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="field">
                                        <label for="id_siswa">Nama Siswa</label>
                                        <select name="id_siswa" id="id_siswa">
                                            <option value="">Semua Siswa</option>
                                            @foreach ($siswa as $item)
                                                <option
                                                    value="{{ $item->id_siswa }}"
                                                    {{ (string) $idSiswa === (string) $item->id_siswa ? 'selected' : '' }}
                                                >
                                                    {{ $item->nama_siswa }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                </div>

                                <div class="button-row">
                                    <button type="submit" class="show-button">
                                        <i data-lucide="search"></i>
                                        Tampilkan Laporan
                                    </button>
                                                                    </div>
                            </form>
                        </div>
                    </div>

                    <div class="result-card">
                        <div class="result-header">
                            <div>
                                <div class="result-title">Hasil Laporan Konseling</div>
                                <div class="result-description">
                                    Data konseling berdasarkan parameter yang dipilih.
                                </div>
                            </div>

                            <button
                                type="button"
                                class="print-button"
                                onclick="window.print()"
                            >
                                <i data-lucide="printer"></i>
                                Cetak
                            </button>
                        </div>

                        @if ($konseling->count() > 0)
                            <div class="table-wrapper">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal</th>
                                            <th>Nama Siswa</th>
                                            <th>Kelas</th>
                                            <th>Jenis Masalah</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($konseling as $index => $item)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>

                                                <td class="date">
                                                    {{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}
                                                </td>

                                                <td class="student-name">
                                                    {{ $item->siswa->nama_siswa ?? '-' }}
                                                </td>

                                                <td>
                                                    {{ $item->siswa->kelas->nama_kelas ?? '-' }}
                                                </td>

                                                <td class="problem-name">
                                                    {{ $item->jenisMasalah->nama_jenis ?? '-' }}
                                                </td>

                                                <td>
                                                    @php
                                                        $status = strtolower(trim($item->status ?? ''));
                                                    @endphp

                                                    @if ($status === 'selesai')
                                                        <span class="status status-selesai">Selesai</span>
                                                   @elseif ($status === 'proses')
                                                        <span class="status status-proses">
                                                            <span class="status-dot"></span>
                                                            Proses
                                                        </span>
                                                    @else
                                                        <span class="status">{{ $item->status ?? '-' }}</span>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="empty">
                                <div class="empty-icon">
                                    <i data-lucide="clipboard-list"></i>
                                </div>
                                <div class="empty-title">Belum Ada Data Konseling</div>
                                <div class="empty-text">
                                    Tidak ada data konseling berdasarkan parameter yang dipilih.
                                </div>
                            </div>
                        @endif
                    </div>

                </div>

            @elseif ($jenisLaporan === 'per_siswa')

                <div class="report-mode">

                    <div class="parameter-card">
                        <div class="parameter-header">
                            <div class="parameter-title">Pilih Siswa</div>
                            <div class="parameter-description">
                                Tampilkan seluruh riwayat konseling berdasarkan siswa tertentu.
                            </div>
                        </div>

                        <div class="parameter-body">
                            <form action="{{ route('laporan.index') }}" method="GET">
                                <input type="hidden" name="jenis" value="per_siswa">

                                <div class="filter-grid">
                                    <div class="field">
                                        <label for="laporan_siswa">Nama Siswa</label>

                                        <select name="id_siswa" id="laporan_siswa">
                                            <option value="">Pilih Siswa</option>

                                            @foreach ($siswa as $item)
                                                <option
                                                    value="{{ $item->id_siswa }}"
                                                    {{ (string) $idSiswa === (string) $item->id_siswa ? 'selected' : '' }}
                                                >
                                                    {{ $item->nama_siswa }}
                                                    @if ($item->kelas)
                                                        — {{ $item->kelas->nama_kelas }}
                                                    @endif
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="button-row">
                                    <button type="submit" class="show-button">
                                        <i data-lucide="search"></i>
                                        Tampilkan Riwayat
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="result-card">
                        <div class="result-header">
                            <div>
                                <div class="result-title">
                                    {{ $siswaTerpilih ? 'Riwayat Konseling ' . $siswaTerpilih->nama_siswa : 'Riwayat Konseling Siswa' }}
                                </div>

                                <div class="result-description">
                                    {{ $siswaTerpilih ? ($siswaTerpilih->kelas->nama_kelas ?? 'Kelas -') : 'Pilih siswa untuk melihat riwayat konseling.' }}
                                </div>
                            </div>

                            @if ($idSiswa)
                                <button
                                    type="button"
                                    class="print-button"
                                    onclick="window.print()"
                                >
                                    <i data-lucide="printer"></i>
                                    Cetak
                                </button>
                            @endif
                        </div>

                        @if ($idSiswa && $siswaTerpilih && $konselingSiswa->count() > 0)
                            <div class="table-wrapper">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal</th>
                                            <th>Jenis Masalah</th>
                                            <th>Tindak Lanjut</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($konselingSiswa as $index => $item)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>

                                                <td class="date">
                                                    {{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}
                                                </td>

                                                <td class="problem-name">
                                                    {{ $item->jenisMasalah->nama_jenis ?? '-' }}
                                                </td>

                                                <td>
                                                    {{ $item->tindak_lanjut ?? 'Belum ada tindak lanjut' }}
                                                </td>

                                                <td>
                                                    @php
                                                        $status = strtolower(trim($item->status ?? ''));
                                                    @endphp

                                                    @if ($status === 'selesai')
                                                        <span class="status status-selesai">Selesai</span>
                                                    @elseif ($status === 'proses')
                                                        <span class="status status-proses">Proses</span>
                                                    @else
                                                        <span class="status">{{ $item->status ?? '-' }}</span>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @elseif (!$idSiswa)
                            <div class="empty">
                                <div class="empty-icon">
                                    <i data-lucide="user-round"></i>
                                </div>
                                <div class="empty-title">Pilih Siswa</div>
                                <div class="empty-text">
                                    Pilih nama siswa terlebih dahulu untuk melihat riwayat konseling.
                                </div>
                            </div>
                        @else
                            <div class="empty">
                                <div class="empty-icon">
                                    <i data-lucide="history"></i>
                                </div>
                                <div class="empty-title">Belum Ada Riwayat Konseling</div>
                                <div class="empty-text">
                                    Siswa ini belum memiliki catatan konseling.
                                </div>
                            </div>
                        @endif
                    </div>

                </div>

            @elseif ($jenisLaporan === 'rekap_masalah')

                <div class="report-mode">

                    <div class="summary-grid">

                        <div class="summary-card">
                            <div class="summary-label">TOTAL KONSELING</div>
                            <div class="summary-value">{{ $totalKonselingMasalah }}</div>
                            <div class="summary-description">Seluruh catatan konseling</div>
                        </div>

                        <div class="summary-card">
                            <div class="summary-label">JENIS MASALAH</div>
                            <div class="summary-value">{{ $totalJenisMasalah }}</div>
                            <div class="summary-description">Kategori masalah yang tercatat</div>
                        </div>

                        <div class="summary-card highlight">
                            <div class="summary-label">MASALAH TERBANYAK</div>
                            <div class="summary-value">{{ $masalahTerbanyak['jumlah'] ?? 0 }}</div>
                            <div class="summary-description">
                                {{ $masalahTerbanyak['nama_jenis'] ?? 'Belum ada data' }}
                            </div>
                        </div>

                    </div>

                    <div class="report-table-card">

                        <div class="report-table-header">
                            <div>
                                <div class="report-table-title">
                                    Statistik Jenis Masalah
                                </div>

                                <div class="report-table-subtitle">
                                    Urutan masalah berdasarkan jumlah kasus konseling.
                                </div>
                            </div>

                            <button
                                type="button"
                                class="print-button"
                                onclick="window.print()"
                            >
                                <i data-lucide="printer"></i>
                                Cetak
                            </button>
                        </div>

                        @if ($rekapMasalah->count() > 0)

                            <div class="table-wrapper">
                                <table class="report-table">

                                    <thead>
                                        <tr>
                                            <th>Peringkat</th>
                                            <th>Jenis Masalah</th>
                                            <th>Jumlah</th>
                                            <th>Persentase</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($rekapMasalah as $index => $masalah)

                                            @php
                                                $persentase = round(
                                                    ($masalah['jumlah'] / $totalUntukPersen) * 100,
                                                    1
                                                );
                                            @endphp

                                            <tr>
                                                <td>
                                                    <div class="report-rank {{ $index === 0 ? 'top' : '' }}">
                                                        {{ $index + 1 }}
                                                    </div>
                                                </td>

                                                <td>
                                                    <div class="report-problem">
                                                        {{ $masalah['nama_jenis'] }}
                                                    </div>
                                                </td>

                                                <td>
                                                    <div class="report-count">
                                                        {{ $masalah['jumlah'] }}
                                                    </div>
                                                </td>

                                                <td>
                                                    <div class="report-progress-wrap">
                                                        <span class="report-percentage">
                                                            {{ $persentase }}%
                                                        </span>

                                                        <div class="report-progress">
                                                            <div
                                                                class="report-progress-fill"
                                                                style="width: {{ min($persentase, 100) }}%;"
                                                            ></div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>

                                        @endforeach
                                    </tbody>

                                </table>
                            </div>

                        @else

                            <div class="empty">
                                <div class="empty-icon">
                                    <i data-lucide="file-chart-column"></i>
                                </div>
                                <div class="empty-title">Belum Ada Data Masalah</div>
                                <div class="empty-text">
                                    Belum ada data konseling yang dapat direkap.
                                </div>
                            </div>

                        @endif

                    </div>

                </div>

            @endif

            <footer class="print-document-footer" hidden>
                SMP Negeri 2 Dramaga
            </footer>

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
