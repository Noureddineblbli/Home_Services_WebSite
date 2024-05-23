<div>
    <div class="section-title-01 honmob">
        <div class="bg_parallax image_01_parallax"></div>
        <div class="opacy_bg_02">
            <div class="container">
                <h1>{{ $service->name }}</h1>
                <div class="crumbs">
                    <ul>
                        <li><a href="/">Accueil</a></li>
                        <li>/</li>
                        <li>{{ $service->name }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <section class="content-central">
        <div class="content_info">
            <div class="paddings-mini">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 single-blog">
                            <div class="post-item">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="post-header">
                                            <div class="post-info-wrap">
                                                <h2 class="post-title"><strong>{{ $service->name }}</strong></h2>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div id="single-carousel">
                                            <div class="img-hover">
                                                <img src="{{ asset('images/services') }}/{{ $service->image }}" alt="{{ $service->name }}"
                                                    class="img-responsive">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="post-content">
                                            <h3>{{ $service->name }}</h3>
                                            <p>{{ $service->description }}</p>              
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <aside class="widget" style="margin-top: 18px;">
                                <div class="panel panel-default">
                                    <div class="panel-heading">Les détails de réservation</div>
                                    <div class="panel-body">
                                        <table class="table">
                                            <tr>
                                                <td style="border-top: none;">Prix</td>
                                                <td style="border-top: none;"><span>&#36;</span> {{ $service->price }}</td>
                                            </tr>

                                            <tr>
                                                <td>Total</td>
                                                <td><span>&#36;</span> {{ $service->price }}</td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="panel-footer">
                                        <form action="{{route('reservationForm',['service_id' => $service->id])}}"> 
                                            <input type="submit" class="btn btn-primary" name="submit"
                                                value="Réservez">
                                        </form>
                                    </div>
                                </div>
                            </aside>
                            <aside>
                                @if ($r_service)
                                    <h3>Service connexe</h3>
                                    <div class="col-md-12 col-sm-6 col-xs-12 bg-dark color-white padding-top-mini"
                                        style="max-width: 360px">
                                        
                                            <div class="img-hover">
                                                <img src="{{ asset('images/services/thumbnails') }}/{{ $r_service->image }}" alt="{{ $r_service->name }}"
                                                    class="img-responsive" style="width: 100%;height:200px;">
                                            </div>
                                            <div class="info-gallery" style="height:200px;">
                                                <h3>
                                                    {{ $r_service->name }}
                                                </h3>
                                                <hr class="separator">
                                                <p>{{ $r_service->name }}</p>
                                                <div class="content-btn"><a href="{{ route('home.service_details', ['service_slug' => $r_service->slug]) }}"
                                                        class="btn btn-warning">Voir les détails</a></div>
                                                <div class="price"><span>&#36;</span><b>Depuis</b>{{ $r_service->price }}</div>
                                            </div>
                                        
                                    </div>
                                @endif
                            </aside>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
