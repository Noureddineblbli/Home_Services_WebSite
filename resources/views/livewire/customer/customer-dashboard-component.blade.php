<div>
    <style>
        nav svg {
            height: 20px;
        }
        nav .hidden {
            display: block !important;
        }
    </style>
    <div class="section-title-01 honmob">
        <div class="bg_parallax image_02_parallax"></div>
        <div class="opacy_bg_02">
            <div class="container">
                <h1>
                    
                        Reservation History
                </h1>
                <div class="crumbs">
                    <ul>
                        <li><a href="/">Home</a></li>
                        <li>/</li>
                        <li>Reservations</li>
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

                                                Reservation History

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
                                                <th>Service Name</th>
                                                <th>ServiceProvider's Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Address</th>
                                                <th>Reservation Date</th>
                                                <th>Reservation Hour</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if($reservations->count() > 0)
                                                @foreach($reservations as $reservation)
                                                    <tr>
                                                        <td>{{ $reservation->service->name }}</td>
                                                        <td>{{ $reservation->serviceProvider->user->name }}</td>
                                                        <td>{{ $reservation->serviceProvider->user->email }}</td>
                                                        <td>{{ $reservation->serviceProvider->user->phone }}</td>
                                                        <td>{{ $reservation->address }}</td>
                                                        <td>{{ $reservation->date }}</td>
                                                        <td>{{ $reservation->time }}</td>

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


