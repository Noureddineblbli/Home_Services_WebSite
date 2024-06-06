<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        .card {
            background-color: #FFBB70;
        }
        .card:hover {
            background-color: #ED9455;
        }
    </style>
</head>
<body>
    <h1>
        Bienvenue Admin
    </h1>
    <div class="container">
        <div class="row">  
            <div class="col-md-4">
                <a class="card" style="width: 350px; height: 250px; margin:10px; text-align: center; position: relative; transition: background-color 0.3s;" href="{{ route('admin.service_categories') }}">
                    <h3 class="card-title" style="position: absolute; top: 10px;left: 0px; width: 100%;">Catégories de services</h3>
                    <img src="{{ asset('images/ServiceCategoryIcon.png') }}" alt="Image des catégories de services" style="width: 200px; height: 150px; position: absolute; top: 55%; left: 50%; transform: translate(-50%, -50%);">
                </a>        
            </div>
            <div class="col-md-4">
                <a class="card" style="width: 350px; height: 250px; margin:10px; text-align: center; position: relative; transition: background-color 0.3s;" href="{{ route('admin.all_services') }}">
                    <h3 class="card-title" style="position: absolute; top: 10px;left: 0px; width: 100%;">Services</h3>
                    <img src="{{ asset('images/ServiceIcon.png') }}" alt="Image des services" style="width: 200px; height: 150px; position: absolute; top: 55%; left: 50%; transform: translate(-50%, -50%);">
                </a>        
            </div>
            <div class="col-md-4">
                <a class="card" style="width: 350px; height: 250px; margin:10px; text-align: center; position: relative; transition: background-color 0.3s;" href="{{ route('admin.historique') }}">
                    <h3 class="card-title" style="position: absolute; top: 10px;left: 0px; width: 100%;">Historique des réservations</h3>
                    <img src="{{ asset('images/ReservationIcon.png') }}" alt="Image de l'historique des réservations" style="width: 200px; height: 150px; position: absolute; top: 55%; left: 50%; transform: translate(-50%, -50%);">
                </a>        
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <a class="card" style="width: 350px; height: 250px; margin:10px; text-align: center; position: relative; transition: background-color 0.3s;" href="{{ route('admin.service_providers') }}">
                    <h3 class="card-title" style="position: absolute; top: 10px;left: 0px; width: 100%;">Prestataires de services</h3>
                    <img src="{{ asset('images/ServiceProviderIcon.png') }}" alt="Image des prestataires de services" style="width: 200px; height: 150px; position: absolute; top: 55%; left: 50%; transform: translate(-50%, -50%);">
                </a>        
            </div>
            <div class="col-md-4">
                <a class="card" style="width: 350px; height: 250px; margin:10px; text-align: center; position: relative; transition: background-color 0.3s;" href="{{ route('admin.service_providers.pending') }}">
                    <h3 class="card-title" style="position: absolute; top: 10px;left: 0px; width: 100%;">Prestataires à vérifier ({{ $pendingServiceProvidersCount }})</h3>
                    <img src="{{ asset('images/PendigServiceProviderIcon.png') }}" alt="Image des prestataires en attente" style="width: 200px; height: 150px; position: absolute; top: 55%; left: 50%; transform: translate(-50%, -50%);">
                </a>        
            </div>
            <div class="col-md-4">
                <a class="card" style="width: 350px; height: 250px; margin:10px; text-align: center; position: relative; transition: background-color 0.3s;" href="{{ route('admin.contacts') }}">
                    <h3 class="card-title" style="position: absolute; top: 10px;left: 0px; width: 100%;">Contacts ({{ $contactsCount }})</h3>
                    <img src="{{ asset('images/ContactIcon.png') }}" alt="Image des contacts" style="width: 200px; height: 150px; position: absolute; top: 55%; left: 50%; transform: translate(-50%, -50%);">
                </a>        
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <a class="card" style="width: 350px; height: 250px; margin:10px; text-align: center; position: relative; transition: background-color 0.3s;" href="{{ route('admin.slider') }}">
                    <h3 class="card-title" style="position: absolute; top: 10px;left: 0px; width: 100%;">Diapositives</h3>
                    <img src="{{ asset('images/SliderIcon.png') }}" alt="Image des sliders" style="width: 200px; height: 150px; position: absolute; top: 55%; left: 50%; transform: translate(-50%, -50%);">
                </a>        
            </div>
        </div>
    </div>
</body>
</html>
