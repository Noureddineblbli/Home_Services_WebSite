<div>

    <h1>Informations sur le fournisseur de services</h1>

    <div class="panel panel-default" style="font-weight: 600;">
        <div class="panel-heading">
            <div class="row">
                <div class="col-md-6">
                    Profil
                </div>
                <div class="col-md-6">

                </div>
            </div>
        </div>
        <div class="panel-body">
            <div class="row">
                
                <div class="col-md-8">
                    <h3>Nom : {{ $PendingSprovider->user->name }}</h3>
                    <p>{{ $PendingSprovider->about }}</p>
                    <p><b>Email : </b>{{ $PendingSprovider->user->email }}</p>
                    <p><b>Téléphone : </b>{{ $PendingSprovider->user->phone }}</p>
                    <p><b>Ville : </b>{{ $PendingSprovider->user->city }}</p>
                    <p><b>Catégorie de service : </b>
                        @if ($PendingSprovider->service_category_id)
                        {{ $PendingSprovider->category->name }}
                        @endif
                    </p>
                    <p><b>Lieux de service : </b>{{ $PendingSprovider->user->address }}</p>
                    @if ($PendingSprovider->cv)
                        <p><a href="{{ asset('images/sproviders/CV/' . $PendingSprovider->cv) }}" target="_blank">Voir le CV</a></p>
                    @endif

                    <!-- Afficher le lien du diplôme s'il existe -->
                    @if ($PendingSprovider->diploma)
                        <p><a href="{{ asset('images/sproviders/DIPLOMA/' . $PendingSprovider->diploma) }}" target="_blank">Voir le diplôme</a></p>
                    @endif
                    <button class="btn btn-success" style="margin-right: 10px;" wire:click="acceptConfirmation({{ $PendingSprovider->id }})">Accepter</button>
                    <button class="btn btn-danger" wire:click="rejectConfirmation({{ $PendingSprovider->id }})">Refuser</button>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .btn {
        padding: 10px 20px;
        font-size: 16px;
        font-weight: bold;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s, transform 0.2s;
    }

    .btn-success {
        background-color: #28a745;
        color: white;
    }

    .btn-success:hover {
        background-color: #218838;
        transform: scale(1.05);
    }

    .btn-danger {
        background-color: #dc3545;
        color: white;
    }

    .btn-danger:hover {
        background-color: #c82333;
        transform: scale(1.05);
    }
</style>
