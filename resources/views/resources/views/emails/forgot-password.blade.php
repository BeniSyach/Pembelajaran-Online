<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Forgot Password</title>
</head>

<body>
    <div style="padding: 10px;">
        <div style="font-family: `Segoe UI`, Tahoma, Geneva, Verdana, sans-serif; font-size: 20px; color: #1C3FAA; font-weight: bold;">
            E-MesraMedia
        </div>
        <small style="color: #000;">Pembelajaran online E-MesraMedia</small>
        <p style="font-family: `Segoe UI`, Tahoma, Geneva, Verdana, sans-serif; color: #000;">
            Silahkan klik tombol dibawah ini untuk melanjutkan. copy url di bawah ini jika tombol tidak bisa di klik
        </p>
        <a href="{{ url('/change_password/' . $details['token']) }}" style="display: inline-block; width: 100px; height: 30px; background: #1C3FAA; color: #fff; text-decoration: none; border-radius: 5px; text-align: center; line-height: 30px; font-family: `Segoe UI`, Tahoma, Geneva, Verdana, sans-serif;">
            change password
        </a>
        <br>
        <br>
        <a href="{{ url('/change_password/' . $details['token']) }}">
            {{ url('/change_password/' . $details['token']) }}
        </a>
    </div>
</body>

</html>