<div>
    <style>
        .review {
            border: 1px solid #ddd;
            padding: 15px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .review p {
            margin: 0 0 10px;
        }

        .review .text-muted {
            font-size: 0.9em;
        }
        .material-icons-outlined.star {
            color: #252C2E;
        }

        .material-icons-outlined.empty-star {
            color: #252C2E;
        }
    </style>

    <h1>Informations sur le fournisseur de services</h1>

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
                    <h3>Nom : {{ $sprovider->user->name }}</h3>
                    <p>{{ $sprovider->about }}</p>
                    <p><b>Email : </b>{{ $sprovider->user->email }}</p>
                    <p><b>Téléphone : </b>{{ $sprovider->user->phone }}</p>
                    <p><b>Ville : </b>{{ $sprovider->user->city }}</p>
                    <p><b>Catégorie de Service : </b>
                        @if ($sprovider->service_category_id)
                        {{ $sprovider->category->name }}
                        @endif
                    </p>
                    <p><b>Lieux de Service : </b>{{ $sprovider->user->address }}</p>
                    @if ($sprovider->cv)
                        <p><a href="{{ asset('images/sproviders/CV/' . $sprovider->cv) }}" target="_blank">Voir CV</a></p>
                    @endif

                    <!-- Afficher le lien vers le diplôme s'il existe -->
                    @if ($sprovider->diploma)
                        <p><a href="{{ asset('images/sproviders/DIPLOMA/' . $sprovider->diploma) }}" target="_blank">Voir Diplôme</a></p>
                    @endif
                    @if($sprovider->Activation == 1)
                        <a href='#' wire:click="DisableConfirmation({{$sprovider->id}})" class="btn btn-info pull-right">Désactiver compte</a>
                    @else
                        <a href='#' wire:click="EnableConfirmation({{$sprovider->id}})" class="btn btn-info pull-right">Activer compte</a>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h3>Avis</h3>
                    @if($sprovider->reviews->isEmpty())
                        <p style="color: red;">Aucun avis n'a été publié pour le moment!!</p>
                    @else
                        @foreach ($sprovider->reviews as $review)
                            <div class="review card mb-3" style="background-color:#FFEC9E;">
                                <div class="card-body">
                                    <p class="mb-1"><strong>Évaluation:</strong>
                                        @for ($i = 0; $i < 5; $i++)
                                            <span class="material-icons-outlined {{ $i < $review->rating ? 'star' : 'empty-star' }}">
                                                {{ $i < $review->rating ? 'star' : 'star_outline' }}
                                            </span>
                                        @endfor
                                        ({{ $review->rating }}/5)
                                    </p>
                                    <p>{{ $review->comment }}</p>
                                    <p class="text-muted"><small>Par {{ $review->user->name }} le {{ $review->created_at->format('d M Y') }}</small></p>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
            
        </div>
    </div>
</div>
