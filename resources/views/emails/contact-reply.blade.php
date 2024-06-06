<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réponse au message de contact</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #FFEC9E;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #333333;
            margin-bottom: 20px;
        }

        p {
            color: #666666;
            margin-bottom: 20px;
        }

        .button {
            display: inline-block;
            background-color: #ED9455;
            color: #333333;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
        }

        .button:hover {
            background-color: #FFBB70;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Réponse à votre message</h1>
        <p>Bonjour {{$name}},</p>
        <p>Nous vous remercions de nous avoir contactés. Voici notre réponse à votre message :</p>
        <hr>
        <p>{{ $messageContent }}</p>
        <hr>
        <p>N'hésitez pas à nous contacter si vous avez d'autres questions.</p>
        <p>Cordialement,</p>
        <div class="footer">
            <p>© 2024 ServiceNet. Tous droits réservés.</p>
        </div>
    </div>
    
</body>
</html>
