<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Service Appointment Confirmation</title>
</head>
<body>
    <p>Dear ahmed,</p>
    
    <p>You've been selected for an appointment on {{ $reservation->date }} at {{ $reservation->time }}, located at {{ $client->adresse }}, serving {{ $client->name }}.</p>
    <h1>here are his informations : </h1>
    <p>Email: {{ $client->email }}</p>
    <p>Phone: {{ $client->phone }}</p>
    <p>Address: {{ $client->address }}</p>
    
    <p>Please confirm your availability promptly by clicking this link: <a href="#">Link to Validate Reservation</a>.</p>
    ="
    <p>This opportunity is time-sensitive. Failure to confirm promptly will result in us offering the appointment to another service provider.</p>
    
    <p>Thank you for your swift response.</p>
    
    <p>Best regards,</p>
</body>
</html>
