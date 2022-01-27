@extends('layouts.app')

@section('title', 'toutes les annonces de bourses')

@section('main')
    <section class="md-section page-wrapper bg-lighter">
        <div class="container p-4">
            <div class="row wow slideInRight">
                <div class="col-12 section-title">
                    <h1 class="text-muted section-title--styled">Les annonces de / <span class="red">bourses</span>
                    </h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-12">
                            @forelse ($bourseInfos as $bourseInfo)
                                <a href="{{ route('page.bourseInfo', $bourseInfo->slug) }}"
                                    class="nav-link text-deconration-none">
                                    <div class="card mb-3 mx-0 w-100">
                                        <div class="row no-gutters">
                                            <div class="col-md-3">
                                                <img src="{{ getImage($bourseInfo->image) }}" alt=""
                                                    class="img-responsive img-fullwidth">

                                                {{-- <img src="{{ getImage($bourseInfo->image) }}" height="200" class="card-img"
                                                alt="{{ $bourseInfo->title }}"> --}}
                                            </div>
                                            <div class="col-md-9 d-flex align-items-center">
                                                <div class="card-body">
                                                    <div>
                                                        <h5 class="card-title text-capitalize">{{ $bourseInfo->title }}
                                                        </h5>
                                                        <p class="card-text">
                                                            {{ $bourseInfo->truncate }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            @empty
                                @component('components.empty-result')
                                @endcomponent
                            @endforelse
                        </div>
                        <div class="col-12">
                            @if ($bourseInfos)
                                <div class="pagination-div text-left">
                                    {{ $bourseInfos->appends(request()->input())->links() }}</div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    @component('components.year', [
                        'yearTitle' => 'Filtrer Par Année
',
                        'years' => $years,
                        ])
                    @endcomponent
                </div>
            </div>
        </div>

    </section>
@endsection
