<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <body>
        <div class="heading">
            <h1>Admin Verification Reset</h1>
        </div>
        <div class="message">
            <p>A new admin request was made for vikat.com. Please verify the user.
            </p>
            <p>{{$name}}</p>
            <p>{{$email}}</p>
        </div>
        <div class="link" style="text-align:center">
            <a href="/admin/account/verifyadmin/{{$token}}">Click here to complete verification.</a>
        </div>
        <div class="footer">
            <p>Vikat Industries - 2018 - {{date('Y')}}</p>
        </div>
</body>
</html>
