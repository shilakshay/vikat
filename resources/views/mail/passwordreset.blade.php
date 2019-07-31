<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Montserrat&display=swap');
    </style>
    <style>
        html,
        body {
        height: 100%;
        width: 100%;
        margin: 0;
        font-family: "Montserrat";
        }

        .heading h1 {
        text-align: center;
        }

        .message {
        line-height: 1.15em;
        margin: 1em;
        text-indent: 5em;
        }

        .message p {
        margin: 0;
        }

        .footer {
        display: flex;
        justify-content: center;
        background: black;
        color: white;
        }

    </style>
</head>
<body>
    <div class="heading">
        <h1>Password Reset</h1>
    </div>
    <div class="message">
        <p>Click the below given link to reset your password
        </p>
    </div>
    <div class="link" style="text-align:center">
        <a href="/admin/account/verify/{{$token}}">Click here to complete verification.</a>
    </div>
    <div class="footer">
        <p>Vikat Industries - 2018 - {{date('Y')}}</p>
    </div>
</body>
</html>
