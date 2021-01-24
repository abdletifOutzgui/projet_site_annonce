<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield("title","Mon STAGE")</title>

        <link rel="stylesheet" href="{{ asset("css/app.css") }}">
        <link rel="stylesheet" href="{{ asset("css/form.css") }}">
        <link rel="stylesheet" href="{{ asset("css/acceuil.css") }}">

        <!-- AOS -->
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

        <script src="{{ asset("js/app.js") }}" defer></script>

    </head>

    <body>
        <div class="col-md-12">
            <nav class="navbar navbar-light bg-light">
                <div class="container">
                    <div class="float-left">
                        <a href="/">
                            <img src="/storage/logo/logo.png" class="logo" title="Mon Stage">
                        </a>
                    </div>
                    <div class="navs">
                        <a class="navbar-brand menu" href="{{ route("offres.all") }}">Offres de stage</a>
                        <a class="navbar-brand menu" href="{{ route("all.demandes") }}">demandes de Stage</a>
                        <a class="navbar-brand menu" href="/">blog & astuces</a>
                    </div>
                    <div class="d-flex">
                        @guest
                            <a class="btn btn-outline-secondary stagiaire" href="/espace/stagiaire/create">Espace Stagiaire</a>&nbsp;
                            <a class="btn btn-outline-primary recruteur" href="/register">Espace Recruteur</a>
                        @else
                            <div class="dropdown">
                                <div class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  {{ Auth::user()->full_name }}
                                </div>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="/home">
                                        <i class="fas fa-tachometer-alt"></i> &nbsp; Dashboard
                                    </a>
                                    <a class="dropdown-item" href="/profile">
                                        <i class="fas fa-user-circle"></i> &nbsp; Mon Profile
                                    </a>

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                        <i class="fas fa-sign-out-alt"></i> &nbsp; Se déconnecter
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>

                                </div>
                            </div>
                        @endguest
                    </div>
                </div>
            </nav>
        </div>

        <div class="row">
            <div class="col-md">
                <img class="banner img-fluid" src="/storage/images/mon-stage-banner.jpg" alt="banner mon stage">

                <div style="margin-left: 30px;position:absolute;top:90px; width:600px; height:400px; z-index:2;font-size:195%">
                    <center><b><h5 class="ml2">Stage de fin d'etude</h5></b></center>

                    <center class="mt-2 ml-5">
                        <a class="btn btn-outline-secondary stagiaire" href="/espace/stagiaire/create">Espace Stagiaire</a>&nbsp;
                        <a class="btn btn-outline-primary recruteur" href="/register">Espace Recruteur</a>
                    </center>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="container">
                <div class="row rowCounter">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-4 mt-5 mb-3">
                                <div class="facthold text-center text-white">
                                    <span class="h2 countupthis" numx="8000">2</span><br>
                                    <span>ENTREPRISES</span>
                                </div>
                            </div>

                            <div class="col-md-4 mt-5 mb-3">
                                <div class="facthold text-center text-white">
                                    <span class="h2 countupthis" numx="7491">23</span><br>
                                    <span>OFFRES DE STAGE</span>
                                </div>
                            </div>

                            <div class="col-md-4 mt-5 mb-3">
                                <div class="facthold text-center text-white">
                                    <span class="h2 countupthis" numx="4000">23</span><br>
                                    <span>MISES EN RELATION</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mt-5 mb-3">
                            <a href="/espace/offres/create" class="btn btn-success btn-sm float-right buttonPublier">
                                <span><i class="fas fa-pen"></i></span> Publier offre
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container" data-aos="fade-down"
                               data-aos-easing="linear"
                               data-aos-duration="1500">
            <div class="my-5">
                @forelse ($offres as $offre)

                    <div class="jumbotron" style="padding: 2rem 1rem;">

                        <div class="offre-de-stage-block row" style="position: relative;">
                            <a href="{{ route("offres.show",$offre) }}" style="position: absolute; left:0; top:0; width:100%; height:100%; z-index: 1;"> </a>

                            <div class="align-self-center col-md-2 text-center col-sm-12" style="display:inline-block;vertical-align:middle;">
                                <div class="logo-wrapper" style="margin-bottom:15px;">
                                    <a href="{{ route("offres.show",$offre) }}">
                                        <img src="{{ $offre->user->profile->path }}" alt="" class="img-fluid entreprise-log">
                                    </a>
                                </div>
                                <span class="date-publication d-none d-md-block">{{ $offre->created_at }}</span>

                            </div>

                            <div class="col-md-6 text-md-left text-center col-sm-12">
                                <h5 class="offre-stage-titre text-md-left text-center">
                                    <a href="{{ route("offres.show",$offre) }}">{{ Str::limit($offre->title,100) }}
                                </a>
                                </h5>

                                <a href="{{ route("offres.show",$offre) }}" class="company-link">{{ $offre->user->full_name }}</a>
                                <p class="offre-stage-parag">{{ Str::limit($offre->mission,155) }}</p>

                                <div style="position: relative;z-index: 2">
                                    <label class="badge-stage stage-marketing" data-toggle="tooltip" title="" data-html="true" data-original-title="<span style='font-size:11px;'>Opérationnel</span>">{{ $offre->type }}, </label>
                                    <label class="badge-stage stage-remunere" data-toggle="tooltip" title="" data-html="true" data-original-title="<span style='font-size:11px;'>Ce stage est  rémunéré</span>">{{ $offre->remuneration ? 'Stage Rémunéré' : 'Stage non Rémunéré'}},</label>
                                    <label class="badge-stage stage-pre-embauche" data-toggle="tooltip" title="" data-html="true" data-original-title="<span style='font-size:11px;'</span>">fonction : {{ $offre->fonction }}</label>
                                </div>
                            </div>
                            <div class="align-self-center col-md-2 col-sm-6 text-center" style="width:50%;"><strong class="stage-duree">3 mois</strong>
                                <br><span class="stage-depart">A partir du {{ $offre->created_at }}</span></div>
                            <div class="align-self-center col-md-2 col-sm-6 text-center" style="position:relative;width:50%;"><i class="icon-stage-map" style="font-size:18px;"></i><strong class="stage-ville"><i class="fas fa-map-marker-alt"></i> {{ $offre->lieu }} </strong></div>
                        </div>
                    </div>
                @empty
                    <div class="col-md-6 mx-auto">Aucune Offre(s) disponible.</div>
                @endforelse
            </div>
        </div>

        <div class="bg-grey" data-aos="fade-left">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <img src="/storage/images/5000-recruteurs.jpg" alt="nous recruteurs" class="w-100 responsive-img">
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white" data-aos="flip-left">
            <div class="container">
                <div class="row my-5">
                    <div class="partenaires mx-auto">
                        <h4>
                            <b class="stage-service">Mon-STAGE.MA À VOTRE SERVICE DEPUIS 2014</b><br>
                            <span class="presse">LA PRESSE PARLE DE NOTRE SUCCÈS</span>
                        </h4>
                    </div>
                    <img src="/storage/partenaires/partenaires.png" alt="notre partenaires" />
                </div>
            </div>
        </div>

         @include('includes._footer')

         <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>
         <script>
             // Wrap every letter in a span
             var textWrapper = document.querySelector('.ml2');
             textWrapper.innerHTML = textWrapper.textContent.replace(/\S/g, "<span class='letter'>$&</span>");

             anime.timeline({loop: true})
             .add({
                 targets: '.ml2 .letter',
                 scale: [4,1],
                 opacity: [0,1],
                 translateZ: 0,
                 easing: "easeOutExpo",
                 duration: 950,
                 delay: (el, i) => 70*i
                }).add({
                    targets: '.ml2',
                    opacity: 0,
                    duration: 1000,
                    easing: "easeOutExpo",
                    delay: 1000
                });
        </script>

        <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/countup.js/1.8.2/countUp.min.js'></script>

        <script>
            $(document).ready(function() {
                var options = {  
                    useEasing: false,
                  useGrouping: false,
                  separator: '',
                  decimal: '.',
                };
                $('.countupthis').each(function() {
                var num = $(this).attr('numx'); //end count
                var nuen = $(this).text();
                if (nuen === "") {
                    nuen = 0;
                }
                var counts = new CountUp(this, nuen, num, 0,1, options);
                counts.start();
                });


            });
        </script>
            <!-- AOS JS -->
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script>
            AOS.init();
        </script>
    </body>
</html>
