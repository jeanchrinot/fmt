@extends('layouts.app')

@php
$title = $event->name;
@endphp
@section('title', $title)

@section('main')
    <section class="md-section bg-lighter">
        <div class="container p-4">
            <div class="row wow slideInRight">
                <div class="col-7 section-title">
                    <h1 class="text-muted section-title--styled">{{ $event->name }}</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <article class="post clearfix post-detail mb-sm-30">
                        <div class="entry-header">
                            <div class="post-thumb thumb thumb--detail">
                                <img src="{{ getImage($event->image) }}" alt="" class="img-responsive img-fullwidth">
                                <div class="thumb-overlay"></div>
                            </div>
                        </div>
                        <div class="entry-content post-text p-20 pr-10 bg-white">
                            <div class="entry-meta media mt-0 no-bg no-border">
                                <h2 class="mt-0"><a href="#">{{ $event->name }}</a></h2>
                                <ul class="list-inline font-14 article-date">
                                    <li class="pr-0"><i class="fa fa-calendar"></i>
                                        {{ dateToFrench($event->activity_date, 'j F Y') }}</li>
                                    <!-- <li class="pl-0" style="margin-left: 5px;"><i class="fa fa-map-marker"></i> New York</li> -->
                                </ul>
                            </div>
                            <p class="mt-10 fw-300">{{ $event->details }}</p>
                            <div class="clearfix"></div>
                        </div>
                    </article>
                </div>
                <aside class="col-md-4 mt-5 mt-md-1">
                    @if ($others)
                        <div class="list-group">
                            <a href="#" class="list-group-item text-uppercase list-group-item-action active bg-red">
                                {{ $event->name }}
                            </a>
                            @foreach ($others as $other)
                                <a href="/activites/{{ $other->slug }}"
                                    class="list-group-item text-uppercase list-group-item-action">{{ $other->name }}</a>
                            @endforeach
                        </div>
                    @endif,
                    {{-- <div class="sidebar-gallery d-none">
                        <div class="gallery-title p-2">Voir aussi</div>
                        <div class="block-content">
                            @if ($others)
                                <ul id="recently-viewed-items">
                                    @foreach ($others as $other)
                                        <li class="year">&gt;<a
                                                href="/activites/{{ $other->slug }}">{{ $other->name }}</a></li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                    </div> --}}
                </aside>
            </div>
        </div>

    </section>
@endsection
