<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard - SIRASI-BK</title>

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
            --border: #e7eaf0;

            --green: #159447;
            --green-bg: #e9f8ef;

            --orange: #d98218;
            --orange-bg: #fff4e3;

            --red: #d64545;
            --red-bg: #fff0f0;

            --shadow-sm: 0 4px 14px rgba(23, 60, 145, .05);
            --shadow-md: 0 12px 30px rgba(23, 60, 145, .08);
            --shadow-lg: 0 20px 45px rgba(23, 60, 145, .12);
        }

        body {
            margin: 0;
            font-family: Inter, "Segoe UI", Arial, Helvetica, sans-serif;
            background:
                radial-gradient(circle at 85% 0%, rgba(41, 67, 143, .08), transparent 28%),
                #f5f7fb;
            color: var(--text);
        }

        a {
            text-decoration: none;
        }

        button,
        input {
            font-family: inherit;
        }

        /*app*/
        .app {
            display: flex;
            min-height: 100vh;
        }

        /*sidebar*/
        .sidebar {
            width: 270px;
            min-height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            bottom: 0;
            z-index: 20;

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

            background: rgba(255, 255, 255, .14);
            border: 1px solid rgba(255, 255, 255, .20);

            box-shadow:
                inset 0 1px 0 rgba(255,255,255,.15),
                0 8px 20px rgba(0,0,0,.10);

            font-size: 21px;
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
            letter-spacing: .2px;
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
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1.1px;
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

            border: 1px solid rgba(255,255,255,.10);

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
            z-index: 10;
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

            box-shadow:
                inset 0 0 0 1px rgba(23,60,145,.08);
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
        }

        /*content*/
        .content {
            padding: 32px;
            max-width: 1700px;
            margin: auto;
        }

        .welcome-card {
            position: relative;
            overflow: hidden;

            display: flex;
            align-items: center;
            justify-content: space-between;

            min-height: 150px;

            margin-bottom: 25px;
            padding: 28px 30px;

            border: 1px solid #dfe6f5;
            border-radius: 22px;

            background:
                linear-gradient(
                    135deg,
                    #ffffff 0%,
                    #f7f9ff 100%
                );

            box-shadow: var(--shadow-md);
        }

        .welcome-card::before {
            content: "";

            position: absolute;
            width: 280px;
            height: 280px;

            right: -90px;
            top: -160px;

            border-radius: 50%;

            background: rgba(41,67,143,.07);
        }

        .welcome-card::after {
            content: "";

            position: absolute;
            width: 180px;
            height: 180px;

            right: 130px;
            bottom: -130px;

            border-radius: 50%;

            background: rgba(41,67,143,.04);
        }

        .welcome {
            position: relative;
            z-index: 1;
        }

        .eyebrow {
            margin-bottom: 7px;

            color: var(--primary);

            font-size: 11px;
            font-weight: 800;

            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .welcome h1 {
            font-size: 26px;
            line-height: 1.25;
            font-weight: 800;
            letter-spacing: -.5px;
        }

        .welcome p {
            margin-top: 8px;

            color: var(--muted);
            font-size: 13px;
        }

        .actions {
            position: relative;
            z-index: 2;

            display: flex;
            gap: 10px;
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

            font-size: 12.5px;
            font-weight: 700;

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
            color: #fff;

            box-shadow:
                0 8px 20px rgba(23,60,145,.20);
        }

body.dark-mode .btn-primary {
    border-color: #3967d1;
    background: #1d2c47;
    color: #a9c5ff;
}

        .btn-primary:hover {
            background: var(--primary-dark);
        }

        /*stat card*/
        .stats {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 18px;

            margin-bottom: 24px;
        }

        .stat-card {
            position: relative;
            overflow: hidden;

            min-height: 132px;

            padding: 21px;

            border: 1px solid var(--border);
            border-radius: 18px;

            background: white;

            box-shadow: var(--shadow-sm);

            transition: .25s ease;
        }

        .stat-card::after {
            content: "";

            position: absolute;

            width: 90px;
            height: 90px;

            right: -35px;
            top: -35px;

            border-radius: 50%;

            background: var(--primary-soft);
        }

        .stat-card:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow-lg);
        }

        .stat-top {
            display: flex;
            align-items: center;
            justify-content: space-between;

            position: relative;
            z-index: 1;
        }

        .stat-icon {
            width: 43px;
            height: 43px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 13px;

            background: var(--primary-light);
            color: var(--primary);

            font-size: 18px;

            box-shadow:
                inset 0 0 0 1px rgba(23,60,145,.06);
        }

        .stat-mini {
            padding: 5px 8px;

            border-radius: 7px;

            background: #f5f7fb;
            color: #8790a0;

            font-size: 9px;
            font-weight: 700;
        }

        .stat-label {
            position: relative;
            z-index: 1;

            margin-top: 17px;

            color: var(--muted);

            font-size: 11.5px;
            font-weight: 600;
        }

        .stat-value {
            position: relative;
            z-index: 1;

            margin-top: 3px;

            font-size: 26px;
            font-weight: 800;
            letter-spacing: -.6px;
        }

        /*main grid*/
        .dashboard-grid {
            display: grid;
            grid-template-columns: minmax(0, 1.65fr) minmax(300px, .8fr);
            gap: 20px;
        }

        .panel {
            overflow: hidden;

            border: 1px solid var(--border);
            border-radius: 18px;

            background: white;

            box-shadow: var(--shadow-sm);
        }

        .panel-header {
            min-height: 67px;

            display: flex;
            align-items: center;
            justify-content: space-between;

            padding: 0 21px;

            border-bottom: 1px solid var(--border);
        }

        .panel-heading {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .panel-heading-icon {
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

        .panel-title {
            font-size: 15px;
            font-weight: 800;
        }

        .panel-subtitle {
            margin-top: 3px;

            color: var(--muted);
            font-size: 10px;
        }

        .panel-link {
            color: var(--primary);
            font-size: 11px;
            font-weight: 700;
        }

        .panel-link:hover {
            text-decoration: underline;
        }

        /*table*/
        .table-wrap {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            padding: 12px 20px;

            background: #fafbfe;

            color: #8a92a1;

            font-size: 9.5px;
            font-weight: 800;

            text-align: left;
            text-transform: uppercase;
            letter-spacing: .5px;

            white-space: nowrap;
        }

        td {
            padding: 14px 20px;

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
            width: 32px;
            height: 32px;

            display: flex;
            align-items: center;
            justify-content: center;

            flex-shrink: 0;

            border-radius: 10px;

            background: #edf2ff;
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

            margin-top: 2px;

            color: #9299a8;

            font-size: 9px;
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

        .status-process {
            background: #1d2c47 !important;
            color: #a9c5ff !important;
        }

        body:not(.dark-mode) .status-process {
            background: #fff4df !important;
            color: #f2b866 !important;
        }

        .status-process::before {
            background: #e9a23b !important;
        }

        .status-success {
            background: var(--green-bg);
            color: var(--green);
        }

        .status-success::before {
            background: var(--green);
        }

        .empty-state {
            padding: 45px 20px;

            text-align: center;

            color: var(--muted);

            font-size: 12px;
        }

        .status-danger {
            background: #ffe2e5 !important;
            color: #f64e60 !important;
        }

        .status-danger::before {
            background: #f64e60 !important;
        }

        body.dark-mode .status-danger {
            background: #3a2028 !important;
            color: #ff9aa5 !important;
        }

        body.dark-mode .status-danger::before {
            background: #e46c6c !important;
        }

        /*columns*/
        .left-column,
        .right-column {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        /*chart*/
        .chart-panel {
            padding: 20px;
        }

        .chart-header {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;

            margin-bottom: 18px;
        }

        .chart-title {
            font-size: 15px;
            font-weight: 800;
        }

        .chart-description {
            margin-top: 4px;

            color: var(--muted);
            font-size: 10px;
        }

        .chart-total {
            text-align: right;
        }

        .chart-total strong {
            display: block;
            font-size: 20px;
            font-weight: 800;
        }

        .chart-total span {
            color: var(--muted);
            font-size: 9px;
        }

        .chart {
            height: 205px;

            display: flex;
            align-items: flex-end;

            gap: 8px;

            padding: 0 2px 24px;

            border-bottom: 1px solid #e9ecf2;
        }

        .bar-wrapper {
            position: relative;

            flex: 1;
            height: 100%;

            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            align-items: center;
        }

        .bar-value {
            position: absolute;
            bottom: 100%;

            margin-bottom: 5px;

            color: var(--primary);

            font-size: 8px;
            font-weight: 700;
        }

        .bar {
            width: 100%;
            max-width: 22px;

            min-height: 4px;

            border-radius: 7px 7px 3px 3px;

            background:
                linear-gradient(
                    180deg,
                    #9bb2ef,
                    #dce6ff
                );

            transition: .25s ease;
        }

        .bar.active {
            background:
                linear-gradient(
                    180deg,
                    #173c91,
                    #5578cf
                );

            box-shadow:
                0 5px 12px rgba(23,60,145,.18);
        }

        .bar:hover {
            transform: translateY(-3px);
        }

        .bar-label {
            position: absolute;
            bottom: -20px;

            color: #8b93a2;

            font-size: 8px;
        }

        /*quick action*/
        .quick-panel {
            position: relative;
            overflow: hidden;

            padding: 21px;

            border-radius: 18px;

            background:
                linear-gradient(
                    135deg,
                    #173c91,
                    #294f9e
                );

            color: white;

            box-shadow: 0 18px 35px rgba(23,60,145,.20);
        }

        .quick-panel::before {
            content: "";

            position: absolute;

            width: 170px;
            height: 170px;

            right: -65px;
            top: -85px;

            border-radius: 50%;

            background: rgba(255,255,255,.08);
        }

        .quick-panel::after {
            content: "";

            position: absolute;

            width: 120px;
            height: 120px;

            left: -70px;
            bottom: -75px;

            border-radius: 50%;

            background: rgba(255,255,255,.05);
        }

        .quick-content {
            position: relative;
            z-index: 1;
        }

        .quick-title {
            font-size: 15px;
            font-weight: 800;
        }

        .quick-subtitle {
            margin-top: 4px;

            color: #cbd8fa;

            font-size: 10px;
        }

        .quick-actions {
            display: grid;
            gap: 9px;

            margin-top: 17px;
        }

        .quick-action {
            min-height: 45px;

            display: flex;
            align-items: center;
            justify-content: space-between;

            padding: 0 12px;

            border: 1px solid rgba(255,255,255,.15);
            border-radius: 11px;

            background: rgba(255,255,255,.08);

            color: white;

            font-size: 11px;
            font-weight: 600;

            transition: .2s ease;
        }

        .quick-action:hover {
            background: rgba(255,255,255,.15);
            transform: translateX(3px);
        }

        .quick-action-left {
            display: flex;
            align-items: center;
            gap: 9px;
        }

        .quick-action-icon {
            width: 27px;
            height: 27px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 8px;

            background: rgba(255,255,255,.13);
        }

        /*responsive*/
        @media (max-width: 1250px) {

            .sidebar {
                width: 235px;
            }

            .main {
                margin-left: 235px;
            }

            .stats {
                grid-template-columns: repeat(2, 1fr);
            }

            .dashboard-grid {
                grid-template-columns: 1fr;
            }

            .right-column {
                display: grid;
                grid-template-columns: 1fr 1fr;
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

            .search-box {
                width: 300px;
            }

            .content {
                padding: 22px;
            }
        }

        @media (max-width: 700px) {

            .header {
                height: auto;
                min-height: 72px;

                gap: 12px;

                padding: 14px;
            }

            .search-box {
                width: 100%;
            }

            .profile-info {
                display: none;
            }

            .profile {
                border-left: 0;
                padding-left: 0;
            }

            .welcome-card {
                flex-direction: column;
                align-items: flex-start;
                gap: 20px;

                padding: 23px;
            }

            .actions {
                width: 100%;
            }

            .actions .btn {
                flex: 1;
            }

            .stats {
                grid-template-columns: 1fr;
            }

            .right-column {
                display: flex;
            }

            .content {
                padding: 16px;
            }
        }

        @media (max-width: 480px) {

            .sidebar {
                width: 66px;
            }

            .main {
                margin-left: 66px;
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

            .welcome h1 {
                font-size: 21px;
            }

            .welcome p {
                line-height: 1.6;
            }

            .actions {
                flex-direction: column;
            }

            .actions .btn {
                width: 100%;
            }

            .panel-header {
                padding: 0 15px;
            }

            th,
            td {
                padding-left: 14px;
                padding-right: 14px;
            }
        }


        html.dark-mode body.dark-mode .status.status-process {      /*status dark mode*/
            background: #1d2c47 !important;
            color: #a9c5ff !important;
        }

        html.dark-mode body.dark-mode .status.status-process::before {
            background: #6f9cff !important;
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
  background:transparent !important;
  border:1px solid transparent !important;
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

/*setting*/
.option-card{
  border-radius:17px !important;
  transition:transform .22s ease,box-shadow .22s ease,border-color .22s ease,background .22s ease !important;
}
.option-card:hover{transform:translateY(-4px) !important}
.option-card:active{transform:translateY(-1px) scale(.995) !important;background:#f1f5ff !important}
.option-icon{transition:transform .22s ease}
.option-card:hover .option-icon{transform:scale(1.05) rotate(-2deg)}
.application-card{border-radius:17px !important}

/*form controls*/
input,select,textarea,.form-control,.filter-select,.filter-date{
  border-color:#dce4f0 !important;
  background:#fbfcfe !important;
  color:#26334b !important;
  transition:border-color .18s ease,box-shadow .18s ease,background .18s ease !important;
}
input:hover,select:hover,textarea:hover,.form-control:hover,.filter-select:hover,.filter-date:hover{border-color:#c7d5eb !important}

/*dashboard dark mode*/
body.dark-mode .actions .btn:not(.btn-primary) {
    background: #18253b !important;
    border-color: #3b5685 !important;
    color: #dbe7ff !important;
    box-shadow: none !important;
}

body.dark-mode .actions .btn:not(.btn-primary):hover {
    background: #22365a !important;
    border-color: #5d83d5 !important;
    color: #ffffff !important;
}

body.dark-mode .status-process {
    background: #3b2d1d !important;
    color: #f2b866 !important;
}

body.dark-mode .status-process::before {
    background: #e9a23b !important;
}

body.dark-mode .status-success {
    background: #173628 !important;
    color: #62d292 !important;
}

body.dark-mode .status-success::before {
    background: #55c98a !important;
}

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

</style>
    @include('partials.theme')
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

                <a href="{{ route('dashboard') }}" class="menu-item active">
                    <span class="menu-icon"><i data-lucide="home"></i></span>
                    Dashboard
                </a>

                <a href="{{ route('siswa.index') }}" class="menu-item">
                    <span class="menu-icon"><i data-lucide="users-round"></i></span>
                    Data Siswa
                </a>

                <a
                    href="{{ route('penjadwalan.index') }}"
                    class="menu-item">
                    <span class="menu-icon">
                        <i data-lucide="calendar-clock"></i></span>
                    <span>Penjadwalan</span>
                </a>

                <a href="{{ route('konseling.index') }}" class="menu-item">
                    <span class="menu-icon"><i data-lucide="clipboard-list"></i></span>
                    <span>Data Konseling</span>
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
                class="search-box"
            >
                <span class="search-icon">
                    <i data-lucide="search"></i>
                </span>

                <input
                    type="text"
                    name="search"
                    placeholder="Cari siswa atau konseling..."
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



            <div class="welcome-card">

                <div class="welcome">

                    <div class="eyebrow">
                        Dashboard SIRASI-BK
                    </div>

                    <h1>
                        Selamat datang,
                        {{ auth()->user()->nama }}
                        <i data-lucide="hand"></i>
                    </h1>

                    <p>
                        Pantau aktivitas bimbingan dan konseling
                        siswa SMP Negeri 2 Dramaga dengan mudah.
                    </p>

                </div>


                <div class="actions">

                    <a
                        href="{{ route('siswa.create') }}"
                        class="btn"
                    >
                        <i data-lucide="user-plus"></i>
                        Tambah Siswa
                    </a>
                    <a
                        href="{{ route('konseling.create') }}"
                        class="btn btn-primary"
                    >
                        <i data-lucide="clipboard-plus"></i>
                        Tambah Konseling
                    </a>

                </div>

            </div>



            <div class="stats">


                <div class="stat-card">

                    <div class="stat-top">

                        <div class="stat-icon">
                            <i data-lucide="users-round"></i>
                        </div>

                        <div class="stat-mini">
                            DATA
                        </div>

                    </div>

                    <div class="stat-label">
                        Total Siswa
                    </div>

                    <div class="stat-value">
                        {{ $totalSiswa }}
                    </div>

                </div>


                <div class="stat-card">

                    <div class="stat-top">

                        <div class="stat-icon">
                            <i data-lucide="clipboard-list"></i>
                        </div>

                        <div class="stat-mini">
                            SESI
                        </div>

                    </div>

                    <div class="stat-label">
                        Total Konseling
                    </div>

                    <div class="stat-value">
                        {{ $totalKonseling }}
                    </div>

                </div>


                <div class="stat-card">

                    <div class="stat-top">

                        <div class="stat-icon">
                            <i data-lucide="calendar-days"></i>
                        </div>

                        <div class="stat-mini">
                            BULAN INI
                        </div>

                    </div>

                    <div class="stat-label">
                        Konseling Bulan Ini
                    </div>

                    <div class="stat-value">
                        {{ $konselingBulanIni }}
                    </div>

                </div>


                <div class="stat-card">

                    <div class="stat-top">

                        <div class="stat-icon">
                            <i data-lucide="list-checks"></i>
                        </div>

                        <div class="stat-mini">
                            MONITOR
                        </div>

                    </div>

                    <div class="stat-label">
                        Total Tindak Lanjut
                    </div>

                    <div class="stat-value">
                        {{ $totalTindakLanjut }}
                    </div>

                </div>


            </div>



            <div class="dashboard-grid">

                <div class="left-column">


                <div class="panel">

                    <div class="panel-header">

                        <div class="panel-heading">

                            <div class="panel-heading-icon">
                                <i data-lucide="clipboard-list"></i>
                            </div>

                            <div>

                                <div class="panel-title">
                                    Riwayat Konseling Terbaru
                                </div>

                                <div class="panel-subtitle">
                                    Aktivitas konseling terbaru siswa
                                </div>

                            </div>

                        </div>

                        <a
                            href="{{ route('konseling.index') }}"
                            class="panel-link"
                        >
                            Lihat Semua
                            <i data-lucide="arrow-right"></i>
                        </a>

                    </div>


                    <div class="table-wrap">

                        <table>

                            <thead>

                                <tr>

                                    <th>
                                        Tanggal
                                    </th>

                                    <th>
                                        Siswa
                                    </th>

                                    <th>
                                        Kelas
                                    </th>

                                    <th>
                                        Masalah
                                    </th>

                                    <th>
                                        Status
                                    </th>

                                </tr>

                            </thead>


                            <tbody>

                                @forelse ($riwayatKonseling as $konseling)

                                    <tr>

                                        <td>
                                            {{ \Carbon\Carbon::parse($konseling->tanggal)->format('d M Y') }}
                                        </td>


                                        <td>

                                            <div class="student-cell">

                                                <div class="student-avatar">

                                                    {{
                                                        strtoupper(
                                                            substr(
                                                                $konseling->siswa->nama_siswa ?? 'S',
                                                                0,
                                                                1
                                                            )
                                                        )
                                                    }}

                                                </div>

                                                <div class="student-info">

                                                    <strong>
                                                        {{ $konseling->siswa->nama_siswa ?? '-' }}
                                                    </strong>

                                                    <span>
                                                        Siswa
                                                    </span>

                                                </div>

                                            </div>

                                        </td>


                                        <td>
                                            {{ $konseling->siswa->kelas->nama_kelas ?? '-' }}
                                        </td>


                                        <td>
                                            {{ $konseling->jenisMasalah->nama_jenis ?? '-' }}
                                        </td>


                                        <td>

                                            @if ($konseling->status === 'Selesai')

                                                <span class="status status-success">
                                                    Selesai
                                                </span>

                                            @else

                                                <span class="status status-process">
                                                    {{ $konseling->status }}
                                                </span>

                                            @endif

                                        </td>

                                    </tr>

                                @empty

                                    <tr>

                                        <td
                                            colspan="5"
                                            class="empty-state"
                                        >
                                            Belum ada riwayat konseling.
                                        </td>

                                    </tr>

                                @endforelse

                            </tbody>

                        </table>

                    </div>

                </div>

                <div class="panel">

                    <div class="panel-header">

                        <div class="panel-heading">

                            <div class="panel-heading-icon">
                                <i data-lucide="calendar-clock"></i>
                            </div>

                            <div>

                                <div class="panel-title">
                                    Penjadwalan BK
                                </div>

                                <div class="panel-subtitle">
                                    Jadwal bimbingan siswa terdekat
                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="table-wrap">

                        <table>

                            <thead>

                                <tr>

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
                                        Waktu
                                    </th>

                                    <th>
                                        Jenis Bimbingan
                                    </th>

                                    <th>
                                        Status
                                    </th>

                                </tr>

                            </thead>

                            <tbody>

                                @forelse ($jadwalBimbingan as $jadwal)

                                    <tr>

                                        <td>
                                            {{ \Carbon\Carbon::parse($jadwal->tanggal)->format('d M Y') }}
                                        </td>

                                        <td>

                                            <div class="student-cell">

                                                <div class="student-avatar">
                                                    {{
                                                        strtoupper(
                                                            substr(
                                                                $jadwal->siswa->nama_siswa ?? 'S',
                                                                0,
                                                                1
                                                            )
                                                        )
                                                    }}
                                                </div>

                                                <div class="student-info">

                                                    <strong>
                                                        {{ $jadwal->siswa->nama_siswa ?? '-' }}
                                                    </strong>

                                                    <span>
                                                        Siswa
                                                    </span>

                                                </div>

                                            </div>

                                        </td>

                                        <td>
                                            {{ $jadwal->siswa->kelas->nama_kelas ?? '-' }}
                                        </td>

                                        <td>
                                            {{ \Carbon\Carbon::parse($jadwal->waktu_mulai)->format('H:i') }}
                                            -
                                            {{ \Carbon\Carbon::parse($jadwal->waktu_selesai)->format('H:i') }}
                                        </td>

                                        <td>
                                            {{ $jadwal->jenis_bimbingan }}
                                        </td>

                                        <td>

                                            @if ($jadwal->status === 'Selesai')

                                                <span class="status status-success">
                                                    Selesai
                                                </span>

                                            @elseif ($jadwal->status === 'Dibatalkan')

                                                <span class="status status-danger">
                                                    Dibatalkan
                                                </span>

                                            @else

                                                <span class="status status-process">
                                                    Terjadwal
                                                </span>

                                            @endif

                                        </td>

                                    </tr>

                                @empty

                                    <tr>

                                        <td
                                            colspan="6"
                                            class="empty-state"
                                        >
                                            Belum ada jadwal bimbingan.
                                        </td>

                                    </tr>

                                @endforelse

                            </tbody>

                        </table>

                    </div>

                </div>

                </div>


                <div class="right-column">



                    <div class="panel chart-panel">

                        <div class="chart-header">

                            <div>

                                <div class="chart-title">
                                    Konseling per Bulan
                                </div>

                                <div class="chart-description">
                                    Aktivitas konseling tahun berjalan
                                </div>

                            </div>


                            <div class="chart-total">

                                <strong>
                                    {{ $totalKonseling }}
                                </strong>

                                <span>
                                    Total sesi
                                </span>

                            </div>

                        </div>


                        @php

                            $namaBulan = [
                                1 => 'Jan',
                                2 => 'Feb',
                                3 => 'Mar',
                                4 => 'Apr',
                                5 => 'Mei',
                                6 => 'Jun',
                                7 => 'Jul',
                                8 => 'Agu',
                                9 => 'Sep',
                                10 => 'Okt',
                                11 => 'Nov',
                                12 => 'Des',
                            ];

                            $dataPerBulan = $konselingPerBulan
                                ->keyBy('bulan');

                            $maksimal = max(
                                $dataPerBulan->max('jumlah') ?? 0,
                                1
                            );

                        @endphp


                        <div class="chart">

                            @foreach ($namaBulan as $nomorBulan => $nama)

                                @php

                                    $jumlah =
                                        $dataPerBulan
                                            ->get($nomorBulan)
                                            ->jumlah
                                        ?? 0;

                                    $tinggi = $jumlah > 0
                                        ? max(
                                            ($jumlah / $maksimal) * 155,
                                            12
                                        )
                                        : 4;

                                @endphp


                                <div class="bar-wrapper">

                                    @if ($jumlah > 0)

                                        <span class="bar-value">
                                            {{ $jumlah }}
                                        </span>

                                    @endif


                                    <div
                                        class="bar {{ $jumlah > 0 ? 'active' : '' }}"
                                        style="height: {{ $tinggi }}px;"
                                        title="{{ $jumlah }} konseling"
                                    ></div>


                                    <span class="bar-label">
                                        {{ $nama }}
                                    </span>

                                </div>

                            @endforeach

                        </div>

                    </div>



                    <div class="quick-panel">

                        <div class="quick-content">

                            <div class="quick-title">
                                Aksi Cepat
                            </div>

                            <div class="quick-subtitle">
                                Akses fitur yang sering digunakan
                            </div>


                            <div class="quick-actions">


                                <a
                                    href="{{ route('siswa.create') }}"
                                    class="quick-action"
                                >

                                    <span class="quick-action-left">

                                        <span class="quick-action-icon">
                                            <i data-lucide="user-plus"></i>
                                        </span>

                                        Input Data Siswa Baru

                                    </span>

                                    <span>
                                        <i data-lucide="arrow-right"></i>
                                    </span>

                                </a>


                                <a
                                    href="{{ route('konseling.create') }}"
                                    class="quick-action"
                                >

                                    <span class="quick-action-left">

                                        <span class="quick-action-icon">
                                            <i data-lucide="clipboard-plus"></i>
                                        </span>

                                        Tambah Catatan Konseling

                                    </span>

                                    <span>
                                        <i data-lucide="arrow-right"></i>
                                    </span>

                                </a>


                                <a
                                    href="{{ route('laporan.index') }}"
                                    class="quick-action"
                                >

                                    <span class="quick-action-left">

                                        <span class="quick-action-icon">
                                            <i data-lucide="file-chart-column"></i>
                                        </span>

                                        Buat Laporan

                                    </span>

                                    <span>
                                        <i data-lucide="arrow-right"></i>
                                    </span>

                                </a>

                            </div>

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
