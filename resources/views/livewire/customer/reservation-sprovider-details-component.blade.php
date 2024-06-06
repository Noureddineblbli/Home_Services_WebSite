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
                <h1>Réservations</h1>
                <div class="crumbs">
                    <ul>
                        <li><a href="/">Accueil</a></li>
                        <li>/</li>
                        <li>Réservations</li>
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
                                            Profil
                                        </div>
                                        <div class="col-md-6"></div>
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
                                            <p><b>Catégorie de service : </b>
                                                @if ($sprovider->service_category_id)
                                                    {{ $sprovider->category->name }}
                                                @endif
                                            </p>
                                            <p><b>Lieux de service : </b>{{ $sprovider->user->address }}</p>
                                            <p><b>About : </b>{{ $sprovider->about }}</p>
                                            @if ($sprovider->cv)
                                                <p><a href="{{ asset('images/sproviders/CV/' . $sprovider->cv) }}" target="_blank">Voir le CV</a></p>
                                            @endif
                                            @if ($sprovider->diploma)
                                                <p><a href="{{ asset('images/sproviders/DIPLOMA/' . $sprovider->diploma) }}" target="_blank">Voir le diplôme</a></p>
                                            @endif
                                        </div>
                                    </div>
                                    <!-- Formulaire d'ajout de commentaire -->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h3>Laissez un commentaire</h3>
                                            <form wire:submit.prevent="submitReview">
                                                <div class="form-group">
                                                    <label for="rating">Évaluation :</label>
                                                    <select id="rating" wire:model="rating" class="form-control">
                                                        <option value="">Sélectionnez une note</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                    </select>
                                                    @error('rating')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="comment">Commentaire :</label>
                                                    <textarea id="comment" wire:model="comment" class="form-control" rows="4"></textarea>
                                                    @error('comment')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <button type="submit" class="btn btn-primary">Soumettre</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    window.addEventListener('swal:reservationCreated', event => {
        Swal.fire({
            title: event.detail.title,
            text: event.detail.text,
            icon: event.detail.icon,
            confirmButtonText: 'OK',
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.reload(); // Rafraîchir la page
            }
        });
    });
</script>
