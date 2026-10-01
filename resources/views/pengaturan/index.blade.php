<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Pengaturan - SIRASI-BK</title>

    <script src="https://unpkg.com/lucide@latest"></script>

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

            display: flex;
            align-items: center;
            gap: 13px;

            border: 1px solid transparent;
            border-radius: 12px;

            background: transparent;

            color: #d2dcfa;

            cursor: pointer;
            text-align: left;

            padding: 0 14px;

            font-family: inherit;
            font-size: 13.5px;
            font-weight: 700;

            transition:
                background .2s ease,
                color .2s ease,
                transform .2s ease,
                border-color .2s ease;
        }


        /* ICON LOGOUT */

        .sidebar-logout button .menu-icon {
            width: 25px;
            height: 25px;

            display: flex;
            align-items: center;
            justify-content: center;

            flex-shrink: 0;

            border-radius: 8px;

            background: rgba(255,255,255,.07);

            font-size: 14px;

            transition:
                background .2s ease,
                box-shadow .2s ease;
        }


        /* HOVER LOGOUT */

        .sidebar-logout button:hover {
            background: rgba(255,255,255,.09);

            border-color:
                rgba(255,255,255,.08);

            color: white;

            transform: translateX(2px);
        }


        .sidebar-logout button:hover .menu-icon {
            background:
                rgba(255,255,255,.15);

            box-shadow:
                inset 0 0 0 1px
                rgba(255,255,255,.05);
        }


        /* CLICK */

        .sidebar-logout button:active {
            background:
                rgba(151,190,255,.20);

            transform:
                translateX(1px) scale(.995);
        }


        /* FOCUS */

        .sidebar-logout button:focus-visible {
            outline:
                3px solid
                rgba(157,185,255,.28);

            outline-offset: 2px;
        }


        /* RESPONSIVE */


                .theme-choice { position: relative; cursor: pointer; transition: .2s ease; }
        .theme-choice:hover { transform: translateY(-1px); border-color: #a9bee7; box-shadow: 0 8px 18px rgba(40,85,183,.07); }
        .theme-choice.active { border-color: #4d73c8; background: linear-gradient(135deg, #f5f8ff 0%, #edf3ff 100%); box-shadow: 0 0 0 3px rgba(49,95,196,.08); }
        .theme-choice.active::after { content: '✓'; width: 22px; height: 22px; display: flex; align-items: center; justify-content: center; position: absolute; top: 13px; right: 13px; border-radius: 50%; background: #315fc4; color: #fff; font-size: 12px; font-weight: 800; }
        .theme-current { margin: 14px 0 0; padding: 10px 12px; border: 1px dashed #d5dfef; border-radius: 11px; background: #f8faff; color: #667693; font-size: 10.5px; line-height: 1.5; }
        .theme-current strong { color: #294d9d; }

                body.dark-mode { --bg:#0f1728; --white:#172238; --text:#edf3ff; --muted:#9aa8c0; --border:#293752; background:radial-gradient(circle at 90% 0%,rgba(67,105,190,.16),transparent 30%),#0f1728; color:#edf3ff; }
        body.dark-mode .main { background:#0f1728; }
        body.dark-mode .topbar { background:rgba(19,30,50,.96) !important; border-bottom-color:#2a3852 !important; }
        body.dark-mode .bell { background:#18253c !important; border-color:#334463 !important; color:#9fc0ff !important; }
        body.dark-mode .profile-name, body.dark-mode .page-title, body.dark-mode .option-title, body.dark-mode .application-name, body.dark-mode .modal-title, body.dark-mode .settings-info-item-title, body.dark-mode .app-about-title { color:#f1f5ff !important; }
        body.dark-mode .profile-role, body.dark-mode .page-subtitle, body.dark-mode .profile-username, body.dark-mode .profile-label, body.dark-mode .option-description, body.dark-mode .application-version, body.dark-mode .settings-info-item-text, body.dark-mode .settings-modal-intro, body.dark-mode .app-about-description, body.dark-mode .theme-current { color:#9eacc4 !important; }
        body.dark-mode .profile-card, body.dark-mode .option-card, body.dark-mode .application-card { background:linear-gradient(145deg,#18253b 0%,#141f33 100%) !important; border-color:#2c3b57 !important; box-shadow:0 15px 35px rgba(0,0,0,.18) !important; }
        body.dark-mode .profile-card:hover, body.dark-mode .option-card:hover { border-color:#5478c8 !important; box-shadow:0 16px 32px rgba(0,0,0,.24) !important; }
        body.dark-mode .profile-avatar { background:#1b2942 !important; border-color:#18253b !important; color:#a9c5ff !important; }
        body.dark-mode .profile-row { border-top-color:#30405b !important; }
        body.dark-mode .role { color: #a9c5ff !important; background: #1d2c47 !important; border-color: #334463 !important; }
        body.dark-mode .arrow,
        body.dark-mode .settings-layout .arrow {
            background: #1d2c47 !important;
            border: 1px solid #334463 !important;
            color: #9fc0ff !important;
        }
        body.dark-mode .option-card:hover .arrow,
        body.dark-mode .settings-layout .option-card:hover .arrow {
            background: #25395e !important;
            border-color: #5d83d5 !important;
            color: #ffffff !important;
        }
        body.dark-mode .logout-btn { background:#211d28 !important; border-color:#d96876 !important; color:#ff9ba5 !important; }
        body.dark-mode .logout-btn:hover { background:#30202a !important; }
        body.dark-mode .theme-choice { background:linear-gradient(145deg,#1a2940 0%,#162238 100%) !important; border-color:#30405b !important; }
        body.dark-mode .theme-choice.active { background:linear-gradient(135deg,#20365d 0%,#1a2c4c 100%) !important; border-color:#5d83d5 !important; box-shadow:0 0 0 3px rgba(93,131,213,.12); }
        body.dark-mode .theme-current { background:#162238 !important; border-color:#354560 !important; }
        body.dark-mode .theme-current strong { color:#b4ccff !important; }
        body.dark-mode .modal-card { background:linear-gradient(145deg,#18253b 0%,#121d30 100%) !important; border-color:#34445f !important; box-shadow:0 30px 80px rgba(0,0,0,.48) !important; }
        body.dark-mode .modal-header { background:linear-gradient(180deg,#1c2a42,#17243a) !important; border-bottom-color:#30405a !important; }
        body.dark-mode .modal-close { color:#9ba9bf !important; }
        body.dark-mode .modal-close:hover { background:#253550 !important; border-color:#3b4d6b !important; color:#fff !important; }
        body.dark-mode .modal-footer { background:rgba(20,31,49,.9) !important; border-top-color:#30405a !important; }
        body.dark-mode .form-group label { color:#b8c4d8 !important; }
        body.dark-mode .form-group input { background:#111c2e !important; border-color:#344560 !important; color:#edf3ff !important; }
        body.dark-mode .form-group input:hover, body.dark-mode .form-group input:focus { background:#142137 !important; border-color:#6286d1 !important; }
        body.dark-mode .modal-btn { background:#1b2940 !important; border-color:#394a65 !important; color:#c4cee0 !important; }
        body.dark-mode .modal-btn:hover { background:#243550 !important; border-color:#4b5e7c !important; }
        body.dark-mode .settings-info-item { background:linear-gradient(135deg,#1a2940 0%,#162238 100%) !important; border-color:#30405b !important; }
        body.dark-mode .settings-info-item-icon, body.dark-mode .app-about-icon { background:#20385f !important; border-color:#3a5684 !important; color:#a9c8ff !important; }
        body.dark-mode .app-about-version { background:#1b3155 !important; border-color:#385583 !important; color:#abc5ff !important; }
        body.responsive-disabled .settings-main,
        body.responsive-disabled .main-content {
            min-width: 1100px;
        }

        body.responsive-disabled .settings-layout {
            min-width: 1000px;
        }

        .responsive-choice {
            position: relative;
            cursor: pointer;
            padding-right: 58px !important;
        }

        .responsive-choice .responsive-toggle {
            position: absolute;
            top: 50%;
            right: 18px;
            width: 38px;
            height: 22px;
            border-radius: 999px;
            background: #cbd5e5;
            transform: translateY(-50%);
            transition: .2s ease;
        }

        .responsive-choice .responsive-toggle::after {
            content: '';
            position: absolute;
            top: 3px;
            left: 3px;
            width: 16px;
            height: 16px;
            border-radius: 50%;
            background: #fff;
            box-shadow: 0 2px 5px rgba(20,45,90,.18);
            transition: .2s ease;
        }

        .responsive-choice.active .responsive-toggle {
            background: #315fc4;
        }

        .responsive-choice.active .responsive-toggle::after {
            transform: translateX(16px);
        }

        body.dark-mode .responsive-choice .responsive-toggle {
            background: #43536e;
        }

        body.dark-mode .responsive-choice.active .responsive-toggle {
            background: #5d83d5;
        }

        @media (max-width: 760px) {

            .sidebar-logout button {
                justify-content: center;
                padding: 0;
            }

        }


        .main {

            min-height: 100vh;

            margin-left: 270px;

        }



        .topbar {

            height: 76px;

            display: flex;

            align-items: center;

            justify-content: flex-end;

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


        .button-row {

            display: flex;

            justify-content: flex-end;

            margin-top: 20px;

        }


        .show-button {

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


        .show-button:hover {

            transform:
                translateY(-1px);

            box-shadow:
                0 10px 20px
                rgba(23,60,145,.21);

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

            padding:
                5px 9px;

            border-radius: 7px;

            font-size: 8.5px;

            font-weight: 800;

        }


        .status-selesai {

            color:
                #16834a;

            background:
                #eaf8f0;

        }


        .status-proses {

            color:
                #b77908;

            background:
                #fff7df;

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





        .settings-layout {
            display: grid;

            grid-template-columns: 335px 1fr;

            gap: 24px;

            align-items: start;
        }



        .profile-card {
            background: white;

            border: 1px solid #cfd2dc;

            border-radius: 8px;

            overflow: hidden;
        }

        .profile-cover {
            height: 65px;

            background: linear-gradient(
                90deg,
                #29438f,
                #5369b4
            );
        }

        .profile-body {
            padding: 0 24px 22px;

            text-align: center;
        }

        .profile-avatar {
            width: 95px;
            height: 95px;

            margin: -24px auto 15px;

            background: #f5f5f5;

            border: 5px solid white;

            border-radius: 14px;

            display: flex;
            align-items: center;
            justify-content: center;

            color: #29438f;

            font-size: 28px;
            font-weight: 700;
        }

        .profile-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 10px;
        }

        .profile-username {
            color: #666;
            font-size: 13px;

            margin-bottom: 20px;
        }

        .profile-row {
            border-top: 1px solid #ddd;

            padding: 13px 0;

            display: flex;
            justify-content: space-between;
            align-items: center;

            font-size: 13px;
        }

        .profile-label {
            color: #666;
        }

        .profile-value {
            font-weight: 600;
        }

        .role {
            color: #173c91;
        }



        .options {
            display: grid;

            grid-template-columns: 1fr 1fr;

            gap: 16px;
        }

        .option-card {
            background: white;

            border: 1px solid #cfd2dc;

            border-radius: 8px;

            padding: 17px;

            min-height: 118px;

            display: flex;

            align-items: flex-start;

            gap: 15px;

            cursor: pointer;

            transition: .15s;
        }

        .option-card:hover {
            border-color: #29438f;

            box-shadow:
                0 2px 8px rgba(0, 0, 0, .05);
        }

        .option-icon {
            width: 43px;
            height: 43px;

            flex-shrink: 0;

            background: #eef1ff;

            color: #173c91;

            border-radius: 5px;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 19px;
        }

        .option-content {
            flex: 1;
        }

        .option-title {
            font-size: 14px;
            font-weight: 600;

            margin-bottom: 7px;
        }

        .option-description {
            color: #555;

            font-size: 13px;

            line-height: 1.45;
        }

        .arrow {
            color: #aaa;

            font-size: 22px;

            margin-top: 5px;
        }



        .application-card {
            grid-column: 1 / -1;

            background: white;

            border: 1px solid #cfd2dc;

            border-radius: 8px;

            padding: 16px;

            display: flex;

            align-items: center;

            gap: 14px;
        }

        .application-icon {
            width: 43px;
            height: 43px;

            background: #eef1ff;

            color: #173c91;

            border-radius: 5px;

            display: flex;
            align-items: center;
            justify-content: center;
        }

        .application-info {
            flex: 1;
        }

        .application-name {
            font-size: 14px;
            font-weight: 600;
        }

        .application-version {
            font-size: 12px;

            color: #555;

            margin-top: 3px;
        }

        .logout-btn {
            border: 1px solid #dc3545;

            background: white;

            color: #dc3545;

            border-radius: 5px;

            padding: 10px 20px;

            cursor: pointer;

            font-size: 13px;
        }

        .logout-btn:hover {
            background: #fff4f4;
        }



        .modal {
            display: none;

            position: fixed;

            inset: 0;

            background: rgba(12, 24, 52, .45);

            align-items: center;
            justify-content: center;

            z-index: 1000;
        }

        .modal.show {
            display: flex;
        }

        .modal-card {
            width: 480px;

            max-width: calc(100% - 30px);

            background: white;

            border-radius: 8px;

            box-shadow:
                0 15px 45px rgba(0, 0, 0, .2);
        }

        .modal-header {
            padding: 18px 22px;

            border-bottom: 1px solid #ddd;

            display: flex;

            justify-content: space-between;

            align-items: center;
        }

        .modal-title {
            font-size: 17px;
            font-weight: 600;
        }

        .modal-close {
            border: 0;

            background: none;

            font-size: 23px;

            cursor: pointer;

            color: #666;
        }

        .modal-body {
            padding: 22px;
        }

        .form-group {
            margin-bottom: 18px;
        }

        .form-group label {
            display: block;

            margin-bottom: 7px;

            font-size: 13px;

            font-weight: 600;
        }

        .form-group input {
            width: 100%;

            height: 40px;

            border: 1px solid #c9ccd5;

            border-radius: 5px;

            padding: 8px 11px;

            font-family: inherit;
        }

        .form-group input:focus {
            outline: none;

            border-color: #29438f;
        }

        .modal-footer {
            border-top: 1px solid #ddd;

            padding: 14px 22px;

            display: flex;

            justify-content: flex-end;

            gap: 10px;
        }

        .modal-btn {
            padding: 9px 17px;

            border-radius: 5px;

            border: 1px solid #ccd0da;

            background: white;

            cursor: pointer;
        }

        .modal-btn-primary {
            background: #173c91;

            border-color: #173c91;

            color: white;
        }

        .error {
            color: #d71920;

            font-size: 12px;

            margin-top: 5px;
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


        @media (max-width: 800px) {

            .sidebar {

                width: 78px;

                padding:
                    20px 10px;
            }

            .main {

                margin-left: 78px;
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
                font-size: 0;
            }

            .menu-icon {
                font-size: 14px;
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



    </style>

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

@media(max-width:800px){.sidebar{width:78px !important;padding:20px 10px !important}.main{margin-left:78px !important}.brand{justify-content:center !important;padding-left:0 !important;padding-right:0 !important}.brand-title,.brand-subtitle,.menu-title{display:none !important}.menu a{justify-content:center !important;padding:0 !important;font-size:0 !important}.menu-icon{font-size:14px !important}.sidebar-logout button,.logout-button{justify-content:center !important;padding:0 !important;font-size:0 !important}}
@media(max-width:650px){
  .menu-item,.menu a{font-size:13px !important}
  .profile-name,.user-name{font-size:12px !important}
}

</style>

    <style>
        .settings-layout {
            grid-template-columns: 335px minmax(0, 1fr);
            gap: 24px;
        }
                .settings-layout .profile-card {
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(210, 220, 238, .95);
            border-radius: 22px;
            background: linear-gradient(145deg, #ffffff 0%, #f8faff 100%);
            box-shadow:
                0 18px 42px rgba(28, 55, 110, .10),
                0 4px 12px rgba(28, 55, 110, .05);
            transition: transform .25s ease, box-shadow .25s ease, border-color .25s ease;
        }

        .settings-layout .profile-card:hover {
            transform: translateY(-3px);
            border-color: #c8d6ef;
            box-shadow:
                0 24px 50px rgba(28, 55, 110, .13),
                0 7px 18px rgba(28, 55, 110, .06);
        }

        .settings-layout .profile-cover {
            position: relative;
            height: 96px;
            overflow: hidden;
            background:
                radial-gradient(circle at 82% 18%, rgba(255,255,255,.24), transparent 24%),
                radial-gradient(circle at 12% 110%, rgba(132,174,255,.22), transparent 34%),
                linear-gradient(135deg, #234a9f 0%, #315fc4 52%, #597bd0 100%);
        }

        .settings-layout .profile-cover::before {
            content: "";
            position: absolute;
            width: 170px;
            height: 170px;
            right: -55px;
            top: -100px;
            border: 1px solid rgba(255,255,255,.18);
            border-radius: 50%;
            box-shadow: 0 0 0 22px rgba(255,255,255,.035), 0 0 0 44px rgba(255,255,255,.025);
        }

        .settings-layout .profile-cover::after {
            content: "";
            position: absolute;
            width: 110px;
            height: 110px;
            left: -58px;
            bottom: -78px;
            border: 1px solid rgba(255,255,255,.14);
            border-radius: 50%;
        }

        .settings-layout .profile-body {
            position: relative;
            padding: 0 25px 23px;
        }

        .settings-layout .profile-avatar {
            position: relative;
            z-index: 2;
            width: 94px;
            height: 94px;
            margin: -31px auto 16px;
            border: 5px solid rgba(255,255,255,.96);
            border-radius: 22px;
            background: linear-gradient(145deg, #f8faff 0%, #e8eefb 100%);
            color: #2855b7;
            box-shadow:
                0 12px 28px rgba(29, 61, 126, .16),
                inset 0 0 0 1px rgba(40,85,183,.06);
            font-size: 27px;
            font-weight: 800;
        }

        .settings-layout .profile-name {
            color: #17233b;
            font-size: 20px;
            font-weight: 800;
            letter-spacing: -.25px;
            margin-bottom: 5px;
        }

        .settings-layout .profile-username {
            color: #77839a;
            font-size: 12px;
            margin-bottom: 21px;
        }

        .settings-layout .profile-row {
            padding: 14px 2px 2px;
            border-top: 1px solid #e4e9f2;
            font-size: 12px;
        }

        .settings-layout .profile-label {
            color: #7b879b;
            font-weight: 600;
        }

        .settings-layout .profile-value {
            font-weight: 800;
        }

        .settings-layout .role {
            color: #2855b7;
            padding: 5px 10px;
            border-radius: 999px;
            background: #edf3ff;
            border: 1px solid #dce7fb;
        }

                .settings-layout .options {
            gap: 17px;
        }

        .settings-layout .option-card {
            position: relative;
            overflow: hidden;
            min-height: 136px;
            padding: 21px;
            border: 1px solid #e0e7f2;
            border-radius: 20px;
            background: linear-gradient(145deg, #ffffff 0%, #fbfcff 100%);
            box-shadow: 0 9px 25px rgba(28, 55, 110, .065);
            transition:
                transform .24s ease,
                box-shadow .24s ease,
                border-color .24s ease,
                background .24s ease;
        }

        .settings-layout .option-card::before {
            content: "";
            position: absolute;
            inset: 0;
            pointer-events: none;
            background: linear-gradient(135deg, rgba(58,101,198,.07), transparent 42%, rgba(58,101,198,.025));
            opacity: .7;
        }

        .settings-layout .option-card:hover {
            transform: translateY(-5px);
            border-color: #bfd0ee;
            background: linear-gradient(145deg, #ffffff 0%, #f6f9ff 100%);
            box-shadow: 0 18px 38px rgba(28, 55, 110, .12);
        }

        .settings-layout .option-icon {
            position: relative;
            z-index: 1;
            width: 50px;
            height: 50px;
            border-radius: 15px;
            background: linear-gradient(145deg, #edf3ff 0%, #dfeaff 100%);
            color: #2855b7;
            box-shadow:
                inset 0 0 0 1px rgba(40,85,183,.06),
                0 7px 16px rgba(40,85,183,.07);
            font-size: 20px;
            transition: transform .24s ease, box-shadow .24s ease, background .24s ease;
        }

        .settings-layout .option-card:hover .option-icon {
            transform: translateY(-2px) scale(1.05);
            background: linear-gradient(145deg, #e6efff 0%, #d5e4ff 100%);
            box-shadow:
                inset 0 0 0 1px rgba(40,85,183,.08),
                0 10px 20px rgba(40,85,183,.11);
        }

        .settings-layout .option-content {
            position: relative;
            z-index: 1;
            padding-top: 1px;
        }

        .settings-layout .option-title {
            color: #17233b;
            font-size: 14px;
            font-weight: 800;
            margin-bottom: 7px;
        }

        .settings-layout .option-description {
            color: #758198;
            font-size: 11.5px;
            line-height: 1.55;
        }

        .settings-layout .arrow {
            position: relative;
            z-index: 1;
            width: 34px;
            height: 34px;
            margin-top: 1px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #9aa5b5;
            font-size: 18px;
            transition: transform .22s ease, color .22s ease, background .22s ease;
        }

        .settings-layout .option-card:hover .arrow {
            transform: translateX(4px);
            color: #2855b7;
            background: #edf3ff;
        }

                .settings-layout .application-card {
            min-height: 76px;
            padding: 17px;
            border: 1px solid #dce5f2;
            border-radius: 20px;
            background: linear-gradient(145deg, #ffffff 0%, #f7faff 100%);
            box-shadow: 0 10px 26px rgba(28,55,110,.07);
        }

        .settings-layout .application-icon {
            width: 48px;
            height: 48px;
            border-radius: 14px;
            background: linear-gradient(145deg, #edf3ff 0%, #dfeaff 100%);
            color: #2855b7;
            box-shadow: inset 0 0 0 1px rgba(40,85,183,.06);
        }

        .settings-layout .application-name {
            color: #17233b;
            font-size: 13px;
            font-weight: 800;
        }

        .settings-layout .application-version {
            color: #7b879b;
            font-size: 11px;
            margin-top: 4px;
        }

        .settings-layout .logout-btn {
            min-width: 84px;
            height: 40px;
            padding: 0 17px;
            border: 1px solid #ef9aa4;
            border-radius: 11px;
            background: #fff;
            color: #d54857;
            font-size: 11px;
            font-weight: 700;
            box-shadow: 0 5px 13px rgba(213,72,87,.06);
            transition: transform .2s ease, background .2s ease, border-color .2s ease, box-shadow .2s ease;
        }

        .settings-layout .logout-btn:hover {
            transform: translateY(-2px);
            background: #fff7f8;
            border-color: #e97986;
            box-shadow: 0 9px 18px rgba(213,72,87,.10);
        }

                .modal {
            background: rgba(10, 25, 58, .54);
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
            padding: 20px;
        }

        .modal.show .modal-card {
            animation: settingsModalIn .24s ease-out;
        }

        .modal-card {
            width: 500px;
            max-width: min(500px, calc(100% - 10px));
            overflow: hidden;
            border: 1px solid rgba(220,228,242,.95);
            border-radius: 22px;
            background: linear-gradient(145deg, #ffffff 0%, #f9fbff 100%);
            box-shadow:
                0 30px 80px rgba(8, 27, 69, .24),
                0 8px 25px rgba(8, 27, 69, .12),
                inset 0 1px 0 rgba(255,255,255,.9);
        }

        .modal-header {
            min-height: 68px;
            padding: 18px 22px;
            border-bottom: 1px solid #e5eaf2;
            background: linear-gradient(180deg, rgba(255,255,255,.96), rgba(248,250,255,.88));
        }

        .modal-title {
            color: #17233b;
            font-size: 16px;
            font-weight: 800;
            letter-spacing: -.15px;
        }

        .modal-close {
            width: 34px;
            height: 34px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid transparent;
            border-radius: 10px;
            background: transparent;
            color: #7a8494;
            font-size: 20px;
            transition: .2s ease;
        }

        .modal-close:hover {
            border-color: #e1e6ef;
            background: #f1f4fa;
            color: #26344d;
            transform: rotate(3deg);
        }

        .modal-body {
            padding: 24px 22px 21px;
        }

        .form-group {
            margin-bottom: 19px;
        }

        .form-group:last-child {
            margin-bottom: 0;
        }

        .form-group label {
            margin-bottom: 8px;
            color: #344159;
            font-size: 11.5px;
            font-weight: 800;
        }

        .form-group input {
            width: 100%;
            height: 44px;
            padding: 0 13px;
            border: 1px solid #d9e1ed;
            border-radius: 11px;
            background: #f9fbfe;
            color: #26334b;
            font-size: 12px;
            box-shadow: inset 0 1px 2px rgba(20,45,90,.025);
            transition: border-color .2s ease, box-shadow .2s ease, background .2s ease, transform .2s ease;
        }

        .form-group input:hover {
            border-color: #c8d5e9;
            background: #fff;
        }

        .form-group input:focus {
            border-color: #86a7e1;
            background: #fff;
            box-shadow: 0 0 0 4px rgba(40,85,183,.075), 0 6px 16px rgba(40,85,183,.05);
            transform: translateY(-1px);
        }

        .modal-footer {
            min-height: 70px;
            padding: 14px 22px;
            border-top: 1px solid #e5eaf2;
            background: rgba(248,250,255,.72);
        }

        .modal-btn {
            min-height: 39px;
            padding: 0 17px;
            border: 1px solid #d4dce9;
            border-radius: 10px;
            background: #fff;
            color: #4c586c;
            font-size: 11px;
            font-weight: 700;
            transition: transform .2s ease, box-shadow .2s ease, background .2s ease, border-color .2s ease;
        }

        .modal-btn:hover {
            transform: translateY(-1px);
            border-color: #c4d0e3;
            background: #f8faff;
            box-shadow: 0 6px 14px rgba(30,58,110,.07);
        }

        .modal-btn-primary {
            min-width: 82px;
            border-color: #234a9f;
            background: linear-gradient(135deg, #315fc4 0%, #234a9f 100%);
            color: #fff;
            box-shadow: 0 8px 18px rgba(40,85,183,.20);
        }

        .modal-btn-primary:hover {
            border-color: #21499d;
            background: linear-gradient(135deg, #3a6dd0 0%, #234a9f 100%);
            color: #fff;
            box-shadow: 0 11px 22px rgba(40,85,183,.25);
        }

        .error {
            color: #cf3e4c;
            font-size: 11px;
            margin-top: 6px;
            font-weight: 600;
        }

                .settings-info-list {
            display: grid;
            gap: 11px;
        }

        .settings-info-item {
            display: flex;
            align-items: center;
            gap: 13px;
            padding: 13px 14px;
            border: 1px solid #e3e9f3;
            border-radius: 13px;
            background: linear-gradient(135deg, #fbfdff 0%, #f5f8fd 100%);
        }

        .settings-info-item-icon {
            width: 38px;
            height: 38px;
            flex: 0 0 38px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid #d7e3fa;
            border-radius: 11px;
            background: #edf3ff;
            color: #2859b8;
        }

        .settings-info-item-icon svg {
            width: 18px;
            height: 18px;
            stroke-width: 2;
        }

        .settings-info-item-content {
            flex: 1;
            min-width: 0;
        }

        .settings-info-item-title {
            color: #1b2a44;
            font-size: 12px;
            font-weight: 800;
            margin-bottom: 3px;
        }

        .settings-info-item-text {
            color: #71809a;
            font-size: 11px;
            line-height: 1.5;
        }

        .settings-modal-intro {
            margin: 0 0 16px;
            color: #71809a;
            font-size: 11.5px;
            line-height: 1.6;
        }

        .app-about {
            text-align: center;
            padding: 4px 4px 2px;
        }

        .app-about-icon {
            width: 62px;
            height: 62px;
            margin: 0 auto 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid #d5e2fb;
            border-radius: 18px;
            background: linear-gradient(145deg, #edf4ff, #dfeaff);
            color: #2859b8;
            box-shadow: 0 12px 24px rgba(40,85,183,.10);
        }

        .app-about-icon svg {
            width: 28px;
            height: 28px;
            stroke-width: 1.8;
        }

        .app-about-title {
            color: #17233b;
            font-size: 18px;
            font-weight: 800;
            letter-spacing: -.2px;
        }

        .app-about-version {
            display: inline-flex;
            align-items: center;
            margin-top: 7px;
            padding: 5px 10px;
            border: 1px solid #dce6f7;
            border-radius: 999px;
            background: #f3f7ff;
            color: #3562b3;
            font-size: 10.5px;
            font-weight: 700;
        }

        .app-about-description {
            max-width: 390px;
            margin: 15px auto 0;
            color: #6d7c95;
            font-size: 11.5px;
            line-height: 1.65;
        }

        @keyframes settingsModalIn {
            from {
                opacity: 0;
                transform: translateY(10px) scale(.985);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        @media (max-width: 760px) {
            .settings-layout {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 560px) {
            .settings-layout .options {
                grid-template-columns: 1fr;
            }

            .modal-card {
                border-radius: 18px;
            }

            .modal-body {
                padding: 20px 18px 18px;
            }

            .modal-footer {
                padding: 13px 18px;
            }
        }
    </style>

    @include('partials.theme')
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
                    href="{{ route('laporan.index') }}">
                    <span class="menu-icon"><i data-lucide="file-chart-column"></i></span>
                    Laporan
                </a>

                <a
                    href="{{ route('pengaturan.index') }}" class="active">
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



        <header class="topbar">


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

            <h1 class="page-title">
                Pengaturan
            </h1>

            <p class="page-subtitle">
                Kelola informasi profil dan keamanan akun Anda.
            </p>



            @if (session('success'))

                <div class="success">
                    {{ session('success') }}
                </div>

            @endif


            <div class="settings-layout">



                <div class="profile-card">

                    <div class="profile-cover"></div>


                    <div class="profile-body">

                        <div class="profile-avatar">
                            @if ($user->foto_profil)
                                <img
                                    src="{{ asset('storage/' . $user->foto_profil) }}"
                                    alt="Foto Profil"
                                >
                            @else
                                {{ strtoupper(substr($user->nama, 0, 2)) }}
                            @endif
                        </div>


                        <div class="profile-name">
                            {{ $user->nama }}
                        </div>


                        <div class="profile-username">
                            {{ $user->username }}
                        </div>


                        <div class="profile-row">

                            <span class="profile-label">
                                Peran
                            </span>

                            <span class="profile-value role">
                                {{ $user->role }}
                            </span>

                        </div>

                    </div>

                </div>



                <div class="options">



                    <div
                        class="option-card"
                        onclick="openModal('profileModal')"
                    >

                        <div class="option-icon">
                            <i data-lucide="user-round"></i>
                        </div>

                        <div class="option-content">

                            <div class="option-title">
                                Profil
                            </div>

                            <div class="option-description">
                                Ubah nama dan username akun Anda.
                            </div>

                        </div>

                        <div class="arrow">
                            <i data-lucide="arrow-right"></i>
                        </div>

                    </div>



                    <div
                        class="option-card"
                        onclick="openModal('passwordModal')"
                    >

                        <div class="option-icon">
                            <i data-lucide="lock-keyhole"></i>
                        </div>

                        <div class="option-content">

                            <div class="option-title">
                                Ubah Password
                            </div>

                            <div class="option-description">
                                Perbarui kata sandi untuk keamanan akun.
                            </div>

                        </div>

                        <div class="arrow">
                            <i data-lucide="arrow-right"></i>
                        </div>

                    </div>



                    <div
                        class="option-card"
                        id="preferenceCard"
                        onclick="openModal('preferenceModal')"
                    >

                        <div class="option-icon">
                            <i data-lucide="sliders-horizontal"></i>
                        </div>

                        <div class="option-content">

                            <div class="option-title">
                                Preferensi
                            </div>

                            <div class="option-description">
                                Pengaturan tampilan antarmuka sistem.
                            </div>

                        </div>

                        <div class="arrow">
                            <i data-lucide="arrow-right"></i>
                        </div>

                    </div>



                    <div
                        class="option-card"
                        id="infoCard"
                        onclick="openModal('infoModal')"
                    >

                        <div class="option-icon">
                            <i data-lucide="info"></i>
                        </div>

                        <div class="option-content">

                            <div class="option-title">
                                Informasi Aplikasi
                            </div>

                            <div class="option-description">
                                Informasi mengenai sistem SIRASI-BK.
                            </div>

                        </div>

                        <div class="arrow">
                            <i data-lucide="arrow-right"></i>
                        </div>

                    </div>



                    <div class="application-card">

                        <div class="application-icon">
                            <i data-lucide="diamond"></i>
                        </div>

                        <div class="application-info">

                            <div class="application-name">
                                SIRASI-BK
                            </div>

                            <div class="application-version">
                                Version 1.0.0
                            </div>

                        </div>


                        <form
                            action="{{ route('logout') }}"
                            method="POST"
                        >

                            @csrf

                            <button
                                type="submit"
                                class="logout-btn"
                            >
                                Logout
                            </button>

                        </form>

                    </div>

                </div>

            </div>

        </section>

    </main>

</div>



<div
    id="profileModal"
    class="modal"
>

    <div class="modal-card">


        <div class="modal-header">

            <div class="modal-title">
                Edit Profil
            </div>

            <button
                type="button"
                class="modal-close"
                onclick="closeModal('profileModal')"
            >
                <i data-lucide="x"></i>
            </button>

        </div>


        <form
            action="{{ route('pengaturan.profil.update') }}"
            method="POST"
            enctype="multipart/form-data"
        >

            @csrf

            @method('PUT')


            <div class="modal-body">


                <div class="form-group">

                    <label>
                        Nama
                    </label>

                    <input
                        type="text"
                        name="nama"
                        value="{{ old('nama', $user->nama) }}"
                        required
                    >

                    @error('nama')

                        <div class="error">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


                <div class="form-group">

                    <label>
                        Username
                    </label>

                    <input
                        type="text"
                        name="username"
                        value="{{ old('username', $user->username) }}"
                        required
                    >

                    @error('username')

                        <div class="error">
                            {{ $message }}
                        </div>

                    @enderror
                </div>

                <div class="form-group">
                    <label>
                        Foto Profil
                    </label>

                    <input
                        type="file"
                        name="foto_profil"
                        accept=".jpg,.jpeg,.png,.webp"
                    >

                    @error('foto_profil')
                        <div class="error">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

            </div>


            <div class="modal-footer">

                <button
                    type="button"
                    class="modal-btn"
                    onclick="closeModal('profileModal')"
                >
                    Batal
                </button>

                <button
                    type="submit"
                    class="modal-btn modal-btn-primary"
                >
                    Simpan
                </button>

            </div>

        </form>

    </div>

</div>



<div
    id="passwordModal"
    class="modal"
>

    <div class="modal-card">


        <div class="modal-header">

            <div class="modal-title">
                Ubah Password
            </div>

            <button
                type="button"
                class="modal-close"
                onclick="closeModal('passwordModal')"
            >
                <i data-lucide="x"></i>
            </button>

        </div>


        <form
            action="{{ route('pengaturan.password.update') }}"
            method="POST"
        >

            @csrf

            @method('PUT')


            <div class="modal-body">


                <div class="form-group">

                    <label>
                        Password Lama
                    </label>

                    <input
                        type="password"
                        name="password_lama"
                        required
                    >

                    @error('password_lama')

                        <div class="error">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


                <div class="form-group">

                    <label>
                        Password Baru
                    </label>

                    <input
                        type="password"
                        name="password_baru"
                        required
                    >

                    @error('password_baru')

                        <div class="error">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


                <div class="form-group">

                    <label>
                        Konfirmasi Password Baru
                    </label>

                    <input
                        type="password"
                        name="password_baru_confirmation"
                        required
                    >

                </div>

            </div>


            <div class="modal-footer">

                <button
                    type="button"
                    class="modal-btn"
                    onclick="closeModal('passwordModal')"
                >
                    Batal
                </button>

                <button
                    type="submit"
                    class="modal-btn modal-btn-primary"
                >
                    Simpan Password
                </button>

            </div>

        </form>

    </div>

</div>



<div
    id="preferenceModal"
    class="modal"
>

    <div class="modal-card">

        <div class="modal-header">
            <div class="modal-title">
                Preferensi
            </div>

            <button
                type="button"
                class="modal-close"
                onclick="closeModal('preferenceModal')"
            >
                <i data-lucide="x"></i>
            </button>
        </div>

        <div class="modal-body">
            <p class="settings-modal-intro">
                Pengaturan tampilan antarmuka yang digunakan pada sistem SIRASI-BK.
            </p>

            <div class="settings-info-list">

                <div
                    class="settings-info-item theme-choice"
                    data-theme-choice="light"
                    onclick="setTheme('light')"
                >
                    <div class="settings-info-item-icon">
                        <i data-lucide="sun"></i>
                    </div>

                    <div class="settings-info-item-content">
                        <div class="settings-info-item-title">Tampilan Terang</div>
                        <div class="settings-info-item-text">Gunakan tampilan terang untuk antarmuka yang cerah dan nyaman digunakan pada siang hari.</div>
                    </div>
                </div>

                <div
                    class="settings-info-item theme-choice"
                    data-theme-choice="dark"
                    onclick="setTheme('dark')"
                >
                    <div class="settings-info-item-icon">
                        <i data-lucide="moon"></i>
                    </div>

                    <div class="settings-info-item-content">
                        <div class="settings-info-item-title">Tampilan Gelap</div>
                        <div class="settings-info-item-text">Gunakan tampilan gelap dengan warna yang lebih redup agar nyaman digunakan pada malam hari.</div>
                    </div>
                </div>

                <div
                    class="settings-info-item responsive-choice"
                    id="responsiveChoice"
                    onclick="toggleResponsive()"
                    role="button"
                    tabindex="0"
                    aria-label="Aktifkan atau nonaktifkan tampilan responsif"
                >
                    <div class="settings-info-item-icon">
                        <i data-lucide="monitor"></i>
                    </div>

                    <div class="settings-info-item-content">
                        <div class="settings-info-item-title">Tampilan Responsif</div>
                        <div class="settings-info-item-text" id="responsiveDescription">Tampilan menyesuaikan ukuran layar agar tetap nyaman digunakan pada perangkat yang berbeda.</div>
                    </div>

                    <span class="responsive-toggle" aria-hidden="true"></span>
                </div>

            </div>

            <div class="theme-current">
                Tema yang sedang digunakan: <strong id="currentThemeLabel">Tampilan Terang</strong>
                <br>
                Tampilan responsif: <strong id="responsiveStatusLabel">Aktif</strong>
            </div>

        </div>

        <div class="modal-footer">
            <button
                type="button"
                class="modal-btn modal-btn-primary"
                onclick="closeModal('preferenceModal')"
            >
                Selesai
            </button>
        </div>

    </div>

</div>



<div
    id="infoModal"
    class="modal"
>

    <div class="modal-card">

        <div class="modal-header">
            <div class="modal-title">
                Informasi Aplikasi
            </div>

            <button
                type="button"
                class="modal-close"
                onclick="closeModal('infoModal')"
            >
                <i data-lucide="x"></i>
            </button>
        </div>

        <div class="modal-body">
            <div class="app-about">

                <div class="app-about-icon">
                    <i data-lucide="info"></i>
                </div>

                <div class="app-about-title">
                    SIRASI-BK
                </div>

                <div class="app-about-version">
                    Version 1.0.0
                </div>

                <div class="app-about-description">
                    Sistem Informasi Riwayat Siswa untuk membantu pengelolaan data Bimbingan dan Konseling secara lebih terstruktur, rapi, dan mudah digunakan.
                </div>

                <div class="settings-info-list" style="margin-top:18px; text-align:left;">

                    <div class="settings-info-item">
                        <div class="settings-info-item-icon">
                            <i data-lucide="school"></i>
                        </div>

                        <div class="settings-info-item-content">
                            <div class="settings-info-item-title">
                                Sistem Sekolah
                            </div>
                            <div class="settings-info-item-text">
                                Digunakan untuk mendukung kebutuhan administrasi dan layanan Bimbingan & Konseling.
                            </div>
                        </div>
                    </div>

                    <div class="settings-info-item">
                        <div class="settings-info-item-icon">
                            <i data-lucide="shield-check"></i>
                        </div>

                        <div class="settings-info-item-content">
                            <div class="settings-info-item-title">
                                Pengelolaan Terpusat
                            </div>
                            <div class="settings-info-item-text">
                                Data dan informasi dikelola melalui satu sistem agar proses kerja lebih terorganisir.
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>

        <div class="modal-footer">
            <button
                type="button"
                class="modal-btn modal-btn-primary"
                onclick="closeModal('infoModal')"
            >
                Tutup
            </button>
        </div>

    </div>

</div>


<script>

    function openModal(id)
    {
        const modal = document.getElementById(id);

        if (!modal) {
            return;
        }

        modal.classList.add('show');
        document.body.style.overflow = 'hidden';
    }


    function closeModal(id)
    {
        const modal = document.getElementById(id);

        if (!modal) {
            return;
        }

        modal.classList.remove('show');
        document.body.style.overflow = '';
    }


    function applyTheme(theme)
    {
        document.documentElement.classList.toggle('dark-mode', theme === 'dark');
        document.body.classList.toggle('dark-mode', theme === 'dark');

        const label = document.getElementById('currentThemeLabel');

        if (label) {
            label.textContent = theme === 'dark' ? 'Tampilan Gelap' : 'Tampilan Terang';
        }

        document.querySelectorAll('[data-theme-choice]').forEach(function(choice) {
            choice.classList.toggle('active', choice.dataset.themeChoice === theme);
        });
    }

    function setTheme(theme)
    {
        if (theme !== 'light' && theme !== 'dark') {
            return;
        }

        localStorage.setItem('sirasi-theme', theme);
        applyTheme(theme);
    }

    function applyResponsive(enabled)
    {
        document.documentElement.classList.toggle('responsive-disabled', !enabled);
        document.body.classList.toggle('responsive-disabled', !enabled);

        const choice = document.getElementById('responsiveChoice');
        const label = document.getElementById('responsiveStatusLabel');
        const description = document.getElementById('responsiveDescription');

        if (choice) {
            choice.classList.toggle('active', enabled);
        }

        if (label) {
            label.textContent = enabled ? 'Aktif' : 'Nonaktif';
        }

        if (description) {
            description.textContent = enabled
                ? 'Tampilan otomatis menyesuaikan ukuran layar perangkat.'
                : 'Tampilan menggunakan ukuran desktop dan tidak menyesuaikan layar kecil.';
        }
    }

    function toggleResponsive()
    {
        const current = localStorage.getItem('sirasi-responsive');
        const enabled = current !== 'false';
        const next = !enabled;

        localStorage.setItem('sirasi-responsive', next ? 'true' : 'false');
        applyResponsive(next);
    }

    document.addEventListener('DOMContentLoaded', function() {

        const preferenceCard = document.getElementById('preferenceCard');
        const infoCard = document.getElementById('infoCard');
        const savedTheme = localStorage.getItem('sirasi-theme') || 'light';
        const savedResponsive = localStorage.getItem('sirasi-responsive') !== 'false';

        applyTheme(savedTheme);
        applyResponsive(savedResponsive);

        if (preferenceCard) {
            preferenceCard.addEventListener('click', function() {
                openModal('preferenceModal');
            });
        }

        if (infoCard) {
            infoCard.addEventListener('click', function() {
                openModal('infoModal');
            });
        }

        const responsiveChoice = document.getElementById('responsiveChoice');

        if (responsiveChoice) {
            responsiveChoice.addEventListener('keydown', function(event) {
                if (event.key === 'Enter' || event.key === ' ') {
                    event.preventDefault();
                    toggleResponsive();
                }
            });
        }

    });


    document
        .querySelectorAll('.modal')
        .forEach(function(modal) {

            modal.addEventListener(
                'click',
                function(event) {

                    if (event.target === modal) {

                        modal.classList.remove('show');

                    }

                }
            );

        });

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
