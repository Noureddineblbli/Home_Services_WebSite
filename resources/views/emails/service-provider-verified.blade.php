<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Email Address</title>
</head>
<body>
    <p>Dear {{$provider->user->name}}</p>
    <p>You've been accepted booyaaaaahhh</p>
    <button><a href="{{route('login')}}">Clique here to log to your account</a></button>
</body>
</html>
