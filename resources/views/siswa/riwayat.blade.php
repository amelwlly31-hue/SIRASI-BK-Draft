<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Riwayat Siswa - SIRASI-BK</title>

    <script src="https://unpkg.com/lucide@latest"></script>

    @include('partials.theme')

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
        input {
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
            top: 0;
            left: 0;
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

        
        .summary-row {
            display: grid;

            grid-template-columns: repeat(3, 1fr);

            gap: 16px;

            margin-bottom: 20px;
        }

        .summary-card {
            position: relative;
            overflow: hidden;

            min-height: 118px;

            padding: 20px;

            border: 1px solid var(--border);
            border-radius: 18px;

            background: white;

            box-shadow: var(--shadow-sm);

            transition: .2s ease;
        }

        .summary-card:hover {
            transform: translateY(-3px);

            box-shadow: var(--shadow-md);
        }

        .summary-card::after {
            content: "";

            width: 110px;
            height: 110px;

            position: absolute;

            right: -60px;
            bottom: -60px;

            border-radius: 50%;

            background: rgba(23,60,145,.045);
        }

        .summary-icon {
            width: 39px;
            height: 39px;

            display: flex;
            align-items: center;
            justify-content: center;

            margin-bottom: 12px;

            border-radius: 11px;

            background: var(--primary-light);

            color: var(--primary);

            font-size: 16px;
        }

        .summary-label {
            color: var(--muted);

            font-size: 10px;
            font-weight: 600;
        }

        .summary-value {
            margin-top: 4px;

            font-size: 22px;
            font-weight: 800;
        }

        
        .card {
            position: relative;
            overflow: hidden;

            border: 1px solid var(--border);
            border-radius: 20px;

            background: white;

            box-shadow: var(--shadow-md);
        }

        .card-header {
            min-height: 78px;

            display: flex;
            align-items: center;
            justify-content: space-between;

            gap: 20px;

            padding: 17px 21px;

            border-bottom: 1px solid var(--border);
        }

        .card-title-wrap {
            display: flex;
            align-items: center;
            gap: 11px;
        }

        .card-icon {
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

        .card-title {
            font-size: 15px;
            font-weight: 800;
        }

        .card-subtitle {
            margin-top: 3px;

            color: var(--muted);

            font-size: 10px;
        }

        .total-badge {
            display: inline-flex;
            align-items: center;
            gap: 7px;

            padding: 8px 11px;

            border: 1px solid #d8e0f4;
            border-radius: 10px;

            background: #1d2c47;

            color: #a9c5ff;

            font-size: 10px;
            font-weight: 800;
        }

        
        .table-wrapper {
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;

            border-collapse: separate;
            border-spacing: 0;

            min-width: 760px;
        }

        thead th {
            padding: 15px 20px;

            background: #f8f9fc;

            border-bottom: 1px solid var(--border);

            color: #687182;

            text-align: left;

            font-size: 10px;
            font-weight: 800;

            text-transform: uppercase;
            letter-spacing: .4px;

            white-space: nowrap;
        }

        thead th:first-child {
            padding-left: 23px;
        }

        tbody td {
            padding: 16px 20px;

            border-bottom: 1px solid #edf0f4;

            color: #5f6878;

            font-size: 11px;
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

        .number {
            width: 60px;

            color: #8c94a3;

            font-size: 10px;
            font-weight: 700;

            text-align: center;
        }

        .student-cell {
            display: flex;
            align-items: center;
            gap: 11px;
        }

        .student-avatar {
            width: 38px;
            height: 38px;

            flex-shrink: 0;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 11px;

            background:
                linear-gradient(
                    135deg,
                    #eaf0ff,
                    #dce6ff
                );

            color: var(--primary);

            font-size: 12px;
            font-weight: 800;
        }

        .student-name {
            color: var(--text);

            font-size: 12px;
            font-weight: 800;
        }

        .student-label {
            margin-top: 3px;

            color: #9aa1ae;

            font-size: 9px;
        }

        .class-badge {
            display: inline-flex;
            align-items: center;

            padding: 6px 9px;

            border-radius: 8px;

            background: #f2f5fb;

            color: #5c6575;

            font-size: 10px;
            font-weight: 700;
        }

        .count-wrapper {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .count-badge {
            min-width: 32px;
            height: 32px;

            display: inline-flex;
            align-items: center;
            justify-content: center;

            border-radius: 10px;

            background: var(--primary-light);

            color: var(--primary);

            font-size: 11px;
            font-weight: 800;
        }

        .count-text {
            color: var(--muted);

            font-size: 9px;
        }

        .action-button {
            display: inline-flex;
            align-items: center;
            gap: 7px;

            padding: 8px 11px;

            border: 1px solid #d8e0f4;
            border-radius: 9px;

            background: white;

            color: var(--primary);

            font-size: 10px;
            font-weight: 800;

            transition: .2s ease;
        }

        .action-button:hover {
            background: var(--primary-light);

            border-color: #c8d5f2;

            transform: translateY(-1px);
        }

        
        .empty-state {
            padding: 65px 25px;

            text-align: center;
        }

        .empty-icon {
            width: 58px;
            height: 58px;

            display: flex;
            align-items: center;
            justify-content: center;

            margin: 0 auto 15px;

            border-radius: 17px;

            background: var(--primary-light);

            color: var(--primary);

            font-size: 24px;
        }

        .empty-title {
            color: var(--text);

            font-size: 14px;
            font-weight: 800;
        }

        .empty-description {
            max-width: 400px;

            margin: 7px auto 0;

            color: var(--muted);

            font-size: 10px;
            line-height: 1.6;
        }

        
        .table-footer {
            min-height: 65px;

            display: flex;
            align-items: center;
            justify-content: space-between;

            gap: 15px;

            padding: 12px 21px;

            border-top: 1px solid var(--border);

            background: #fcfcfd;
        }

        .pagination-info {
            color: var(--muted);

            font-size: 10px;
        }

        .pagination-info strong {
            color: var(--text);
        }

        .pagination {
            display: flex;
            align-items: center;
        }

        .pagination nav {
            display: flex;
        }

        .pagination svg {
            width: 13px;
            height: 13px;
        }

        .pagination a,
        .pagination span {
            min-width: 32px;
            height: 32px;

            display: inline-flex;
            align-items: center;
            justify-content: center;

            margin-left: 4px;

            border: 1px solid var(--border);
            border-radius: 8px;

            background: white;

            color: #697283;

            font-size: 10px;
        }

        .pagination span[aria-current="page"] {
            background: var(--primary);
            border-color: var(--primary);

            color: white;
        }

        .pagination a:hover {
            background: var(--primary-light);
            color: var(--primary);
        }

        
        @media (max-width: 1000px) {

            .sidebar {
                width: 235px;
            }

            .main {
                margin-left: 235px;
            }

            .summary-row {
                grid-template-columns: 1fr 1fr;
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
                padding: 0 20px;
            }

            .search-box {
                width: 300px;
            }

            .content {
                padding: 24px 20px;
            }
        }

        @media (max-width: 650px) {

            .header {
                height: auto;
                min-height: 70px;

                padding: 12px;

                gap: 10px;
            }

            .search-box {
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

            .profile-photo {
                width: 36px;
                height: 36px;
            }

            .content {
                padding: 18px 13px;
            }

            .page-title {
                font-size: 23px;
            }

            .summary-row {
                grid-template-columns: 1fr;
            }

            .card-header {
                align-items: flex-start;
            }

            .table-footer {
                flex-direction: column;
                align-items: flex-start;
            }
        }

        @media (max-width: 450px) {

            .sidebar {
                width: 66px;
            }

            .main {
                margin-left: 66px;
            }

            .brand-logo {
                width: 55px;
                height: 55px;
            }

            .content {
                padding: 15px 10px;
            }

            .card {
                border-radius: 16px;
            }

            .card-header {
                padding: 15px;
            }

            tbody td,
            thead th {
                padding-left: 14px;
                padding-right: 14px;
            }
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
input:focus,select:focus,textarea:focus,.form-control:focus,.filter-select:focus,.filter-date:focus{
  border-color:#8eabe0 !important;
  background:#fff !important;
  box-shadow:0 0 0 4px rgba(40,85,183,.075) !important;
  outline:none !important;
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

/* TOTAL BADGE - LIGHT MODE */
body:not(.dark-mode) .total-badge {
    background: #eef4ff !important;
    color: #2855b7 !important;
}

/* TOTAL BADGE - DARK MODE */
body.dark-mode .total-badge {
    background: #1d2c47 !important;
    color: #a9c5ff !important;
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
                    href="{{ route('konseling.index') }}" class="menu-item">
                    <span class="menu-icon"><i data-lucide="clipboard-list"></i></span>
                    Data Konseling
                </a>

                <a
                    href="{{ route('siswa.riwayat') }}" class="menu-item active">
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
                action="{{ route('siswa.riwayat') }}"
                method="GET"
                class="search-box"
            >
                <span class="search-icon">
                    <i data-lucide="search"></i>
                </span>

                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="Cari siswa atau data..."
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



            <div class="page-heading">

                <div>

                    <div class="eyebrow">
                        Monitoring Siswa
                    </div>

                    <h1 class="page-title">
                        Riwayat Siswa
                    </h1>

                    <p class="page-description">
                        Daftar siswa yang memiliki riwayat konseling
                        beserta jumlah sesi yang telah dilakukan.
                    </p>

                </div>

            </div>


            
            <div class="summary-row">


                <div class="summary-card">

                    <div class="summary-icon">
                        <i data-lucide="users-round"></i>
                    </div>

                    <div class="summary-label">
                        Siswa dengan Riwayat
                    </div>

                    <div class="summary-value">
                        {{ $siswa->total() }}
                    </div>

                </div>


                <div class="summary-card">

                    <div class="summary-icon">
                        <i data-lucide="users"></i>
                    </div>

                    <div class="summary-label">
                        Siswa di Halaman Ini
                    </div>

                    <div class="summary-value">
                        {{ $siswa->count() }}
                    </div>

                </div>


                <div class="summary-card">

                    <div class="summary-icon">
                        <i data-lucide="clipboard-list"></i>
                    </div>

                    <div class="summary-label">
                        Status Data
                    </div>

                    <div
                        class="summary-value"
                        style="font-size:17px; padding-top:4px;"
                    >
                        Aktif
                    </div>

                </div>


            </div>


            
            <div class="card">


                <div class="card-header">

                    <div class="card-title-wrap">

                        <div class="card-icon">
                            <i data-lucide="clipboard-list"></i>
                        </div>

                        <div>

                            <div class="card-title">
                                Daftar Riwayat Konseling
                            </div>

                            <div class="card-subtitle">
                                Pilih siswa untuk melihat detail riwayat
                                konseling.
                            </div>

                        </div>

                    </div>


                    <div class="total-badge">
                        <i data-lucide="users-round"></i>
                        {{ $siswa->total() }} Siswa
                    </div>

                </div>


                
                <div class="table-wrapper">

                    <table>

                        <thead>

                            <tr>

                                <th
                                    style="width:70px; text-align:center;"
                                >
                                    No
                                </th>

                                <th>
                                    Siswa
                                </th>

                                <th>
                                    Kelas
                                </th>

                                <th>
                                    Jumlah Konseling
                                </th>

                                <th
                                    style="text-align:center;"
                                >
                                    Aksi
                                </th>

                            </tr>

                        </thead>


                        <tbody>


                            @forelse ($siswa as $index => $item)


                                <tr>



                                    <td class="number">

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


                                            <div>

                                                <div class="student-name">
                                                    {{ $item->nama_siswa }}
                                                </div>

                                                <div class="student-label">
                                                    NIS:
                                                    {{ $item->nis ?? '-' }}
                                                </div>

                                            </div>


                                        </div>

                                    </td>


                                    
                                    <td>

                                        <span class="class-badge">

                                            <i data-lucide="graduation-cap"></i>

                                            {{ $item->kelas->nama_kelas ?? '-' }}

                                        </span>

                                    </td>



                                    <td>

                                        <div class="count-wrapper">

                                            <span class="count-badge">
                                                {{ $item->konseling_count }}
                                            </span>

                                            <span class="count-text">
                                                sesi
                                            </span>

                                        </div>

                                    </td>



                                    <td style="text-align:center;">

                                        <a
                                            href="{{ route('siswa.show', ['siswa' => $item->id_siswa, 'from' => 'riwayat']) }}"
                                            class="action-button"
                                        >

                                            Lihat Riwayat

                                            <span>
                                                <i data-lucide="arrow-right"></i>
                                            </span>

                                        </a>

                                    </td>


                                </tr>


                            @empty


                                <tr>

                                    <td
                                        colspan="5"
                                        style="padding:0;"
                                    >

                                        <div class="empty-state">

                                            <div class="empty-icon">
                                                <i data-lucide="history"></i>
                                            </div>

                                            <div class="empty-title">
                                                Belum Ada Riwayat Konseling
                                            </div>

                                            <div class="empty-description">
                                                Belum ada siswa yang memiliki
                                                catatan konseling di dalam sistem.
                                            </div>

                                        </div>

                                    </td>

                                </tr>


                            @endforelse


                        </tbody>

                    </table>

                </div>


                
                @if ($siswa->total() > 0)

                    <div class="table-footer">


                        <div class="pagination-info">

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


                        <div class="pagination">

                            {{ $siswa->links() }}

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
