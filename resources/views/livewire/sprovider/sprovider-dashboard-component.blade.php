<div>
    <style>
        nav svg{
            height: 20px;
        }
        nav .hidden{
            display: block !important;
        }
    </style>
    <div class="section-title-01 honmob">
        <div class="bg_parallax image_02_parallax"></div>
        <div class="opacy_bg_02">
            <div class="container">
                <h1>verify your offers</h1>
                <div class="crumbs">
                    <ul>
                        <li><a href="/">Home</a></li>
                        <li>/</li>
                        <li>Service Providers</li>
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
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Clinet'name</th>
                                                <th>address</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                
                                                <th>reservation date</th>
                                                <th>reservation houre</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                           @foreach($reservations as $reservation)
                                                <tr>
                                                    <td>#</td>
                                                    <td>{{$reservation->name}}</td>
                                                    <td>{{$reservation->Adresse}}</td>
                                                    <td>{{$reservation->email}}</td>
                                                    <td>{{$reservation->phone}}</td>
                                                    <td>{{$reservation->date}}</td>
                                                    <td>{{$reservation->time}}</td>
                    
                                                    <td>
                                                        <button wire:click="verifyReservation({{ $reservation->id }})">Verify</button>
                                                        <button href="#"  style="margin-left: 10px"><i class="fa fa-times fa-2x text-danger"></i></button>
                                                    </td>
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


