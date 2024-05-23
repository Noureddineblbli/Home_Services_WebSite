<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vérification de l'email</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .email-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ED9455;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .email-header {
            text-align: center;
            border-bottom: 1px solid #dddddd;
            padding-bottom: 10px;
        }
        .email-header img {
            max-width: 100px;
        }
        .email-body {
            padding: 20px;
            text-align: center;
        }
        .email-body h1 {
            color: #252C2E;
        }
        .email-body p {
            color: #252C2E;
            line-height: 1.5;
            font-size: 15px;
        }
        .verify-button {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #FFEC9E;
            color: #252C2E;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
        }
        .verify-button:hover {
            background-color: #FFBB70;
        }
        .email-footer {
            text-align: center;
            color: #252C2E;
            padding-top: 20px;
            border-top: 1px solid #dddddd;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="email-body">
            <h1>Vérifiez votre adresse email</h1>
            <p>Bonjour,</p>
            <p>Merci de vous être inscrit sur notre site. Veuillez cliquer sur le bouton ci-dessous pour vérifier votre adresse email et activer votre compte.</p>
            <p>Si vous n'avez pas créé de compte avec cette adresse email, veuillez ignorer cet email.</p>
            <a href="{{ $verificationUrl }}" class="verify-button">Vérifier l'email</a>
        </div>
        <div class="email-footer">
            <p>&copy; 2024 ServiceNet. Tous droits réservés.</p>
        </div>
    </div>
</body>
</html>
