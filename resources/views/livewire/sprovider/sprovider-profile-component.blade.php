<div>

                <h1>Profil</h1>

                            <div class="panel panel-default" style="font-weight: 600;">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-md-6">
                                            Profil
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
                                            <h3>Nom : {{ Auth::user()->name }}</h3>
                                            <p>{{ $sprovider->about }}</p>
                                            <p><b>E-mail : </b>{{ Auth::user()->email }}</p>
                                            <p><b>Téléphone : </b>{{ Auth::user()->phone }}</p>
                                            <p><b>Ville : </b>{{ Auth::user()->city }}</p>
                                            <p><b>Catégorie de services : </b>
                                                @if ($sprovider->service_category_id)
                                                {{ $sprovider->category->name }}
                                                @endif
                                            </p>
                                            <p><b>Adresse : </b>{{ Auth::user()->address }}</p>
                                            <p><b>Note moyenne : </b>
                                                <a href="{{ route('sprovider.reviews', $sprovider->id) }}">{{ number_format($averageRating, 2) }} ★</a>
                                            </p>
                                            <a href="{{ route('sprovider.edit_profile') }}" class="btn btn-info pull-right">Editer le profil</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                       
</div>
