<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Email Address</title>
</head>
<body>
    <p>Subject: Votre compte a été approuvé sur ServiceNet</p>
    <p> Cher(e) {{$provider->user->name}},<br>

        Nous sommes heureux de vous informer que votre compte sur ServiceNet a été approuvé par notre équipe. Vous pouvez maintenant accéder à toutes les fonctionnalités de notre site et profiter de nos services.
        
        N'hésitez pas à nous contacter si vous avez des questions ou besoin d'aide. Nous sommes là pour vous assister.
        
        Bienvenue à bord et merci de faire partie de notre communauté <br><br>
        
        Cordialement,<br>
        L'équipe de ServiceNet
    </p>
    <button><a href="{{route('login')}}">Cliquez ici pour connecter à votre compte</a></button>
</body>
</html>

