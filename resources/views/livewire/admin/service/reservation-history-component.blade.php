<div>
    <style>
        nav svg{
            height: 20px;
        }
        nav .hidden{
            display: block !important;
        }
        .table-bordered tbody tr {
            cursor: pointer;
            position: relative;
        }

        .table-bordered tbody tr:hover {
            background-color: #f0f0f0; /* Change background color on hover */
        }

        .table-bordered tbody tr .view-details {
            display: none; /* Hide "view details" message by default */
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            background-color: rgba(0, 0, 0, 0.7);
            color: #fff;
            padding: 5px 10px;
            border-radius: 5px;
        }

        .table-bordered tbody tr:hover .view-details {
            display: block; 
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
                                                

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($reservations as $reservation) 
                                            <tr wire:click="showReservationDetails({{ $reservation->id }})">
                                                    <td>{{$reservation->service_name}}</td>
                                                    <td>{{$reservation->client_name}}</td>
                                                    <td>{{$reservation->date}}</td>
                                                    <td>{{$reservation->time}}</td>
                                                    <td>{{$reservation->created_at}}</td>
                                                    <td>{{$reservation->status}}</td>
                                                    <td class="view-details">Voir détails</td>                                          
                                             @endforeach
                                        </tbody>
                                    </table>
                                  
                                </div>
                            </div>
                        
</div>


