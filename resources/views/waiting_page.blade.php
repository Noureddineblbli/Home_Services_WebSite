<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Waiting Page</title>
    <style>
        body {
            background-color: #ED9455; /* Light gray background */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
        }
        .card {
            background-color: #FFEC9E; /* White background for card */
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            max-width: 400px;
            width: 100%;
        }
        form {
            margin-top: 20px;
        }
        button {
            padding: 10px 20px;
            background-color: #252C2E; /* Green button */
            color: #ffffff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #ED9455; /* Darker green on hover */
        }
    </style>
</head>
<body>
    <div class="card">
        <p>
            Nous vous remercions d'avoir créé un compte sur notre site. Votre inscription est actuellement en cours de vérification par notre équipe.
            
            Veuillez patienter pendant que nous traitons votre demande. Vous recevrez une notification par e-mail une fois que votre compte aura été vérifié. En attendant, n'hésitez pas à explorer notre site et à vous familiariser avec nos services.
            
            Merci pour votre compréhension et votre coopération.
        </p>
        <form id="logout-form" action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit">Retour à la page d'accueil</button>
        </form>
    </div>
</body>
</html>

