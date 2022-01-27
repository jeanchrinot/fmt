@extends('layouts.app')

@section('title', $title)

@section('main')
    @component('components.loading')
    @endcomponent

    <section class="md-section page-wrapper d-none bg-lighter">
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
                        @if (count($recents) && count($others) != 0)
                            <div class="col-12 p-0">
                                <div class="card m-0 w-100 border-0 border-0">
                                    <div class="card-body">
                                        <h5>Publication Récente</h5>
                                        <div class="list-group">
                                            @foreach ($recents as $recent)
                                                <a href="/{{ $baseUrl }}/{{ $recent->slug }}"
                                                    class="list-group-item list-group-item-action text-capitalize"
                                                    aria-current="true">
                                                    {{ $recent->title ?? $recent->name }}
                                                </a>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            @component('components.latest', [
                                'baseUrl' => Request::segment(1),
                                'recents' => $recents,
                                ])
                            @endcomponent
                        @endif


                        @if (count($others))
                            @component('components.others', [
                                'baseUrl' => Request::segment(1),
                                'others' => $others,
                                ])
                            @endcomponent
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
