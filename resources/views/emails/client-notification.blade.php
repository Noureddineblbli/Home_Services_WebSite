<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation de Réservation</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f0e992;
            margin: 0;
            padding: 0;
            color: #333;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #f0e992;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        .header {
            background-color: #007bff;
            color: white;
            padding: 10px;
            text-align: center;
            border-radius: 10px 10px 0 0;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
        }
        .content {
            padding: 20px;
        }
        .content p {
            margin: 10px 0;
        }
        .content ul {
            list-style: none;
            padding: 0;
        }
        .content li {
            background-color: #f9f9f9;
            margin: 5px 0;
            padding: 10px;
            border-radius: 5px;
        }
        .footer {
            text-align: center;
            padding: 10px;
            background-color: #f1f1f1;
            border-radius: 0 0 10px 10px;
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            margin-top: 20px;
            font-size: 16px;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            text-align: center;
        }
        .button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Confirmation de Réservation</h1>
        </div>
        <div class="content">
            <p>Bonjour <strong>{{ $clientName }}</strong>,</p>
            <p>Nous vous rappelons que vous avez effectué une réservation le {{ $reservationCreatedDate }} à {{ $reservationCreatedTime }}. Nous avons le plaisir de vous informer qu'un prestataire de services a accepté votre réservation :</p>
            <ul>
                <li><strong>Prestataire de services :</strong> {{ $serviceProviderName }}</li>
                <li><strong>Email :</strong> {{ $serviceProviderEmail }}</li>
                <li><strong>Téléphone :</strong> {{ $serviceProviderPhone }}</li>
            </ul>
            <p><strong>Détails de la réservation :</strong></p>
            <ul>
                <li><strong>Service :</strong> {{ $serviceName }}</li>
                <li><strong>Date du service :</strong> {{ $serviceTime }}</li>
                <li><strong>Heure du service :</strong> {{ $serviceDate }}</li>
                <li><strong>l'address :</strong> {{ $serviceAddress }}</li>

            </ul>
            <p>Si vous avez des questions ou avez besoin de plus de détails, n'hésitez pas à contacter directement le prestataire de services en utilisant l'email et le téléphone fournis.</p>
            <p>Nous vous remercions d'avoir choisi notre service.</p>
            <p>Cordialement,</p>
            <p>ServiceNet</p>
        </div>
        <div class="footer">
            <p>© 2024 ServiceNet. Tous droits réservés.</p>
        </div>
    </div>
</body>
</html>
