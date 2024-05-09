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
                                        
                                        <div class="col-md-8">
                                            <h3>Name : {{ $PendingSprovider->user->name }}</h3>
                                            <p>{{ $PendingSprovider->about }}</p>
                                            <p><b>Email : </b>{{ $PendingSprovider->user->email }}</p>
                                            <p><b>Phone : </b>{{ $PendingSprovider->user->phone }}</p>
                                            <p><b>City : </b>{{ $PendingSprovider->city }}</p>
                                            <p><b>Service Category : </b>
                                                @if ($PendingSprovider->service_category_id)
                                                {{ $PendingSprovider->category->name }}
                                                @endif
                                            </p>
                                            <p><b>Service Locations : </b>{{ $PendingSprovider->service_location }}</p>
                                            @if ($PendingSprovider->cv)
                                                <p><a href="{{ asset('images/sproviders/CV/' . $PendingSprovider->cv) }}" target="_blank">View CV</a></p>
                                            @endif

                                            <!-- Display diploma link if diploma exists -->
                                            @if ($PendingSprovider->diploma)
                                                <p><a href="{{ asset('images/sproviders/DIPLOMA/' . $PendingSprovider->diploma) }}" target="_blank">View Diploma</a></p>
                                            @endif
                                            <button wire:click="verifyServiceProvider({{ $PendingSprovider->id }})">Verify</button>
                                            <button href="#" onclick="confirm('Are you sure, You want to delete this service?') || event.stopImmediatePropagation();" wire:click.prevent="rejectServiceProvider({{ $PendingSprovider->id }})" style="margin-left: 10px"><i class="fa fa-times fa-2x text-danger"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
</div>


