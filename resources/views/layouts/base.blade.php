<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Surf Service - Online Service Provider for your House Needs</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ asset('assets/img/favicon.png') }}">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" media="screen">
    <link href="{{ asset('assets/css/chblue.css') }}" rel="stylesheet" media="screen">
    <link href="{{ asset('assets/css/theme-responsive.css') }}" rel="stylesheet" media="screen">
    <link href="{{ asset('assets/css/dtb/jquery.dataTables.min.css') }}" rel="stylesheet" media="screen">
    <link href="{{ asset('assets/css/select2.min.css') }}" rel="stylesheet" media="screen">
    <link href="{{ asset('assets/css/toastr.min.css') }}" rel="stylesheet" media="screen">
    <script type="text/javascript" src="{{ asset('assets/js/jquery.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/jquery-ui.1.10.4.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/toastr.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/modernizr.js') }}"></script>
    @livewireStyles
</head>
<body>
    <div id="layout">
        <header id="header" class="header-v3">
            <nav class="flat-mega-menu">
                <label for="mobile-button"> <i class="fa fa-bars"></i></label>
                <input id="mobile-button" type="checkbox">

                <ul class="collapse">
                    <li class="title">
                        <a href="/"><img src="{{ asset('images/logo.png') }}" style="width: 100px;"></a>
                    </li>
                    <li style="float: left;"> 
                        <a href="{{ route('home.service_categories') }}"><strong>Catégories de services</strong></a>
                    </li>
                    
                    @if (Route::has('login'))
                        @auth
                            @if (Auth::user()->utype==='ADM')
                                <li class="login-form"><a href="#" title="Mon compte (Admin)">Mon compte (Admin)</a>
                                    <ul class="drop-down one-column hover-fade">
                                        <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                                        <li><a  href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Se déconnecter</a></li>
                                    </ul>
                                </li>
                            @elseif(Auth::user()->utype==='SVP')
                            <li class="login-form"><a href="#" title="Mon compte (Prestataire)">Mon compte (Prestataire)</a>
                                <ul class="drop-down one-column hover-fade">
                                    <li><a href="{{ route('sprovider.dashboard',['id' => Auth::user()->id]) }}">Dashboard</a></li>
                                    <li><a href="{{ route('sprovider.profile') }}">My Profile</a></li>
                                    <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Se déconnecter</a></li>
                                </ul>
                            </li>
                            @else
                            <li class="login-form"><a href="#" title="Mon compte (Client)">Mon compte (Client)</a>
                                <ul class="drop-down one-column hover-fade">
                                    <li><a href="{{ route('customer.dashboard') }}">Dashboard</a></li>
                                    <li><a  href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Se déconnecter</a></li>
                                </ul>
                            </li>
                            @endif
                        <form id="logout-form" method="POST" action="{{ route('logout') }}" style="display: none">
                            @csrf
                        </form>
                        @else
                            <li class="login-form"> <a href="{{ route('register') }}" title="Register">S'inscrire</a></li>
                            <li class="login-form"> <a href="{{ route('login') }}" title="Login">Se connecter</a></li>
                        @endif
                    @endif

                    
                </ul>
            </nav>
        </header>
        {{ $slot }}
        <footer id="footer" class="footer-v1">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-xs-6 col-sm-6">
                        <h3>CONTACTEZ-NOUS</h3>
                        <ul class="contact_footer">
                            <li class="location"><i class="fa fa-map-marker"></i> Bensouda, Fes, Morroco</li>
                            <li><i class="fa fa-envelope"></i> ahntateridwane@gmail.com</li>
                            <li><i class="fa fa-headphones"></i> +212-658619374</li>
                        </ul>
                    </div>
                    <div class="col-md-3 col-xs-6 col-sm-6">
                        <h3>LIENS RAPIDES</h3>
                        <ul class="quick-links">
                            <li><a href="{{ route('home.service_categories') }}">Catégories de services</a></li>
                            <li><a href="{{ route('register') }}">S'inscrire</a></li>
                            <li><a href="{{ route('login') }}">Se connecter</a></li>
                            
                        </ul>
                    </div>
                    <div class="col-md-3 col-xs-6 col-sm-6">
                        <h3>Catégories de services</h3>
                        <ul class="customer-support">
                            <li><a href="{{ route('home.services_by_category', ['category_slug' => "Climatisation"]) }}">Climatisation</a></li>
                            <li><a href="{{ route('home.services_by_category', ['category_slug' => "Plomberie"]) }}">Plomberie</a></li>
                            <li><a href="{{ route('home.services_by_category', ['category_slug' => "électrique"]) }}">électrique</a></li>
                            
                        </ul>
                    </div>
                    <div class="col-md-3 col-xs-6 col-sm-6">
                        <h3>SUIVEZ-NOUS</h3>
                        <ul class="social">
                            <li><a href="#"><i class="fa fa-facebook"></i> Facebook</a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i> Twitter</a></li>
                            <li><a href="#"><i class="fa fa-instagram"></i> Instagram</a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i> LinkedIn</a></li>
                        </ul>
                    </div>
                </div>
                <div class="footer-down">
                    <div class="row">
                        <div class="text-center">
                            <p>&copy; 2024 ServiceNet. Tous droits réservés.</p>
                        </div>
                    </div>
                </div>
            </div>
            <style>
                .footer-v1 {
                    background-color: #333;
                    color: #fff;
                    padding: 20px 0;
                }
                .footer-v1 h3 {
                    margin-top: 0;
                    margin-bottom: 20px;
                    color: #fff;
                }
                .footer-v1 ul {
                    list-style: none;
                    padding: 0;
                }
                .footer-v1 ul li {
                    margin-bottom: 10px;
                }
                .footer-v1 ul li a {
                    color: #fff;
                    text-decoration: none;
                }
                .footer-v1 ul li a:hover {
                    text-decoration: underline;
                }
                .footer-v1 .contact_footer i, .footer-v1 .social i {
                    margin-right: 10px;
                }
                .footer-v1 .social li {
                    display: inline-block;
                    margin-right: 10px;
                }
                .footer-v1 .footer-down {
                    border-top: 1px solid #444;
                    padding-top: 10px;
                    margin-top: 20px;
                }
                .footer-v1 .footer-down .nav-footer {
                    list-style: none;
                    padding: 0;
                }
                .footer-v1 .footer-down .nav-footer li {
                    display: inline;
                    margin-right: 15px;
                }
                .footer-v1 .footer-down .nav-footer li a {
                    color: #fff;
                    text-decoration: none;
                }
                .footer-v1 .footer-down .nav-footer li a:hover {
                    text-decoration: underline;
                }
            </style>
        </footer>
    </div>
    <script type="text/javascript" src="{{ asset('assets/js/nav/jquery.sticky.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/totop/jquery.ui.totop.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/accordion/accordion.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/rs-plugin/js/jquery.themepunch.tools.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/rs-plugin/js/jquery.themepunch.revolution.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/maps/gmap3.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/fancybox/jquery.fancybox.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/carousel/carousel.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/filters/jquery.isotope.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/twitter/jquery.tweet.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/flickr/jflickrfeed.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/theme-options/theme-options.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/theme-options/jquery.cookies.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/bootstrap/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/bootstrap/bootstrap-slider.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/dtb/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/dtb/jquery.table2excel.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/dtb/script.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/select2.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/jquery.validate.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/validation-rule.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/bootstrap3-typeahead.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/main.js') }}"></script>
    <script type="text/javascript">
        jQuery(document).ready(function () {
            jQuery('.tp-banner').show().revolution({
                dottedOverlay: "none",
                delay: 5000,
                startwidth: 1170,
                startheight: 480,
                minHeight: 250,
                navigationType: "none",
                navigationArrows: "solo",
                navigationStyle: "preview1"
            });
        });
    </script>
    @stack('scripts')
    @livewireScripts
</body>
</html>
