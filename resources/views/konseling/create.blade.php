<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tambah Konseling - SIRASI-BK</title>

    @include('partials.theme')

    <style>
        * { margin:0; padding:0; box-sizing:border-box; }

        :root {
            --primary:#21479a;
            --primary-dark:#17377f;
            --primary-light:#eaf0ff;
            --sidebar:#21449a;
            --text:#12213f;
            --muted:#71809b;
            --line:#dfe6f2;
            --surface:#ffffff;
            --page:#f4f7fc;
        }

        body {
            font-family:
                Inter,
                "Segoe UI",
                Arial,
                sans-serif;
            background:var(--page);
            color:var(--text);
        }

        .dashboard { display:flex; min-height:100vh; }

        /*brand*/
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

            flex-shrink: 0;

            border-radius: 14px;

            background:
                linear-gradient(
                    145deg,
                    rgba(255,255,255,.20),
                    rgba(255,255,255,.08)
                );

            border: 1px solid rgba(255,255,255,.25);

            box-shadow:
                inset 0 1px 0 rgba(255,255,255,.20),
                0 9px 22px rgba(0,0,0,.12);

            overflow: hidden;
        }

        .brand-logo img {
            width: 42px;
            height: 42px;

            object-fit: contain;
        }

        .brand-name {
            font-size: 19px;
            font-weight: 800;
            letter-spacing: .1px;
        }

        .brand-subtitle {
            margin-top: 4px;

            color: #cbd8ff;

            font-size: 11px;
        }


        /*menu title*/
        .menu-title {
            padding: 4px 12px 10px;

            color: #9eb2e9;

            font-size: 10px;
            font-weight: 800;

            text-transform: uppercase;
            letter-spacing: 1px;
        }

        /*garis bawah hover*/
        .menu-item::after {
            content: "";

            position: absolute;

            left: 10px;
            right: 10px;
            bottom: 5px;

            height: 2px;

            border-radius: 999px;

            background:
                linear-gradient(
                    90deg,
                    transparent,
                    rgba(160,195,255,.75),
                    transparent
                );

            transform: scaleX(0);

            opacity: 0;

            transition: .22s ease;
        }


        /*hover*/
        .menu-item:hover {
            color: #fff;

            background:
                linear-gradient(
                    90deg,
                    rgba(255,255,255,.13),
                    rgba(255,255,255,.06)
                );

            border-color: rgba(255,255,255,.08);

            transform: translateX(2px);

            box-shadow:
                0 7px 18px rgba(6,28,75,.10);
        }

        .menu-item:hover::after {
            transform: scaleX(1);
            opacity: 1;
        }


        /*active*/
        .menu-item.active {
            color: #fff;

            background:
                linear-gradient(
                    90deg,
                    rgba(255,255,255,.17),
                    rgba(255,255,255,.07)
                );

            border-color: rgba(255,255,255,.12);

            box-shadow:
                inset 3px 0 0 #a7c3ff,
                0 9px 22px rgba(5,28,74,.13);
        }

        .menu-item.active::after {
            transform: scaleX(1);
            opacity: .9;
        }

        /*logout*/
        .sidebar-bottom {
            margin-top: auto;
            padding-top: 20px;
        }

        .logout-button {
            width: 100%;

            border: 1px solid transparent;

            background: transparent;

            cursor: pointer;
            text-align: left;
        }

        .logout-button:hover {
            color: #fff;

            background: rgba(255,255,255,.09);

            transform: translateX(2px);
        }

        /*main/header*/
        .main { flex:1; min-width:0; }

        .header {
            height:76px;
            background:rgba(255,255,255,.94);
            border-bottom:1px solid #e4e9f2;
            display:flex;
            align-items:center;
            justify-content:space-between;
            padding:0 32px;
            gap:24px;
        }

        .search {
            width:100%;
            max-width:430px;
            height:42px;
            border:1px solid #dbe3ef;
            border-radius:12px;
            background:#f9fbfe;
            display:flex;
            align-items:center;
            gap:9px;
            padding:0 13px;
        }

        .search span { color:#8b99af; display:flex; align-items:center; }
        .search span svg { width:16px; height:16px; }
        .search input { border:none; outline:none; width:100%; background:transparent; font-size:13px; color:var(--text); }
        .search input::placeholder { color:#9aa7bb; }

        .profile-area { display:flex; align-items:center; gap:18px; margin-left:auto; }

        .notification {
            position:relative;
            width:40px;
            height:40px;
            border:1px solid #dfe6f1;
            border-radius:11px;
            background:#fff;
            display:flex;
            align-items:center;
            justify-content:center;
            color:#3f5170;
            box-shadow:0 5px 16px rgba(29,56,105,.06);
        }

        .notification svg { width:17px; height:17px; }
        .notification-dot { position:absolute; top:8px; right:8px; width:5px; height:5px; border-radius:50%; background:#d65a65; border:1px solid #fff; }

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
            display:flex;
            align-items:center;
            gap:11px;
            padding-left:17px;
            border-left:1px solid #e1e6ef;
        }

        .profile-info { text-align:right; }
        .profile-name { font-size:13px; font-weight:800; color:#172542; }
        .profile-role { font-size:11px; color:#8490a5; margin-top:3px; }

        .profile-photo {
            width:40px;
            height:40px;
            border-radius:12px;
            background:#e8eeff;
            color:#254695;
            display:flex;
            align-items:center;
            justify-content:center;
        }
        .profile-photo svg {
            width:18px;
            height:18px;
        }

        .profile-photo img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 12px;
        }

                .content { padding:34px 32px 50px; }

        .page-heading { margin-bottom:25px; }
        .eyebrow { font-size:11px; font-weight:800; letter-spacing:.12em; text-transform:uppercase; color:#2850a7; margin-bottom:9px; }
        .page-title { font-size:29px; line-height:1.15; letter-spacing:-.7px; color:#0f1f3c; margin-bottom:7px; }
        .page-description { color:#74829a; font-size:13px; line-height:1.6; }

        .form-layout { display:grid; grid-template-columns:minmax(0,1fr) 350px; gap:22px; align-items:start; }

        /*form card*/
        .form-card {
            background:var(--surface);
            border:1px solid #dfe6f1;
            border-radius:18px;
            overflow:hidden;
            box-shadow:0 16px 40px rgba(28,55,103,.07);
        }

        .form-card::before { content:""; display:block; height:3px; background:linear-gradient(90deg,#315bc0,#8caeff); }

        .form-card-heading {
            display:flex;
            align-items:center;
            gap:12px;
            padding:18px 22px;
            border-bottom:1px solid #e5eaf2;
        }

        .form-card-heading-icon {
            width:38px;
            height:38px;
            border-radius:11px;
            background:#eaf0ff;
            color:#2850a7;
            display:flex;
            align-items:center;
            justify-content:center;
            flex-shrink:0;
        }

        .form-card-heading-icon svg { width:17px; height:17px; }
        .form-card-heading-title { font-size:14px; font-weight:800; color:#172846; }
        .form-card-heading-text { margin-top:3px; font-size:10px; color:#8a96aa; }
        .form-card > form { padding:20px 22px 22px; }

        .form-grid { display:grid; grid-template-columns:1fr 1fr; gap:19px 16px; }
        .form-group { display:flex; flex-direction:column; }
        .full { grid-column:1 / -1; }

        label { font-size:12px; color:#253552; margin-bottom:8px; font-weight:800; }
        .required { color:#e0525d; }
        .optional { float:right; color:#95a0b3; font-size:11px; font-weight:400; }

        .form-control {
            width:100%;
            min-height:44px;
            border:1px solid #d8e0ec;
            border-radius:11px;
            background:#fbfcfe;
            padding:10px 13px;
            font-size:13px;
            color:#17243d;
            outline:none;
            transition:border-color .2s ease,box-shadow .2s ease,background .2s ease;
        }

        select.form-control { cursor:pointer; }
        textarea.form-control { min-height:125px; resize:vertical; line-height:1.55; }
        .form-control:focus { border-color:#5277c7; background:#fff; box-shadow:0 0 0 4px rgba(70,105,183,.10); }

        .form-divider { border:0; border-top:1px solid #e5eaf2; margin:22px 0 17px; }
        .form-actions { display:flex; justify-content:flex-end; gap:10px; }

        .btn {
            min-height:42px;
            padding:0 17px;
            border-radius:11px;
            border:1px solid #d8e0ec;
            background:#fff;
            color:#243552;
            text-decoration:none;
            display:inline-flex;
            align-items:center;
            justify-content:center;
            gap:7px;
            font-size:12px;
            font-weight:800;
            cursor:pointer;
            transition:transform .2s ease,box-shadow .2s ease,background .2s ease;
        }

        .btn:hover { transform:translateY(-1px); box-shadow:0 7px 16px rgba(30,55,100,.08); }
        .btn-primary { background:#21499f; border-color:#21499f; color:#fff; box-shadow:0 8px 18px rgba(33,73,154,.20); }
        .btn-primary:hover { background:#193d8a; }

        /*student preview*/
        .student-preview {
            position:relative;
            background:#fff;
            border:1px solid #dfe6f1;
            border-radius:18px;
            overflow:hidden;
            box-shadow:0 16px 40px rgba(28,55,103,.07);
        }

        .preview-cover {
            position:relative;
            height:92px;
            background:linear-gradient(135deg,#e7edff 0%,#dbe5ff 100%);
            overflow:hidden;
        }

        .preview-cover::before,
        .preview-cover::after {
            content:"";
            position:absolute;
            border:20px solid rgba(255,255,255,.30);
            border-radius:50%;
        }
        .preview-cover::before { width:150px; height:150px; right:-55px; top:-105px; }
        .preview-cover::after { width:95px; height:95px; right:55px; top:-60px; }

        .preview-body { padding:0 18px 19px; text-align:center; }
        .preview-avatar {
            width:64px;
            height:64px;
            margin:-22px auto 13px;
            border-radius:16px;
            background:#e8eeff;
            border:5px solid #fff;
            color:#23499b;
            display:flex;
            align-items:center;
            justify-content:center;
            font-size:21px;
            font-weight:800;
            position:relative;
            box-shadow:0 9px 22px rgba(31,62,121,.14);
        }

        .preview-name { font-size:18px; font-weight:800; color:#162540; margin-bottom:6px; }
        .preview-detail { color:#7b879c; font-size:11px; }
        .preview-divider { border:0; border-top:1px solid #e3e8f0; margin:18px 0; }

        .preview-info { display:flex; justify-content:space-between; text-align:left; margin-bottom:17px; gap:12px; }
        .preview-info-item { width:50%; }
        .preview-label { display:block; font-size:10px; text-transform:uppercase; letter-spacing:.05em; color:#96a0b1; margin-bottom:6px; font-weight:800; }
        .preview-value { font-size:13px; font-weight:700; color:#253552; }
        .active-badge { display:inline-flex; align-items:center; padding:5px 9px; border-radius:999px; background:#eaf8f0; color:#16834a; font-size:10px; font-weight:800; }

        .history-link {
            display:flex;
            align-items:center;
            justify-content:center;
            width:100%;
            height:40px;
            border:1px solid #ccd8f0;
            border-radius:11px;
            background:#f6f8ff;
            color:#24499c;
            text-decoration:none;
            font-size:11px;
            font-weight:800;
        }
        .history-link:hover { background:#edf2ff; }

        .preview-note {
            margin-top:13px;
            padding:12px 14px;
            border:1px dashed #d7dfeb;
            border-radius:12px;
            background:#fafbfd;
            text-align:left;
            color:#8490a4;
            font-size:10px;
            line-height:1.5;
        }

        /*error*/
        .error-box {
            background:#fff3f3;
            border:1px solid #f0c2c5;
            color:#a71919;
            border-radius:12px;
            padding:13px 15px;
            margin-bottom:20px;
            font-size:12px;
        }

        /*responsive*/
        @media (max-width:1050px) {
            .sidebar { width:250px; }
            .form-layout { grid-template-columns:1fr; }
            .student-preview { max-width:100%; }
        }

        @media (max-width:750px) {
            .sidebar { width:80px; padding:20px 10px; }
            .brand-name,.brand-subtitle,.menu-item span:not(.menu-icon) { display:none; }
            .brand { justify-content:center; padding-left:0; padding-right:0; }
            .menu-item { justify-content:center; padding:0; }
            .menu-item.active { padding-left:0; }
            .menu-item.active::before { display:none; }
            .header { padding:0 15px; }
            .profile-info { display:none; }
            .profile { padding-left:12px; }
            .content { padding:25px 15px; }
            .form-grid { grid-template-columns:1fr; }
            .full { grid-column:auto; }
            .form-actions { flex-direction:column-reverse; }
            .form-actions .btn { width:100%; }
        }

        /*dark mode*/
        html.dark-mode body,
        body.dark-mode {
            background: #0f1728 !important;
            color: #edf3ff !important;
        }

        body.dark-mode .header {
            background: #172238 !important;
            border-bottom-color: #293752 !important;
        }

        body.dark-mode .search {
            background: #141f33 !important;
            border-color: #334463 !important;
        }

        body.dark-mode .search input {
            color: #edf3ff !important;
        }

        body.dark-mode .search input::placeholder {
            color: #8190aa !important;
        }

        body.dark-mode .notification {
            background: #172238 !important;
            border-color: #334463 !important;
            color: #cbd7ed !important;
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

        body.dark-mode .page-title {
            color: #edf3ff !important;
        }

        body.dark-mode .page-description {
            color: #9aa8c0 !important;
        }

        body.dark-mode .eyebrow {
            color: #8fb0ff !important;
        }

        /*form card*/
        body.dark-mode .form-card {
            background: #172238 !important;
            border-color: #293752 !important;
            box-shadow: 0 16px 40px rgba(0,0,0,.22) !important;
        }

        body.dark-mode .form-card-heading {
            border-bottom-color: #293752 !important;
        }

        body.dark-mode .form-card-heading-icon {
            background: #1d2c47 !important;
            color: #a9c5ff !important;
        }

        body.dark-mode .form-card-heading-title {
            color: #edf3ff !important;
        }

        body.dark-mode .form-card-heading-text {
            color: #9aa8c0 !important;
        }

        body.dark-mode label {
            color: #d5deee !important;
        }

        body.dark-mode .optional {
            color: #8998b0 !important;
        }

        /*input/select/textarea*/
        body.dark-mode .form-control {
            background: #141f33 !important;
            border-color: #334463 !important;
            color: #edf3ff !important;
        }

        body.dark-mode .form-control::placeholder {
            color: #8190aa !important;
        }

        body.dark-mode .form-control:focus {
            background: #172238 !important;
            border-color: #5277c7 !important;
            color: #edf3ff !important;
            box-shadow: 0 0 0 4px rgba(82,119,199,.15) !important;
        }

        body.dark-mode select.form-control option {
            background: #172238 !important;
            color: #edf3ff !important;
        }

        body.dark-mode .form-divider {
            border-top-color: #293752 !important;
        }

        /*student preview*/
        body.dark-mode .student-preview {
            background: #172238 !important;
            border-color: #293752 !important;
            box-shadow: 0 16px 40px rgba(0,0,0,.22) !important;
        }

        body.dark-mode .preview-cover {
            background: linear-gradient(135deg,#243b70 0%,#1d315d 100%) !important;
        }

        body.dark-mode .preview-avatar {
            background: #1d2c47 !important;
            border-color: #172238 !important;
            color: #a9c5ff !important;
        }

        body.dark-mode .preview-name {
            color: #edf3ff !important;
        }

        body.dark-mode .preview-detail {
            color: #9aa8c0 !important;
        }

        body.dark-mode .preview-divider {
            border-top-color: #293752 !important;
        }

        body.dark-mode .preview-label {
            color: #8998b0 !important;
        }

        body.dark-mode .preview-value {
            color: #d5deee !important;
        }

        body.dark-mode .active-badge {
            background: #193a2a !important;
            color: #75d6a0 !important;
        }

        body.dark-mode .history-link {
            background: #1d2c47 !important;
            border-color: #334463 !important;
            color: #a9c5ff !important;
        }

        body.dark-mode .history-link:hover {
            background: #243657 !important;
        }

        body.dark-mode .preview-note {
            background: #141f33 !important;
            border-color: #334463 !important;
            color: #8998b0 !important;
        }

        /*error*/
        body.dark-mode .error-box {
            background: #3a2025 !important;
            border-color: #63343c !important;
            color: #ff9da8 !important;
        }

        /*button*/
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

        @media (min-width: 901px) {

            /*main*/
            .main {
                margin-left: 270px !important;
                width: calc(100% - 270px) !important;
                min-width: 0 !important;
            }

            /*header*/
            .header {
                height: 76px !important;
                min-height: 76px !important;
                padding: 0 32px !important;
                gap: 24px !important;
                background: rgba(255,255,255,.94) !important;
            }

            .search {
                max-width: 430px !important;
                height: 42px !important;
                border-radius: 12px !important;
            }

            .search span svg {
                width: 16px !important;
                height: 16px !important;
            }

            .profile-area {
                gap: 18px !important;
            }

            .notification {
                width: 40px !important;
                height: 40px !important;
                border-radius: 11px !important;
            }

            .notification svg {
                width: 17px !important;
                height: 17px !important;
            }

            .profile {
                gap: 11px !important;
                padding-left: 17px !important;
            }

            .profile-name {
                font-size: 13px !important;
                font-weight: 800 !important;
            }

            .profile-role {
                font-size: 11px !important;
                margin-top: 3px !important;
            }

            .profile-photo {
                width: 40px !important;
                height: 40px !important;
                border-radius: 12px !important;
            }

            .profile-photo svg {
                width: 18px !important;
                height: 18px !important;
            }

            /*content*/
            .content {
                padding: 34px 32px 50px !important;
            }

            .page-heading {
                margin-bottom: 25px !important;
            }

            .eyebrow {
                font-size: 11px !important;
                margin-bottom: 9px !important;
                letter-spacing: .12em !important;
            }

            .page-title {
                font-size: 29px !important;
                line-height: 1.15 !important;
                letter-spacing: -.7px !important;
                margin-bottom: 7px !important;
            }

            .page-description {
                font-size: 13px !important;
                line-height: 1.6 !important;
            }

            /*form+preview*/
            .form-layout {
                grid-template-columns: minmax(0,1fr) 350px !important;
                gap: 22px !important;
            }

            .form-card,
            .student-preview {
                border-radius: 18px !important;
            }

            .form-card-heading {
                padding: 18px 22px !important;
            }

            .form-card-heading-icon {
                width: 38px !important;
                height: 38px !important;
                border-radius: 11px !important;
            }

            .form-card-heading-icon svg {
                width: 17px !important;
                height: 17px !important;
            }

            .form-card > form {
                padding: 20px 22px 22px !important;
            }

            .form-control {
                min-height: 44px !important;
                border-radius: 11px !important;
            }

            .student-preview {
                border-radius: 18px !important;
            }

            .preview-avatar {
                width: 64px !important;
                height: 64px !important;
                border-radius: 16px !important;
            }

            .preview-name {
                font-size: 18px !important;
            }

            .history-link {
                height: 40px !important;
                border-radius: 11px !important;
            }
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
            text-decoration: none;

            font-size: 13.5px;
            font-weight: 700;

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

        .sidebar-logout {
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

        /*responsive*/
        @media (max-width: 1050px) {
            .sidebar {
                width: 250px !important;
            }

            .main {
                margin-left: 250px !important;
                width: calc(100% - 250px) !important;
            }

            .form-layout {
                grid-template-columns: 1fr;
            }

            .student-preview {
                max-width: 100%;
            }
        }

        @media (max-width: 750px) {
            .sidebar {
                width: 80px !important;
                padding: 20px 10px !important;
            }

            .main {
                margin-left: 80px !important;
                width: calc(100% - 80px) !important;
            }

            .brand-name,
            .brand-subtitle,
            .menu-item span:not(.menu-icon) {
                display: none !important;
            }

            .brand {
                justify-content: center !important;
                padding-left: 0 !important;
                padding-right: 0 !important;
            }

            .menu-item {
                justify-content: center !important;
                padding: 0 !important;
            }

            .menu-item.active {
                padding-left: 0 !important;
            }

            .menu-item.active::before {
                display: none !important;
            }

            .header {
                padding: 0 15px !important;
            }

            .profile-info {
                display: none !important;
            }

            .profile {
                padding-left: 12px !important;
            }

            .content {
                padding: 25px 15px !important;
            }

            .form-grid {
                grid-template-columns: 1fr !important;
            }

            .full {
                grid-column: auto !important;
            }

            .form-actions {
                flex-direction: column-reverse !important;
            }

            .form-actions .btn {
                width: 100% !important;
            }
        }

    </style>

</head>


<body>


<div class="dashboard">


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

                <div class="sidebar-logout">

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


            <div class="search">

                <span>
                    <i data-lucide="search"></i>
                </span>


                <input
                    type="text"
                    placeholder="Cari data..."
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
                            <i data-lucide="user-round"></i>
                        @endif
                    </div>

                </div>


            </div>


        </header>


                <section class="content">


            <div class="page-heading">
                <div class="eyebrow">
                    Data Konseling
                </div>
                <h1 class="page-title">
                    Tambah Catatan Konseling
                </h1>


                <p class="page-description">
                    Dokumentasikan sesi bimbingan dan tindak lanjut siswa secara terstruktur.
                </p>
            </div>


            @if ($errors->any())


                <div class="error-box">


                    <strong>
                        Periksa kembali data yang dimasukkan:
                    </strong>


                    <ul
                        style="
                            margin:8px 0 0 18px;
                        "
                    >

                        @foreach ($errors->all() as $error)

                            <li>
                                {{ $error }}
                            </li>

                        @endforeach

                    </ul>


                </div>


            @endif


            <div class="form-layout">


                <div class="form-card">

                    <div class="form-card-heading">
                        <div class="form-card-heading-icon">
                            <i data-lucide="clipboard-list"></i>
                        </div>
                        <div>
                            <div class="form-card-heading-title">Informasi Konseling</div>
                            <div class="form-card-heading-text">Lengkapi informasi sesi konseling siswa.</div>
                        </div>
                    </div>

                    <form
                        action="{{ route('konseling.store') }}"
                        method="POST"
                    >

                        @csrf

                        <div class="form-grid">

                            
                            <div class="form-group">

                                <label for="id_siswa">
                                    Pilih Siswa
                                    <span class="required">
                                        *
                                    </span>
                                </label>

                                <select
                                    name="id_siswa"
                                    id="id_siswa"
                                    class="form-control"
                                    required
                                    onchange="updateStudentPreview()"
                                >

                                    <option value="">
                                        Pilih siswa
                                    </option>

                                    @foreach ($siswa as $item)

                                        <option
                                            value="{{ $item->id_siswa }}"
                                            data-nama="{{ $item->nama_siswa }}"
                                            data-kelas="{{ $item->kelas->nama_kelas ?? '-' }}"
                                            data-nis="{{ $item->nis ?? '-' }}"
                                            {{ old('id_siswa') == $item->id_siswa ? 'selected' : '' }}
                                        >

                                            {{ $item->nama_siswa }}

                                            ({{ $item->kelas->nama_kelas ?? '-' }})

                                        </option>

                                    @endforeach

                                </select>

                            </div>

                                                        <div class="form-group">

                                <label for="tanggal">

                                    Tanggal Sesi

                                    <span class="required">
                                        *
                                    </span>

                                </label>

                                <input
                                    type="date"
                                    name="tanggal"
                                    id="tanggal"
                                    class="form-control"
                                    value="{{ old('tanggal', date('Y-m-d')) }}"
                                    required
                                >

                            </div>

                                                        <div class="form-group">

                                <label for="status">
                                    Status
                                    <span class="required">
                                        *
                                    </span>
                                </label>

                                <select
                                    name="status"
                                    id="status"
                                    class="form-control"
                                    required
                                >

                                    <option value="">
                                        Pilih status
                                    </option>

                                    <option
                                        value="Proses"
                                        {{ old('status') == 'Proses' ? 'selected' : '' }}
                                    >
                                        Proses
                                    </option>

                                    <option
                                        value="Selesai"
                                        {{ old('status') == 'Selesai' ? 'selected' : '' }}
                                    >
                                        Selesai
                                    </option>

                                </select>

                                @error('status')
                                    <div style="
                                        color:#d71920;
                                        font-size:12px;
                                        margin-top:5px;
                                    ">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>

                                                        <div class="form-group full">

                                <label for="id_jenis">
                                    Jenis Masalah
                                    <span class="required">
                                        *
                                    </span>
                                </label>

                                <select
                                    name="id_jenis"
                                    id="id_jenis"
                                    class="form-control"
                                    required
                                >

                                    <option value="">
                                        Pilih jenis masalah
                                    </option>

                                    @foreach ($jenisMasalah as $jenis)

                                        <option
                                            value="{{ $jenis->id_jenis }}"
                                            {{ old('id_jenis') == $jenis->id_jenis ? 'selected' : '' }}
                                        >
                                            {{ $jenis->nama_jenis }}
                                        </option>

                                    @endforeach

                                </select>

                            </div>


                            <div class="form-group full">

                                <label for="masalah">
                                    Masalah yang Dihadapi
                                    <span class="required">
                                        *
                                    </span>
                                </label>

                                <textarea
                                    name="masalah"
                                    id="masalah"
                                    class="form-control"
                                    placeholder="Deskripsikan secara objektif permasalahan yang disampaikan oleh siswa..."
                                    required
                                >{{ old('masalah') }}</textarea>

                            </div>

                            <div class="form-group full">

                                <label for="hasil_konseling">
                                    Hasil Konseling
                                    <span class="required">
                                        *
                                    </span>
                                </label>

                                <textarea
                                    name="hasil_konseling"
                                    id="hasil_konseling"
                                    class="form-control"
                                    placeholder="Tuliskan hasil konseling yang diperoleh dari sesi ini..."
                                    required
                                >{{ old('hasil_konseling') }}</textarea>

                            </div>

                                                        <div class="form-group full">

                                <label for="catatan">
                                    Catatan Tambahan Internal
                                    <span class="optional">
                                        Opsional
                                    </span>
                                </label>

                                <textarea
                                    name="catatan"
                                    id="catatan"
                                    class="form-control"
                                    style="min-height:90px;"
                                    placeholder="Catatan pribadi konselor..."
                                >{{ old('catatan') }}</textarea>

                            </div>

                        </div>

                        <hr class="form-divider">

                        <div class="form-actions">

                            <a
                                href="{{ route('konseling.index') }}"
                                class="btn"
                            >
                                Batal
                            </a>

                            <button
                                type="submit"
                                class="btn btn-primary"
                            >
                                Simpan Catatan
                            </button>

                        </div>

                    </form>

                </div>

                <div>

                    <div class="student-preview">

                        <div class="preview-cover"></div>

                        <div class="preview-body">

                            <div
                                class="preview-avatar"
                                id="previewAvatar"
                            >
                                S
                            </div>

                            <div
                                class="preview-name"
                                id="previewName"
                            >
                                Pilih Siswa
                            </div>

                            <div
                                class="preview-detail"
                                id="previewDetail"
                            >
                                Kelas - • NIS: -
                            </div>

                            <hr class="preview-divider">

                            <div class="preview-info">

                                <div class="preview-info-item">

                                    <span class="preview-label">
                                        Status
                                    </span>

                                    <span class="active-badge">
                                        ● Aktif
                                    </span>

                                </div>

                                <div class="preview-info-item">

                                    <span class="preview-label">
                                        Riwayat Sesi
                                    </span>

                                    <span
                                        class="preview-value"
                                        id="previewHistory"
                                    >
                                        -
                                    </span>

                                </div>

                            </div>

                            <a
                                href="#"
                                id="historyLink"
                                class="history-link"
                            >
                                ◉ &nbsp; Lihat Riwayat Siswa
                            </a>

                        </div>

                    </div>

                    <div class="preview-note">
                        ⓘ

                        Catatan tersimpan akan masuk ke profil
                        riwayat siswa.
                    </div>

                </div>

            </div>

        </section>

    </main>

</div>

<script src="https://unpkg.com/lucide@latest"></script>

<script>

    lucide.createIcons();

    function updateStudentPreview() {

        const select =
            document.getElementById('id_siswa');

        const option =
            select.options[select.selectedIndex];

        const name =
            option.getAttribute('data-nama')
            || 'Pilih Siswa';

        const kelas =
            option.getAttribute('data-kelas')
            || '-';

        const nis =
            option.getAttribute('data-nis')
            || '-';

        document.getElementById(
            'previewName'
        ).textContent = name;

        document.getElementById(
            'previewDetail'
        ).textContent =
            'Kelas ' + kelas + ' • NIS: ' + nis;

        const initials =
            name !== 'Pilih Siswa'
                ? name.substring(0, 2).toUpperCase()
                : 'S';

        document.getElementById(
            'previewAvatar'
        ).textContent = initials;

        if (option.value) {

            const historyUrl =
                "{{ route('siswa.show', ':id') }}";

            document.getElementById(
                'historyLink'
            ).href =
                historyUrl.replace(
                    ':id',
                    option.value
                );

        } else {

            document.getElementById(
                'historyLink'
            ).href = '#';

        }

    }

    document.addEventListener(
        'DOMContentLoaded',
        function () {

            updateStudentPreview();
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

        }
    );

</script>

</body>

</html>
