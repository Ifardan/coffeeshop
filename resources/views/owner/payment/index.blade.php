<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>QRIS Payment Setting</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        body{
            font-family: Arial;
            background: #f3f4f6;
            margin: 0;
            padding: 20px;
        }

        .box{
            max-width: 500px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
        }

        h1{
            font-size: 20px;
            margin-bottom: 15px;
        }

        input, button{
            width: 100%;
            padding: 10px;
            margin-top: 10px;
        }

        button{
            background: black;
            color: white;
            border: none;
            cursor: pointer;
        }

        img{
            margin-top: 15px;
            width: 200px;
            border-radius: 8px;
        }

        .success{
            background: #dcfce7;
            padding: 10px;
            margin-bottom: 10px;
            color: green;
        }
    </style>

</head>
<body>

<div class="box">

    <h1>⚙️ QRIS Payment Setting</h1>

    {{-- SUCCESS MESSAGE --}}
    @if(session('success'))
        <div class="success">
            {{ session('success') }}
        </div>
    @endif

    {{-- CURRENT QR --}}
    @if(isset($setting) && $setting && $setting->qris_image)
        <p>QRIS Saat Ini:</p>
        <img src="{{ asset('images/'.$setting->qris_image) }}">
    @endif

    {{-- FORM UPLOAD --}}
    <form method="POST" enctype="multipart/form-data" action="/owner/payment">

    @csrf

    <label>Upload QRIS Baru</label>

    <input type="file" name="qris_image">

    <hr style="margin:20px 0;">

    <h3>Data Rekening</h3>

    <label>Nama Bank</label>

    <input type="text"
           name="bank_name"
           value="{{ $setting->bank_name ?? '' }}">

    <label>Nomor Rekening</label>

    <input type="text"
           name="account_number"
           value="{{ $setting->account_number ?? '' }}">

    <label>Atas Nama</label>

    <input type="text"
           name="account_name"
           value="{{ $setting->account_name ?? '' }}">

    <button type="submit">
        Simpan Pengaturan
    </button>

</form>

</div>

</body>
</html>