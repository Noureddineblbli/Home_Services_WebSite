<div>

                <h1>Service provider infos</h1>

                            <div class="panel panel-default" style="font-weight: 600;">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-md-6">
                                            Profile
                                        </div>
                                        <div class="col-md-6">

                                        </div>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            @if ($sprovider->image)
                                                <img src="{{ asset('images/sproviders') }}/{{ $sprovider->image }}" width="100%" />
                                            @else
                                                <img src="{{ asset('images/sproviders/default.png') }}" width="100%" />
                                            @endif
                                        </div>
                                        <div class="col-md-8">
                                            <h3>Name : {{ $sprovider->user->name }}</h3>
                                            <p>{{ $sprovider->about }}</p>
                                            <p><b>Email : </b>{{ $sprovider->user->email }}</p>
                                            <p><b>Phone : </b>{{ $sprovider->user->phone }}</p>
                                            <p><b>City : </b>{{ $sprovider->user->city }}</p>
                                            <p><b>Service Category : </b>
                                                @if ($sprovider->service_category_id)
                                                {{ $sprovider->category->name }}
                                                @endif
                                            </p>
                                            <p><b>Service Locations : </b>{{ $sprovider->user->address }}</p>
                                            @if ($sprovider->cv)
                                                <p><a href="{{ asset('images/sproviders/CV/' . $sprovider->cv) }}" target="_blank">View CV</a></p>
                                            @endif

                                            <!-- Display diploma link if diploma exists -->
                                            @if ($sprovider->diploma)
                                                <p><a href="{{ asset('images/sproviders/DIPLOMA/' . $sprovider->diploma) }}" target="_blank">View Diploma</a></p>
                                            @endif
                                            @if($sprovider->Activation == 1)
                                                <a href='#' wire:click.prevent="disableAccount({{$sprovider->id}})" class="btn btn-info pull-right">Désactiver compte</a>
                                            @else
                                                <a href='#' wire:click.prevent="inableAccount({{$sprovider->id}})" class="btn btn-info pull-right">Activer compte</a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
</div>

