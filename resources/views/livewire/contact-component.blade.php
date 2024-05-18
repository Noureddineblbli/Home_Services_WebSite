<div>
    <div class="section-title-01 honmob">
        <div class="bg_parallax image_02_parallax"></div>
        <div class="opacy_bg_02">
            <div class="container">
                <h1>CONTACTEZ-NOUS</h1>
                <div class="crumbs">
                    <ul>
                        <li><a href="/">Acceuil</a></li>
                        <li>/</li>
                        <li>CONTACTEZ-NOUS</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="content-central">
        
        <div class="content_info">
            <div class="paddings-mini">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <aside>
                                <h4>Le bureau</h4>
                                <address>
                                    <strong>ServiceNet</strong><br>
                                    <i class="fa fa-map-marker"></i><strong>Adresse: </strong>Bensouda, Fes, Morroco<br>
                                    <i class="fa fa-phone"></i><strong>Téléphone: </strong> +212-658619374 <br>                             
                                    <i class="fa fa-envelope"></i><strong>Email:</strong><a
                                        href="mailto:ahntateridwane@gmail.com"> ahntateridwane@gmail.com</a><br>                               
                                </address>
                            </aside>
                            <hr class="tall">
                        </div>
                        <div class="col-md-8">
                            <h3>Formulaire de contact</h3>
                            <p class="lead">
                            </p>
                            @if (Session::has('message'))
                                <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                            @endif
                            <form id="contactform" class="form-theme" wire:submit.prevent='sendMessage'>
                                <input type="text" placeholder="Nom" name="name" id="name" required=""wire:model="name">
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <input type="email" placeholder="Email" name="email" id="email" required=""wire:model="email">
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <input type="text" placeholder="Telephone" name="phone" id="phone" required=""wire:model="phone">
                                @error('phone')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <textarea placeholder="Votre Message" name="message" id="message" required=""wire:model="message"></textarea>
                                @error('message')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <input type="submit" name="Submit" value="Envoyer le message" class="btn btn-primary">
                            </form>
                            <div id="result"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="section-twitter content_resalt border-top">
            <i class="fa fa-twitter icon-big"></i>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="text-center">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
