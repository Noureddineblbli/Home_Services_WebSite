<div>
    <style>
        nav svg {
            height: 20px;
        }

        nav .hidden {
            display: block !important;
        }

        .table-bordered tbody tr {
            cursor: pointer;
            position: relative;
        }

        .table-bordered tbody tr:hover {
            background-color: #f0f0f0; /* Changer la couleur de fond au survol */
        }

        .table-bordered tbody tr .view-details {
            display: none; /* Masquer le message "voir les détails" par défaut */
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
            display: block; /* Afficher le message "voir les détails" au survol de la ligne */
        }
    </style>

    <h1>Prestataires de Services en Attente</h1>

    <div class="panel panel-default" style="font-weight: 600;">
        <div class="panel-heading">
            <div class="row">
                <div class="col-md-6">
                    Prestataires de Services en Attente
                </div>
                <div class="col-md-6">

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
                        <th>Nom</th>
                        <th>Email</th>
                        <th>Téléphone</th>
                        <th>Ville</th>
                        <th>Catégorie de Services</th>
                        <th>Locations de Services</th>
                    </tr>
                </thead>
                <tbody class="text-black">
                    @if($PendingSProviders->count() > 0)
                        @foreach ($PendingSProviders as $PendingSProvider)
                            <tr onclick="window.location.href='{{ route('admin.Pending_service_provider.details', ['PendingSprovider_id' => $PendingSProvider->id]) }}'">
                                <td>{{ $PendingSProvider->user->name }}</td>
                                <td>{{ $PendingSProvider->user->email }}</td>
                                <td>{{ $PendingSProvider->user->phone }}</td>
                                <td>{{ $PendingSProvider->user->city }}</td>
                                <td>{{ $PendingSProvider->category->name }}</td>
                                <td>{{ $PendingSProvider->user->address }}</td>
                                <td class="view-details">Voir les Détails</td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="9" class="text-center" style="color:red;"><strong>Aucun prestataire disponible.</strong></td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
