@extends('layouts.app')

@section('title', 'Page d\'accueil')
@section('main')

    <!--slider-->
    <section class="container-fluid wow fadeIn">
        <!-- Slider main container -->
        <div class="swiper-container index">
            <div class="swiper-wrapper">
                @if ($sliders)
                    @foreach ($sliders as $slider)
                        <div class="swiper-slide">
                            <img src="{{ getImage($slider->image) }}" class="w-100">
                            <div class="carousel-caption">
                                <p>{{ $slider->name }}</p>
                                <h2>{{ $slider->details }}</h2>
                                <!-- <a class="btn btn-lg btn-common"><i aria-hidden="true" class="fa fa-arrow-circle-right"></i> Get Started</a> -->
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>

            <div class="swiper-pagination swiper-pagination-index"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
            <div class="swiper-scrollbar"></div>
        </div>

        <!-- presentation-->
        <div class="presetantion">
            <div class="container">
                <div class="row">
                    <p class="col-12 my-3 text-center text-white fa-300 slideInLeft">
                        Bienvenu sur la page de l’Union des Malagasy de Turquie
                    </p>

                </div>
            </div>
        </div><!-- end / presentation -->
    </section>
    <!--end slider-->

    <!--Bourse Info-->
    @if ($bourseInfos)
        <section id="actuality" class="p-5">
            <div class="container">
                <div class="section-title text-center">
                    <h2 class="wow slideInLeft">ANNONCES DE / <span class="red">BOURSE</span></h2>
                    <span class="bordered-icon"><i class="fa fa-info"></i></span>
                </div>
                <div class="section-content">
                    <div class="row">
                        @foreach ($bourseInfos as $bourseInfo)
                            <div class="col-xs-12 col-sm-6 col-md-4 wow fadeInLeft">
                                <article class="post clearfix mb-sm-30">
                                    <div class="entry-header">
                                        <div class="post-thumb thumb">
                                            <img src="{{ getImage($bourseInfo->image) }}" alt=""
                                                class="img-responsive img-fullwidth">
                                            <div class="thumb-overlay"></div>
                                        </div>
                                    </div>
                                    <div class="entry-content p-20 pr-10 bg-white">
                                        <div class="entry-meta media mt-0 p-0 ml-0 no-bg no-border">
                                            <div class="media-body ">
                                                <div class="event-content pull-left flip">
                                                    <h4 class="entry-title text-white text-uppercase m-0">
                                                        <a href="{{ route('page.bourseInfo', $bourseInfo->slug) }}">
                                                            {{ $bourseInfo->title }}
                                                        </a>
                                                    </h4>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="mt-10 fw-300">{{ Str::limit($bourseInfo->truncate, 124) }}</p>
                                        <a href="{{ route('page.bourseInfo', $bourseInfo->slug) }}"
                                            class="btn-read-more">Voir plus <i class="fa fa-arrow-circle-right"></i></a>
                                        <div class="clearfix"></div>
                                    </div>
                                </article>
                            </div>
                        @endforeach
                    </div>
                    <div class="text-center mt-3">
                        <a href="{{ route('page.bourseInfo') }}" class="btn btn-lg btn-common section-btn"><i
                                aria-hidden="true" class="fa fa-long-arrow-right"></i>
                            Voir tout</a>
                    </div>
                </div>
            </div>
        </section>
    @endif
    <!--end-Bourse Info-->

    <!--actualite-->
    @if ($news)
        <section class=" p-5 bg-lighter">
            <div class="container">
                <div class="section-title text-center">
                    <h2 class="mt-0">Dernières <span class="red">Nouvelles</span></h2>
                    <span class="bordered-icon"><i class="fa fa-newspaper-o"></i></span>
                </div>
                <div class="section-content">
                    <div class="row">
                        @foreach ($news as $new)
                            @php
                                $date = dateToFrench($new->created_at, 'j F');
                                $dates = explode(' ', $date);
                                $day = $dates[0];
                                $month = $dates[1];
                            @endphp
                            <div class="col-xs-12 col-sm-6 col-md-4 wow fadeInLeft">
                                <article class="post clearfix mb-sm-30">
                                    <div class="entry-header">
                                        <div class="post-thumb thumb">
                                            <img src="{{ getImage($new->image) }}" alt=""
                                                class="img-responsive img-fullwidth">
                                            <div class="thumb-overlay"></div>
                                        </div>
                                    </div>
                                    <div class="entry-content p-20 pr-10 bg-white">
                                        <div class="entry-meta media mt-0 no-bg no-border">
                                            <div class="entry-date media-left text-center flip bg-theme-colored">
                                                <ul>
                                                    <li class="font-16 text-white font-weight-600 border-bottom">
                                                        {{ $day }}</li>
                                                    <li class="font-12 text-white text-uppercase">
                                                        {{ substr($month, 0, 3) }}
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="media-body pl-15">
                                                <div class="event-content pull-left flip">
                                                    <h4 class="entry-title text-white text-uppercase m-0"><a
                                                            href="/actualites/{{ $new->slug }}">{{ $new->title }}</a>
                                                    </h4>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="mt-10 fw-300">{{ subString($new->details, 124) }}</p>
                                        <a href="/actualites/{{ $new->slug }}" class="btn-read-more">Voir plus <i
                                                class="fa fa-arrow-circle-right"></i></a>
                                        <div class="clearfix"></div>
                                    </div>
                                </article>
                            </div>
                        @endforeach
                    </div>
                    <div class="text-center mt-3">
                        <a href="/actualites/" class="btn btn-lg btn-common section-btn"><i aria-hidden="true"
                                class="fa fa-long-arrow-right"></i>
                            Voir tout</a>
                    </div>
                </div>
            </div>
        </section>
    @endif
    <!--end-actualite-->

    <!--about-->
    <section id="about" class="p-md-3">

        <div class="container ">

            <div class="row">
                <div class="col-md-6 wow SlideInLeft">
                    <div class="section-title text-center">
                        <h2 class="wow slideInRight">A Propos</h2>
                        <span class="bordered-icon"><i class="fa fa-institution"></i></span>
                    </div>
                    <p class="wow slideInLeft fw-300">{{ $about->about }}</p>
                </div>

                <div class="col-md-6 wow slideInRight">
                    <div class="president-bo bg-dange">

                        <div class="img-president">
                            <img src="{{ getImage($about->image) }}">
                            <div class="president__info text-center mt-4">
                                <h5 class="president__name">Mr ZAFERA Elio</h5>
                                <p class="font-italic">Président</p>
                            </div>
                        </div>
                    </div><!-- end / about -->

                </div>
            </div>
        </div>
    </section>
    <!--end about-->


    <!--Student-->
    <section id="student">

        <div class="section-title text-center">
            <h2 class="wow slideInRight">Mot des <span class="red">Membres</span></h2>
            <span class="bordered-icon"><i class="fa fa-quote-left"></i></span>
        </div>


        <div class="container owl-carousel owl-theme wow fadeIn">

            @foreach ($studentwords as $studentword)
                <div class="item">
                    <div class="student">
                        <div class="student-word">
                            {{ $studentword->words }}
                        </div>
                        <div class="description justify-content-center">
                            <span class="text-muted  my-auto">{{ $studentword->user->department }}</span>
                            <img src="{{ getUserImage($studentword->user->image) }}" class="rounded-circle ml-3">
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    <!--end student-->

    <!-- Activity -->

    <section id="actuality" class="p-5">
        <div class="container">
            <div class="section-title text-center">
                <h2 class="wow slideInLeft">EVENEMENTS / <span class="red">ACTIVITES</span></h2>
                <span class="bordered-icon"><i class="fa fa-calendar"></i></span>
            </div>
            <div class="section-content">
                <div class="row">
                    <div class="col-md-6">
                        @isset($coming_event)
                            <article class="post media-post clearfix pb-0 mb-10">
                                <div class="post-thumb thumb">
                                    <img src="{{ getImage($coming_event->image) }}" alt=""
                                        class="img-responsive img-fullwidth">
                                    <div class="count-down" id="count-down" date="{{ $coming_event->activity_date }}">
                                        <ul class="count-list">
                                            <li><span class="count-value" id="count-down-day">00</span><span
                                                    class="count-label">Jours</span></li>
                                            <li><span class="count-value" id="count-down-hour">00</span><span
                                                    class="count-label">Heures</span></li>
                                            <li><span class="count-value" id="count-down-min">00</span><span
                                                    class="count-label">Min</span></li>
                                            <li><span class="count-value" id="count-down-sec">00</span><span
                                                    class="count-label">Sec</span></li>
                                        </ul>
                                    </div>
                                    <div class="thumb-overlay thumb-overlay--fixed"></div>
                                </div>
                                <div class="post-text">
                                    <h4 class="mt-0"><a
                                            href="/activites/{{ $coming_event->slug }}">{{ $coming_event->name }}</a>
                                    </h4>
                                    <ul class="list-inline font-12 article-date">
                                        <li class="pr-0"><i class="fa fa-calendar"></i>
                                            {{ dateToFrench($coming_event->activity_date, 'j F Y') }}
                                        </li>
                                        <!-- <li class="pl-0" style="margin-left: 5px;"><i class="fa fa-map-marker"></i> New York</li> -->
                                    </ul>
                                    <p class="mb-1 font-16 fw-300">{{ subString($coming_event->details, 116) }}</p>
                                    <a class="text-theme-colored font-16" href="/activites/{{ $coming_event->slug }}">Voir
                                        en entier <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </article>
                        @endisset
                    </div>
                    <div class="col-md-6">
                        @if ($events)
                            @foreach ($events as $event)
                                <article class="post media-post clearfix pb-0 mb-10 post--inline">
                                    <div class="post-thumb">
                                        <a href="/activites/{{ $event->slug }}"><img alt=""
                                                src="{{ getImage($event->image) }}"></a>
                                    </div>
                                    <div class="post-right post-text">
                                        <h4 class="mt-0"><a
                                                href="/activites/{{ $event->slug }}">{{ $event->name }}</a>
                                        </h4>
                                        <ul class="list-inline font-14 article-date">
                                            <li class="pr-0"><i class="fa fa-calendar"></i>
                                                {{ dateToFrench($event->activity_date, 'j F Y') }}
                                            </li>
                                            <!-- <li class="pl-0" style="margin-left: 5px;"><i class="fa fa-map-marker"></i> New York</li> -->
                                        </ul>
                                        <p class="mb-0 font-14 fw-300">{{ subString($event->details, 116) }}</p>
                                        <a class="text-theme-colored font-13" href="/activites/{{ $event->slug }}">Voir
                                            plus <i class="fa fa-arrow-circle-right"></i></a>
                                    </div>
                                </article>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="text-center mt-3">
                    <a href="/activites" class="btn btn-lg btn-common section-btn"><i aria-hidden="true"
                            class="fa fa-long-arrow-right"></i>
                        Voir tout</a>
                </div>
            </div>
        </div>
    </section>

    <!--contact-->
    <section id="contact" class="contact">


        <div class="section-title wow slideInRight text-center">
            <h2 class="wow slideInLeft white">Contactez-nous</h2>
            <span class="bordered-icon"><i class="fa fa-send"></i></span>
        </div>


        <div class="container">

            <div class="row">

                <div class="col-lg-5 wow slideInLeft">
                    <p class="contact-description">Détails du contact</p>

                    <div>
                        @if ($assContact)
                            @if ($assContact->phone)
                                <div class="widget-contact__item">
                                    <span class="widget-contact__title"><i class="fa fa-phone red"></i> Téléphone:</span>
                                    <p class="widget-contact__text"> {{ $assContact->phone }}</p>
                                </div>
                            @endif
                            @if ($assContact->fax)
                                <div class="widget-contact__item">
                                    <span class="widget-contact__title"><i class="fa fa-fax red"></i> Fax:</span>
                                    <p class="widget-contact__text">{{ $assContact->fax }}</p>
                                </div>
                            @endif
                            @if ($assContact->email)
                                <div class="widget-contact__item">
                                    <span class="widget-contact__title"><i class="fa fa-envelope-o red"></i>
                                        Email: </span>
                                    <p class="widget-contact__text"><a
                                            href="mailto:consular@madagaskar.us">{{ $assContact->email }}</a></p>
                                </div>
                            @endif
                            @if ($assContact->email2)
                                <div class="widget-contact__item">
                                    <span class="widget-contact__title"><i class="fa fa-envelope-o red"></i> Adresse email
                                        2: </span>
                                    <p class="widget-contact__text"><a href="#"> {{ $assContact->email2 }}</a></p>
                                </div>
                            @endif
                        @endif

                    </div>

                </div>


                <div class="col-lg-7 my-3 wow fadeIn bg-white">
                    <div class="element-container">
                        <form id="formContact" action="{{ route('contactForm') }}" class="needs-validation" novalidate
                            method="post">
                            {{ csrf_field() }}

                            <div class="message_box">

                                @if (\Session::has('success'))
                                    <span class="invisible" id="formSuccess">{!! \Session::get('success') !!}</span>
                                @endif

                                @if (count($errors) > 0)
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>
                                                    {{ $error }}
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Nom" name="name"
                                    value="{{ old('name') }}" required>
                                <div class="invalid-feedback">
                                    Veuillez entrer votre nom
                                </div>
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Prenom" name="surname"
                                    value="{{ old('surname') }}" required>
                                <div class="invalid-feedback">
                                    Veuillez entrer votre prenom
                                </div>
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Telephone" name="phone"
                                    value="{{ old('phone') }}">
                                <div class="invalid-feedback">
                                    Veuillez entrer votre telehone
                                </div>
                            </div>

                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="email" name="email"
                                    value="{{ old('email') }}" required>
                                <div class="invalid-feedback">
                                    Veuillez entrer votre email
                                </div>
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Sujet" name="subject"
                                    value="{{ old('subject') }}" required>
                                <div class="invalid-feedback">
                                    Veuillez entrer le sujet
                                </div>
                            </div>

                            <div class="form-group">
                                <textarea class="form-control" name="message" rows="4" placeholder="Message"
                                    required>{{ old('message') }}</textarea>
                                <div class="invalid-feedback">
                                    Veuillez entrer votre message
                                </div>
                            </div>


                            <button id="send" class="btn btn-primary btn-round mt-3 mb-3" type="submit"
                                style="float: right;">Envoyer
                            </button>

                        </form>
                    </div>

                </div>


            </div>

        </div>
    </section>
    <!--end contact-->

    <!--contact-->
    <section id="consulate-contact" class="contact">

        <div class="section-title wow slideInLeft mt-3 text-center">
            <h2 class="wow slideInLeft">Contactez <span class="red">Notre Consulat</span></h2>
            <span class="bordered-icon"><i class="fa fa-map"></i></span>
        </div>


        <div class="container">

            <div class="row">

                <div class="col-lg-5 wow slideInLeft">
                    <p class="contact-description">Détails du Contact</p>
                    <div>
                        @if ($consulatContact)
                            @if ($consulatContact->phone)
                                <div class="widget-contact__item">
                                    <span class="widget-contact__title"><i class="fa fa-phone red"></i> Téléphone:</span>
                                    <p class="widget-contact__text"> {{ $consulatContact->phone }}</p>
                                </div>
                            @endif
                            @if ($consulatContact->fax)
                                <div class="widget-contact__item">
                                    <span class="widget-contact__title"><i class="fa fa-fax red"></i> Fax:</span>
                                    <p class="widget-contact__text">{{ $consulatContact->fax }}</p>
                                </div>
                            @endif
                            @if ($consulatContact->email)
                                <div class="widget-contact__item">
                                    <span class="widget-contact__title"><i class="fa fa-envelope-o red"></i> Adresse
                                        email:</span>
                                    <p class="widget-contact__text"><a
                                            href="mailto:consular@madagaskar.us">{{ $consulatContact->email }}</a></p>
                                </div>
                            @endif
                            @if ($consulatContact->email2)
                                <div class="widget-contact__item">
                                    <span class="widget-contact__title"><i class="fa fa-envelope-o red"></i> Adresse email
                                        2:</span>
                                    <p class="widget-contact__text"><a href="#"> {{ $consulatContact->email2 }}</a></p>
                                </div>
                            @endif
                            @if ($consulatContact->address)
                                <div class="widget-contact__item">
                                    <span class="widget-contact__title"><i class="fa fa-map-marker red"></i>
                                        Adresse:</span>
                                    <p class="widget-contact__text">
                                        {{ $consulatContact->address }}
                                    </p>
                                </div>
                            @endif
                        @endif

                    </div>

                </div>

                <div class="col-lg-7 my-3 wow slideInRight">

                    <div class="contact-gmap">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3008.0953586877195!2d28.996626015039336!3d41.06690817929489!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14cab6ff5ae8e68d%3A0xdb925c03db5a6bb0!2sMadagascan%20Consulate!5e0!3m2!1sfr!2sus!4v1594484429491!5m2!1sfr!2sus"
                            width="100%" height="500" frameborder="0" style="border:0;" allowfullscreen=""
                            aria-hidden="false" tabindex="0"></iframe>
                    </div>

                </div>


            </div>

        </div>
    </section>
    <!--end contact-->

@endsection

@section('scripts')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{-- <script type="text/javascript" src="/assets/js/count-down.js"></script> --}}
    @if (session('success'))
        <script>
            swal.fire({
                title: "Success",
                text: "Message envoyé avec succès !",
                icon: "success",
                confirmButtonColor: '#45cb85',
            })
        </script>
    @endif
@endsection

