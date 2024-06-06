<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Refus de compte</title>
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
            padding: 10px 20px;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
        }
        .content {
            padding: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>Refus de compte</h2>
        </div>
        <div class="content">
            <p>Bonjour {{$provider->user->name}},</p>
            <p>Nous regrettons de vous informer que votre demande de compte a été refusée. Notre équipe a examiné votre candidature avec soin, mais malheureusement, elle ne correspond pas à nos critères actuels.</p>
            <p>Nous tenons à vous remercier pour l'intérêt que vous avez manifesté envers notre plateforme. Nous comprenons que cette nouvelle puisse être décevante, mais nous vous encourageons à continuer à explorer d'autres opportunités et à développer vos compétences.</p>
            <p>Si vous avez des questions ou si vous souhaitez plus d'informations sur les raisons du refus de votre demande, n'hésitez pas à nous contacter. Nous serions ravis de discuter avec vous et de vous fournir des conseils pour vos futures candidatures.</p>
            <p>Encore une fois, nous vous remercions pour votre temps et votre compréhension.</p>
            <p>Cordialement,</p>
            <p>Votre équipe</p>
        </div>
    </div>
</body>
</html>