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
            display: block; /* Display "view details" message on row hover */
        }
    </style>


    <h1>Pending Service Providers</h1>

    <div class="panel panel-default" style="font-weight: 600;">
        <div class="panel-heading">
            <div class="row">
                <div class="col-md-6">
                    Pending Service Providers
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
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>City</th>
                        <th>Service Category</th>
                        <th>Service Locations</th>
                        
                    </tr>
                </thead>
                <tbody class="text-black">
                    @foreach ($PendingSProviders as $PendingSProvider)
                        <tr onclick="window.location.href='{{ route('admin.Pending_service_provider.details', ['PendingSprovider_id' => $PendingSProvider->id]) }}'">
                            <td>{{ $PendingSProvider->user->name }}</td>
                            <td>{{ $PendingSProvider->user->email }}</td>
                            <td>{{ $PendingSProvider->user->phone }}</td>
                            <td>{{ $PendingSProvider->user->city }}</td>
                            <td>{{ $PendingSProvider->category->name }}</td>
                            <td>{{ $PendingSProvider->user->address }}</td>
                            <td class="view-details">View Details</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
                        

</div>
