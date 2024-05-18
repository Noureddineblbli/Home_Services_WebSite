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
                    @if($showHistory)
                        Reservation History
                    @else
                        Verify Your Offers
                    @endif
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
                                            @if($showHistory)
                                                Reservation History
                                            @else
                                                Pending reservations
                                            @endif
                                        </div>
                                        <div class="col-md-6">
                                            <button wire:click="toggleShowHistory()" class="btn btn-primary">
                                                @if($showHistory)
                                                    Show Pending Reservations
                                                @else
                                                    Show Reservation History
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
                                                <th>#</th>
                                                <th>Service Name</th>
                                                <th>Client's Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Address</th>
                                                <th>Reservation Date</th>
                                                <th>Reservation Hour</th>
                                                @if(!$showHistory)
                                                    <th>Action</th>
                                                @endif
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($reservations as $key => $reservation)
                                            <tr id="row_{{ $key }}">
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $reservation->serviceName }}</td>
                                                <td>{{ $reservation->name }}</td>
<<<<<<< HEAD
=======
                                                <td>{{ $reservation->adresse_maison }}</td>
>>>>>>> 140e004676f533b88c78901482071f2c9e727b3a
                                                <td>{{ $reservation->email }}</td>
                                                <td>{{ $reservation->phone }}</td>
                                                <td>{{ $reservation->address }}</td>
                                                <td>{{ $reservation->date }}</td>
                                                <td>{{ $reservation->time }}</td>
                                                @if(!$showHistory)
                                                    <td>
                                                        <button wire:click="verifyReservation({{ $reservation->id}})">Verify</button>
                                                        <button wire:click="rejeter({{ $reservation->id }}, {{ $sprovider_id }})" style="margin-left: 10px"><i class="fa fa-times fa-2x text-danger"></i></button>
                                                    </td>
                                                @endif
                                            </tr>
                                            @endforeach
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


