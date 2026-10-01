<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tambah Tindak Lanjut - SIRASI-BK</title>
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

            --danger: #d64545;
            --danger-bg: #fff1f1;

            --success: #16834a;

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


        a {
            text-decoration: none;
        }


        button,
        input,
        select,
        textarea {
            font-family: inherit;
        }


        
        .page {
            width: 100%;

            max-width: 1080px;

            margin: auto;

            padding:
                35px 25px 50px;
        }


        
        .top-navigation {
            display: flex;

            align-items: center;

            justify-content: space-between;

            margin-bottom: 28px;
        }


        .back {
            display: inline-flex;

            align-items: center;

            gap: 9px;

            min-height: 40px;

            padding:
                0 13px;

            border:
                1px solid
                var(--border);

            border-radius: 10px;

            background:
                rgba(255,255,255,.85);

            color:
                var(--primary);

            font-size: 11px;

            font-weight: 700;

            box-shadow:
                var(--shadow-sm);

            transition: .2s ease;
        }


        .back:hover {
            background:
                white;

            transform:
                translateX(-2px);

            box-shadow:
                var(--shadow-md);
        }


        .system-badge {
            display: inline-flex;

            align-items: center;

            gap: 7px;

            color:
                var(--muted);

            font-size: 10px;

            font-weight: 700;
        }


        .system-dot {
            width: 7px;
            height: 7px;

            border-radius: 50%;

            background:
                #37a66b;

            box-shadow:
                0 0 0 4px
                rgba(55,166,107,.10);
        }


        
        .page-header {
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


        h1 {
            color:
                var(--text);

            font-size: 29px;

            line-height: 1.2;

            font-weight: 800;

            letter-spacing: -.5px;
        }


        .subtitle {
            margin-top: 8px;

            color:
                var(--muted);

            font-size: 12px;

            line-height: 1.6;
        }


        
        .card {
            overflow: hidden;

            border:
                1px solid
                var(--border);

            border-radius: 20px;

            background:
                white;

            box-shadow:
                var(--shadow-md);
        }


        .card-header {
            position: relative;

            padding:
                22px 27px;

            border-bottom:
                1px solid
                var(--border);

            background:
                linear-gradient(
                    180deg,
                    #ffffff 0%,
                    #f9fbff 100%
                );
        }


        .header-decoration {
            position: absolute;

            right: 0;
            top: 0;

            width: 180px;
            height: 100%;

            overflow: hidden;

            pointer-events: none;
        }


        .header-decoration::before {
            content: "";

            position: absolute;

            width: 120px;
            height: 120px;

            right: -35px;
            top: -55px;

            border-radius: 50%;

            background:
                rgba(23,60,145,.055);
        }


        .header-content {
            position: relative;

            z-index: 2;
        }


        .card-title {
            display: flex;

            align-items: center;

            gap: 10px;

            font-size: 16px;

            font-weight: 800;
        }


        .title-icon {
            width: 34px;
            height: 34px;

            display: flex;

            align-items: center;
            justify-content: center;

            border-radius: 10px;

            background:
                var(--primary-soft);

            color:
                var(--primary);

            font-size: 15px;
        }


        .card-subtitle {
            margin-top: 8px;

            margin-left: 44px;

            color:
                var(--muted);

            font-size: 10.5px;

            line-height: 1.5;
        }


        .card-body {
            padding:
                28px;
        }


        
        .form-group {
            display: flex;

            flex-direction: column;

            margin-bottom: 21px;
        }


        label {
            display: flex;

            align-items: center;

            gap: 4px;

            margin-bottom: 8px;

            color:
                #424a5a;

            font-size: 10.5px;

            font-weight: 800;
        }


        .required {
            color:
                var(--danger);

            font-size: 12px;
        }


        input,
        select,
        textarea {
            width: 100%;

            border:
                1px solid
                #dce2ec;

            border-radius: 11px;

            background:
                #fafbfc;

            color:
                var(--text);

            font-size: 11.5px;

            outline: none;

            transition:
                border-color .2s ease,
                box-shadow .2s ease,
                background .2s ease;
        }


        input,
        select {
            height: 44px;

            padding:
                0 13px;
        }


        textarea {
            min-height: 125px;

            padding:
                12px 13px;

            resize: vertical;

            line-height: 1.65;
        }


        input:hover,
        select:hover,
        textarea:hover {
            border-color:
                #c8d1e3;

            background:
                white;
        }


        input:focus,
        select:focus,
        textarea:focus {
            border-color:
                #8fa6df;

            background:
                white;

            box-shadow:
                0 0 0 4px
                rgba(23,60,145,.065);
        }


        select {
            cursor: pointer;
        }


        .hint {
            margin-top: 7px;

            color:
                #8a92a1;

            font-size: 9.5px;

            line-height: 1.5;
        }


        .error {
            margin-top: 6px;

            color:
                var(--danger);

            font-size: 10px;

            font-weight: 600;
        }


        
        .selected-info {
            position: relative;

            overflow: hidden;

            margin:
                1px 0 25px;

            padding:
                17px 18px;

            border:
                1px solid
                #cbd7f4;

            border-radius: 14px;

            background:
                linear-gradient(
                    135deg,
                    #f2f5ff,
                    #f8faff
                );
        }


        .selected-info::after {
            content: "";

            position: absolute;

            width: 100px;
            height: 100px;

            right: -40px;
            top: -45px;

            border-radius: 50%;

            background:
                rgba(23,60,145,.06);
        }


        .selected-info-title {
            position: relative;

            z-index: 2;

            margin-bottom: 7px;

            color:
                #6d7690;

            font-size: 9px;

            font-weight: 800;

            text-transform: uppercase;

            letter-spacing: .7px;
        }


        .selected-info-name {
            position: relative;

            z-index: 2;

            color:
                var(--primary);

            font-size: 15px;

            font-weight: 800;
        }


        .selected-info-detail {
            position: relative;

            z-index: 2;

            margin-top: 7px;

            color:
                #697286;

            font-size: 10px;

            line-height: 1.7;
        }


        .selected-badge {
            display: inline-flex;

            align-items: center;

            margin-top: 11px;

            padding:
                5px 9px;

            border-radius: 7px;

            background:
                rgba(23,60,145,.08);

            color:
                var(--primary);

            font-size: 9px;

            font-weight: 800;
        }


        
        .divider {
            border: 0;

            border-top:
                1px solid
                var(--border);

            margin:
                28px 0 22px;
        }


        
        .actions {
            display: flex;

            align-items: center;

            justify-content: flex-end;

            gap: 9px;
        }


        .btn {
            min-height: 42px;

            display: inline-flex;

            align-items: center;

            justify-content: center;

            gap: 7px;

            padding:
                0 17px;

            border:
                1px solid
                #d8dee9;

            border-radius: 10px;

            background:
                white;

            color:
                var(--text);

            cursor: pointer;

            font-size: 10.5px;

            font-weight: 800;

            transition: .2s ease;
        }


        .btn:hover {
            background:
                #f7f8fb;

            border-color:
                #cbd2df;
        }


        .btn-primary {
            border-color:
                var(--primary);

            background:
                linear-gradient(
                    135deg,
                    #2149a2,
                    #173c91
                );

            color:
                white;

            box-shadow:
                0 8px 18px
                rgba(23,60,145,.16);
        }


        .btn-primary:hover {
            border-color:
                var(--primary-dark);

            background:
                linear-gradient(
                    135deg,
                    #173c91,
                    #102e70
                );

            transform:
                translateY(-1px);

            box-shadow:
                0 10px 22px
                rgba(23,60,145,.21);
        }


        
        .form-section {
            padding:
                18px;

            margin-bottom:
                21px;

            border:
                1px solid
                #edf0f5;

            border-radius: 15px;

            background:
                #fcfdff;
        }


        .section-label {
            display: flex;

            align-items: center;

            gap: 8px;

            margin-bottom: 17px;

            color:
                #626b7b;

            font-size: 10px;

            font-weight: 800;

            text-transform: uppercase;

            letter-spacing: .7px;
        }


        .section-number {
            width: 24px;
            height: 24px;

            display: flex;

            align-items: center;
            justify-content: center;

            border-radius: 8px;

            background:
                var(--primary-soft);

            color:
                var(--primary);

            font-size: 9px;

            font-weight: 900;
        }


        
        @media (max-width: 700px) {

            .page {
                padding:
                    22px 15px 35px;
            }


            .top-navigation {
                margin-bottom: 22px;
            }


            .system-badge {
                display: none;
            }


            h1 {
                font-size: 25px;
            }


            .card {
                border-radius: 16px;
            }


            .card-header,
            .card-body {
                padding:
                    20px;
            }


            .card-subtitle {
                margin-left: 0;

                margin-top: 8px;
            }


            .form-section {
                padding:
                    15px;
            }


            .actions {
                flex-direction: column-reverse;
            }


            .actions .btn {
                width: 100%;
            }

        }


        @media (max-width: 430px) {

            .page {
                padding:
                    17px 11px 30px;
            }


            .back {
                font-size: 10px;
            }


            .card-title {
                align-items: flex-start;
            }


            .title-icon {
                flex-shrink: 0;
            }

        }

    </style>

</head>


<body>


<div class="page">


    
    <div class="top-navigation">


        @if ($selectedKonseling)

            <a
                href="{{ route('konseling.show', $selectedKonseling) }}"
                class="back"
            >

                <span>
                    ←
                </span>

                <span>
                    Kembali ke Detail Konseling
                </span>

            </a>

        @else

            <a
                href="{{ route('tindak_lanjut.index') }}"
                class="back"
            >

                <span>
                    ←
                </span>

                <span>
                    Kembali
                </span>

            </a>

        @endif


        <div class="system-badge">

            <span class="system-dot"></span>

            SIRASI-BK

        </div>


    </div>


    
    <div class="page-header">


        <div class="eyebrow">
            Bimbingan & Konseling
        </div>


        <h1>
            Tambah Tindak Lanjut
        </h1>


        <p class="subtitle">
            Catat tindakan lanjutan yang dilakukan setelah sesi konseling siswa.
        </p>


    </div>


    
    <div class="card">



        <div class="card-header">


            <div class="header-decoration"></div>


            <div class="header-content">


                <div class="card-title">


                    <div class="title-icon">
                        ✓
                    </div>


                    <span>
                        Data Tindak Lanjut
                    </span>


                </div>


                <div class="card-subtitle">
                    Isi data sesuai tindakan yang dilakukan setelah sesi konseling.
                </div>


            </div>


        </div>



        <div class="card-body">


            <form action="{{ route('logout') }}" method="POST" onsubmit="return confirm('Anda yakin ingin keluar?');">

                @csrf


                
                <div class="form-section">


                    <div class="section-label">

                        <span class="section-number">
                            01
                        </span>

                        Catatan Konseling

                    </div>


                    <div class="form-group">


                        <label for="id_konseling">

                            Catatan Konseling

                            <span class="required">
                                *
                            </span>

                        </label>


                        <select
                            name="id_konseling"
                            id="id_konseling"
                            required
                        >


                            <option value="">
                                Pilih Catatan Konseling
                            </option>


                            @foreach ($konseling as $item)


                                <option
                                    value="{{ $item->id_konseling }}"

                                    @selected(
                                        (string) old(
                                            'id_konseling',
                                            $selectedKonseling
                                        ) ===
                                        (string) $item->id_konseling
                                    )
                                >

                                    {{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}

                                    —

                                    {{ $item->siswa->nama_siswa ?? '-' }}

                                    —

                                    {{ $item->siswa->kelas->nama_kelas ?? '-' }}

                                </option>


                            @endforeach


                        </select>


                        <div class="hint">

                            Pilih catatan konseling yang akan diberikan tindak lanjut.

                        </div>


                        @error('id_konseling')

                            <div class="error">
                                {{ $message }}
                            </div>

                        @enderror


                    </div>


                </div>


                
                @if ($selectedKonseling)


                    @php

                        $konselingTerpilih = $konseling->firstWhere(
                            'id_konseling',
                            $selectedKonseling
                        );

                    @endphp


                    @if ($konselingTerpilih)


                        <div class="selected-info">


                            <div class="selected-info-title">
                                Konseling yang dipilih
                            </div>


                            <div class="selected-info-name">

                                {{ $konselingTerpilih->siswa->nama_siswa ?? '-' }}

                            </div>


                            <div class="selected-info-detail">


                                Kelas:

                                <strong>
                                    {{ $konselingTerpilih->siswa->kelas->nama_kelas ?? '-' }}
                                </strong>


                                &nbsp; • &nbsp;


                                Tanggal:

                                <strong>
                                    {{ \Carbon\Carbon::parse($konselingTerpilih->tanggal)->format('d M Y') }}
                                </strong>


                                @if ($konselingTerpilih->jenisMasalah)


                                    &nbsp; • &nbsp;


                                    Masalah:

                                    <strong>
                                        {{ $konselingTerpilih->jenisMasalah->nama_jenis }}
                                    </strong>


                                @endif


                            </div>


                            <div class="selected-badge">

                                ✓ Konseling terpilih

                            </div>


                        </div>


                    @endif


                @endif


                
                <div class="form-section">


                    <div class="section-label">

                        <span class="section-number">
                            02
                        </span>

                        Waktu Tindak Lanjut

                    </div>


                    <div class="form-group">


                        <label for="tanggal">

                            Tanggal Tindak Lanjut

                            <span class="required">
                                *
                            </span>

                        </label>


                        <input
                            type="date"
                            id="tanggal"
                            name="tanggal"
                            value="{{ old('tanggal', date('Y-m-d')) }}"
                            required
                        >


                        @error('tanggal')

                            <div class="error">
                                {{ $message }}
                            </div>

                        @enderror


                    </div>


                </div>


                
                <div class="form-section">


                    <div class="section-label">

                        <span class="section-number">
                            03
                        </span>

                        Tindakan

                    </div>


                    <div class="form-group">


                        <label for="tindakan">

                            Tindakan

                            <span class="required">
                                *
                            </span>

                        </label>


                        <textarea
                            id="tindakan"
                            name="tindakan"
                            placeholder="Tuliskan tindakan atau langkah tindak lanjut yang dilakukan..."
                            required
                        >{{ old('tindakan') }}</textarea>


                        @error('tindakan')

                            <div class="error">
                                {{ $message }}
                            </div>

                        @enderror


                    </div>


                </div>


                
                <div class="form-section">


                    <div class="section-label">

                        <span class="section-number">
                            04
                        </span>

                        Keterangan

                    </div>


                    <div class="form-group">


                        <label for="keterangan">

                            Keterangan

                            <span class="required">
                                *
                            </span>

                        </label>


                        <textarea
                            id="keterangan"
                            name="keterangan"
                            placeholder="Tuliskan keterangan tambahan mengenai tindak lanjut..."
                            required
                        >{{ old('keterangan') }}</textarea>


                        @error('keterangan')

                            <div class="error">
                                {{ $message }}
                            </div>

                        @enderror


                    </div>


                </div>


                <hr class="divider">


                
                <div class="actions">


                    @if ($selectedKonseling)


                        <a
                            href="{{ route('konseling.show', $selectedKonseling) }}"
                            class="btn"
                        >

                            ←

                            Batal

                        </a>


                    @else


                        <a
                            href="{{ route('tindak_lanjut.index') }}"
                            class="btn"
                        >

                            ←

                            Batal

                        </a>


                    @endif


                    <button
                        type="submit"
                        class="btn btn-primary"
                    >

                        ✓

                        Simpan Tindak Lanjut

                    </button>


                </div>


            </form>


        </div>


    </div>


</div>


</body>

</html>
