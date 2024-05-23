<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>account disabled</title>
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
        <img src="{{ asset('images/accountDisabled.png') }}" style="width: 80px;">
        <h1>Compte Désactivé</h1>
        <p>Votre compte a été désactivé par un administrateur.</p>
        <p>Si vous pensez que c'est une erreur ou si vous avez des questions, veuillez contacter notre support sur le site ou bien à l'adresse suivante : <a href="mailto:ahntateridwane@gmail.com" class="contact-link">ahntateridwane@gmail.com</a>.</p>
        <p>Nous vous remercions de votre compréhension.</p>
        <form id="logout-form" action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit">Retour à la page d'accueil</button>
        </form>

    </div>
</body>
</html>

