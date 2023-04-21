<!doctype html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ثبت نام در سایت</title>

    <style>

        .vazir {
            direction: rtl;
            font-family: vazir;
            margin-bottom: 30px;
        }

        .btn {
            border: 1px solid #ececec;
            padding: 10px;
            border-radius: 8px;
            background-color: #ececec;
            color: #15c !important;
            text-decoration: none;
            margin-bottom: 10px;
            display: inline-block;
            font-weight: 600;
        }

        .btn:hover{
            border: 1px solid #ececec;
            padding: 10px;
            border-radius: 8px;
            background-color: #15c;
            color: #ececec !important;
            text-decoration: none;
            margin-bottom: 10px;
            display: inline-block;
        }
    </style>

</head>
<body>
<div class="vazir">
    <h2>سلام {{ $first_name }}</h2>

    <p style="margin-bottom: 30px">ممنون از این که در سایت ما ثبت نام کرده اید. برای فعال سازی اکانت خود روی لینک زیر کلیک کنید</p>

    <a class="btn" href="{{ env('EMSIL_ACTIVE_LINK_PREFIX') . $activation_token }}">فعالسازی اکانت</a>
</div>
</body>
</html>
