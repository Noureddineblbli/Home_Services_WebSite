<div>

                <h1>Profile</h1>

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
                                            <h3>Name : {{ Auth::user()->name }}</h3>
                                            <p>{{ $sprovider->about }}</p>
                                            <p><b>Email : </b>{{ Auth::user()->email }}</p>
                                            <p><b>Phone : </b>{{ Auth::user()->phone }}</p>
                                            <p><b>City : </b>{{ Auth::user()->city }}</p>
                                            <p><b>Service Category : </b>
                                                @if ($sprovider->service_category_id)
                                                {{ $sprovider->category->name }}
                                                @endif
                                            </p>
                                            <p><b>Service Locations : </b>{{ Auth::user()->address }}</p>
                                            <a href="{{ route('sprovider.edit_profile') }}" class="btn btn-info pull-right">Edit Profile</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                       
</div>
