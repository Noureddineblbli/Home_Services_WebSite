<div>
    <style>
        nav svg {
            height: 20px;
        }
        nav .hidden {
            display: block !important;
        }
    </style>
    <h1>
        @if($showHistory)
            Historique des réservations
        @else
            Vérifiez vos offres
        @endif
    </h1>
    <div class="panel panel-default" style="font-weight: 600;">
        <div class="panel-heading">
            <div class="row">
                <div class="col-md-6">
                    @if($showHistory)
                        Historique des réservations
                    @else
                        Réservations en attente
                    @endif
                </div>
                <div class="col-md-6">
                    <button wire:click="toggleShowHistory()" class="btn btn-info pull-right">
                        @if($showHistory)
                            Afficher les réservations en attente
                        @else
                            Afficher l'historique des réservations
                        @endif
                    </button>
                </div>
            </div>
        </div>
        <div class="panel-body">
            @if (Session::has('message'))
            <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
            @endif
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nom du service</th>
                        <th>Nom du client</th>
                        <th>E-mail</th>
                        <th>Téléphone</th>
                        <th>Adresse</th>
                        <th>Date de réservation</th>
                        <th>Heure de réservation</th>
                        @if(!$showHistory)
                            <th>Action</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @if($reservations->count() > 0)
                        @foreach($reservations as $key => $reservation)
                            <tr id="row_{{ $key }}">
                                
                                <td>{{ $reservation->serviceName }}</td>
                                <td>{{ $reservation->name }}</td>
                                <td>{{ $reservation->email }}</td>
                                <td>{{ $reservation->phone }}</td>
                                <td>{{ $reservation->address }}</td>
                                <td>{{ $reservation->date }}</td>
                                <td>{{ $reservation->time }}</td>
                                @if(!$showHistory)
                                    <td>
                                        <button class="btn btn-success btn-sm" wire:click="AcceptReservation({{ $reservation->id }})">Accepter</button>
                                        <button class="btn btn-danger btn-sm" wire:click="RejectReservation({{ $reservation->id }}, {{ $sprovider_id }})" style="margin: 5px">Rejeter</button>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="9" class="text-center" style="color:red;"><strong>Aucune réservation disponible.</strong></td>
                        </tr>
                    @endif
                </tbody>
            </table>

            
        </div>
    </div>
                        
    
</div>

<script>
    function deleteRow(rowId) {
        $('#row_' + rowId).remove();
    }
</script>


