<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Email Address</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #FFEC9E;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .header {
            background-color: #FFEC9E;
            color: #252C2E;
            padding: 5px 10px;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
        }
        .content {
            padding: 20px;
        }

        .content button {
            background-color: #ED9455;
            color: #252C2E;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 20px;
            font-size: 16px;
        }
        .content button:hover {
            background-color: #FFBB70;
        }
        .content button a {
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>Acceptation de compte</h2>
        </div>
        <div class="content">
            <p>Cher(e) {{$provider->user->name}},</p>
            <p>Nous sommes heureux de vous informer que votre compte sur ServiceNet a été approuvé par notre équipe. Vous pouvez maintenant accéder à toutes les fonctionnalités de notre site et profiter de nos services.</p>
            <p>Nous tenons à vous remercier pour l'intérêt que vous avez manifesté envers notre plateforme. Nous comprenons que cette nouvelle puisse être décevante, mais nous vous encourageons à continuer à explorer d'autres opportunités et à développer vos compétences.</p>
            <p>N'hésitez pas à nous contacter si vous avez des questions ou besoin d'aide. Nous sommes là pour vous assister.</p>
            <p>Bienvenue à bord et merci de faire partie de notre communauté</p>
            <p>Cordialement,</p>
            <p>L'équipe de ServiceNet</p>
            <button><a href="{{route('login')}}">Se connecter à votre compte</a></button>
        </div>
    </div>
    
</body>
</html>




