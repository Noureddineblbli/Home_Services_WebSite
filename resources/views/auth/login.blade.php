<x-base-layout>

    <div class="section-title-01 honmob">
        <div class="bg_parallax image_02_parallax"></div>
        <div class="opacy_bg_02">
            <div class="container">
                <h1>Connexion</h1>
                <div class="crumbs">
                    <ul>
                        <li><a href="/">Accueil</a></li>
                        <li>/</li>
                        <li>Connexion</li>
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
                        <div class="col-xs-12 col-sm-3 col-md-3 profile1">
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 profile1" style="min-height: 300px;">
                            <div class="thinborder-ontop">
                                <h3>Informations de connexion</h3>
                                <x-jet-validation-errors class="mb-4" style="color:red;" />
                                <form id="userloginform" method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="form-group row">
                                        <label for="email" class="col-sm-4 col-form-label text-md-right">Adresse e-mail</label>
                                        <div class="col-md-6">
                                            <input id="email" type="email" class="form-control" name="email" :value="old('email')" required="" autofocus="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="password"
                                            class="col-md-4 col-form-label text-md-right">Mot de passe</label>
                                        <div class="col-md-6">
                                            <input id="password" type="password" class="form-control" name="password" required="" autocomplete="current-password">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-primary pull-right">Se connecter</button>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0">
                                        <div class="col-md-10">
                                            <a class="" href="{{ route('password.request') }}">Mot de passe oublié?</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-3 col-md-3 profile1">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </section>

</x-base-layout>
