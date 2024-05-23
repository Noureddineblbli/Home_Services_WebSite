<!-- resources/views/livewire/admin/service/reservation-details-component.blade.php -->

<div class="reservation-details">
    <h2>Détails de la réservation</h2>
    @if ($reservationInfo)
        <div class="info-box">
            <p><strong>Nom du service:</strong> {{ $reservationInfo['service_name'] }}</p>
            <p><strong>Date de réservation:</strong> {{ $reservationInfo['date'] }}</p>
            <p><strong>Heure de réservation:</strong> {{ $reservationInfo['time'] }}</p>
            <p><strong>Date de création:</strong> {{ $reservationInfo['created_at'] }}</p>
            <p><strong>Status:</strong> {{ $reservationInfo['status'] }}</p>
            <p><strong>Ville:</strong> {{ $reservationInfo['ville'] }}</p>
            <p><strong>L'addresse:</strong> {{ $reservationInfo['adresse_maison'] }}</p>
        </div>
    @endif

    @if ($clientInfo)
        <h3>Client</h3>
        <div class="info-box">
            <p><strong>Nom du client:</strong> {{ $clientInfo['client_name'] }}</p>
            <p><strong>Email:</strong> {{ $clientInfo['email'] }}</p>
            <p><strong>Téléphone:</strong> {{ $clientInfo['phone'] }}</p>
        </div>
    @endif

    @if ($providerInfo)
        <h3>Prestataire</h3>
        <div class="info-box">
            <p><strong>Nom du prestataire:</strong> {{ $providerInfo['provider_name'] }}</p>
            <p><strong>Email du prestataire:</strong> {{ $providerInfo['provider_email'] }}</p>
            <p><strong>Téléphone du prestataire:</strong> {{ $providerInfo['provider_phone'] }}</p>
            <p><strong>Catégorie de service:</strong> {{ $providerInfo['service_category'] }}</p>
            <p><strong>Date de création du compte du prestataire:</strong> {{ $providerInfo['provider_created_at'] }}</p>
        </div>
    @elseif ($providerInfo === null)
        <p class="no-provider">Aucun prestataire n'est affecté à ce service</p>
    @endif
    <a href="{{ route('admin.historique') }}" class="btn btn-primary">Retour à l'historique</a>
</div>
</div>

<style>
    .reservation-details {
        font-family: Arial, sans-serif;
        background-color: #f8f9fa;
        padding: 20px;
        border-radius: 5px;
        margin-bottom: 20px;
    }

    .info-box {
        background-color: #fff;
        padding: 15px;
        border-radius: 5px;
        margin-bottom: 10px;
    }

    .info-box p {
        margin: 0;
        margin-bottom: 5px;
    }

    h2, h3 {
        color: #333;
    }

    .no-provider {
        font-style: italic;
        color: #777;
    }
</style>
