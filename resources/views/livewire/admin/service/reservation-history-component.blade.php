<div>
    <style>
        nav svg{
            height: 20px;
        }
        nav .hidden{
            display: block !important;
        }
    </style>

                <h1>Historique des Réservations</h1>


                            <div class="panel panel-default" style="font-weight: 600;">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-md-6">
                                            All Réservations
                                        </div>
                                        <div class="col-md-6">

                                        </div>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Nom de service</th>
                                                <th>Nom du client</th>
                                                <th>Date de réservations</th>
                                                <th>L'heure de Réservations</th>
                                                <th>Date de Création</th>
                                                <th>status</th>
                                                <th>Details</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($reservations as $reservation) 
                                                <tr>
                                                    <td>{{$reservation->service_name}}</td>
                                                    <td>{{$reservation->client_name}}</td>
                                                    <td>{{$reservation->date}}</td>
                                                    <td>{{$reservation->time}}</td>
                                                    <td>{{$reservation->created_at}}</td>
                                                    <td>{{$reservation->status}}</td>
                                                    <td><button wire:click="showReservationDetails({{ $reservation->id }})" class="btn btn-success">Voir Détails</button>
                                                    </td>                                           
                                             @endforeach
                                        </tbody>
                                    </table>
                                  
                                </div>
                            </div>
                        
</div>


