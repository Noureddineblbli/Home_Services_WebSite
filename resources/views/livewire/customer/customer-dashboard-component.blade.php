<div>
    <style>
        nav svg {
            height: 20px;
        }
        nav .hidden {
            display: block !important;
        }
        .Sprovider {
            cursor: pointer;
            position: relative;
        }

        .Sprovider:hover {
            background-color: #f0f0f0; /* Change background color on hover */
        }

        .Sprovider .view-details {
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

        .Sprovider:hover .view-details {
            display: block; 
        }

    </style>
    <div class="section-title-01 honmob">
        <div class="bg_parallax image_02_parallax"></div>
        <div class="opacy_bg_02">
            <div class="container">
                <h1>
                    Historique des réservations
                </h1>
                <div class="crumbs">
                    <ul>
                        <li><a href="/">Accueil</a></li>
                        <li>/</li>
                        <li>Réservations</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <section class="content-central">
        <div class="content_info">
            <div class="paddings-mini">
                <div class="container">
                   
                    <div class="row portfolioContainer">
                        <div class="col-md-12 profile1">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-md-6">
                                                Historique des réservations
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
                                                <th>Le nom du service</th> 
                                                <th>L'dresse du réservation</th>
                                                <th>LA date du réservation </th>
                                                <th>Le temps du réservation</th>
                                                <th>Le prestataire de service</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if($reservations->count() > 0)
                                                @foreach($reservations as $reservation)
                                                    <tr>
                                                        <td>{{ $reservation->service->name }}</td>
                                                        <td>{{ $reservation->address }}</td>
                                                        <td>{{ $reservation->date }}</td>
                                                        <td>{{ $reservation->time }}</td>
                                                        @if($reservation->serviceProvider)
                                                            <td class="Sprovider" onclick="window.location.href='{{ route('customer.dashboard.SproviderDétails', ['SproviderId' => $reservation->serviceProvider->id]) }}'"><p class="view-details">View Details</p>{{ $reservation->serviceProvider->user->name }}</td>
                                                        @else
                                                            <td>Aucun prestataire n'est affecté à ce service</td>
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
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
    function deleteRow(rowId) {
        // Remove the row from the table
        $('#row_' + rowId).remove();
    }
</script>


