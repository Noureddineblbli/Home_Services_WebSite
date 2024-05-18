<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Verify Email</title>
    <style>
        body {
            background-color: #ED9455; /* Red background color */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
        }
        .card {
            background-color: #FFEC9E; /* White background for card */
            border-radius: 8px;
            box-shadow: 10px 10px 10px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 400px;
            width: 100%;
            text-align: center;
        }
        .card h1 {
            font-size: 24px;
            margin-bottom: 20px;
        }
        .card p {
            margin-bottom: 20px;
        }
        .card form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .card form button {
            margin-top: 10px;
            padding: 8px 16px;
            border: none;
            background-color: #252C2E; /* Green button */
            color: #ffffff;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .card form button:hover {
            background-color: #ED9455; /* Darker green on hover */
        }
    </style>
</head>
<body>
    <div class="card">
        <h1>Vérifier Email</h1>
        <p>Merci pour l'enregistrement! Avant de commencer, pourriez-vous vérifier votre adresse e-mail en cliquant sur le lien que nous venons de vous envoyer par e-mail ? Si vous n'avez pas reçu l'e-mail, nous vous en enverrons volontiers un autre.</p>
    
        @if (session('status') == 'verification-link-sent')
            <div>{{ __('Un nouveau lien de vérification a été envoyé à e-mail que vous avez fournie lors de votre inscription.') }}</div>
        @endif
    
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <button type="submit">{{ __('Renvoyer e-mail de vérification') }}</button>
        </form>
    
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900">{{ __('Se déconnecter') }}</button>
        </form>
    </div>
</body>
</html>
