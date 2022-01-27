@extends('layouts.app')

@section('title', $title)

@section('main')
    <section class="md-section bg-lighter">
        <div class="container">
            <div class="row wow slideInRight">
                <div class="col-12 section-title">
                    <h1 class="text-muted section-title--styled">
                        {{ $title }}
                    </h1>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-12">
                            <div class="">
                                <img class="" style="width: 100%;height:100%" src="{{ getImage($image) }}"
                                    alt="">
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="pt-3 pb-5 long-text" style="background: transparent!important">
                                {!! $longText !!}
                            </div>
                        </div>
                    </div>


                </div>
                <div class="col-md-4">
                    <div class="row">
                        @isset($categories)
                            <div class="card border-0 bg-transparent">
                                <div class="card-body">
                                    <h5>Catégories</h5>
                                    <ul class="list-group">
                                        <li
                                            class="list-group-item border-top-0 border-left-0 border-right-0 d-flex justify-content-between align-items-center">
                                            Cras justo odio
                                            <span class="badge badge-primary badge-pill">14</span>
                                        </li>
                                        <li
                                            class="list-group-item border-top-0 border-left-0 border-right-0 d-flex justify-content-between align-items-center">
                                            Dapibus ac facilisis in
                                            <span class="badge badge-primary badge-pill">2</span>
                                        </li>
                                        <li
                                            class="list-group-item border-top-0 border-left-0 border-right-0 d-flex justify-content-between align-items-center">
                                            Morbi leo risus
                                            <span class="badge badge-primary badge-pill">1</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        @endisset

                        @if ($recents)
                            <div class="col-12 p-0">
                                <div class="card m-0 w-100 border-0 border-0">
                                    <div class="card-body">
                                        <h5>Publication Récente</h5>
                                        <div class="list-group">
                                            @foreach ($recents as $recent)
                                                <a href="/{{ $baseUrl }}/{{ $recent->slug }}"
                                                    class="list-group-item list-group-item-action text-capitalize" aria-current="true">
                                                    {{ $recent->title??$recent->name }}
                                                </a>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif


                        @if ($others)
                            <div class="col-12 p-0">
                                <div class="card m-0 w-100 border-0 border-0">
                                    <div class="card-body">
                                        <h5>Autres</h5>
                                        <div class="list-group">
                                            @foreach ($others as $other)
                                                <a href="/{{ $baseUrl }}/{{ $other->slug }}"
                                                    class="list-group-item list-group-item-action" aria-current="true">
                                                    <div class="card w-100 border-0">
                                                        <div class="row no-gutters">
                                                            <div class="col-md-4  d-flex align-items-center">
                                                                <img class="img img-fluid"
                                                                    src="{{ getImage($other->image) }}" alt="image">
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="card-body">
                                                                    <h6 class="card-text text-capitalize">
                                                                        {{ $other->title??$other->name }}
                                                                    </h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            @endforeach
                                        </div>


                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
