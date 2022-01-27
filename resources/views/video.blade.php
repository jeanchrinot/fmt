@extends('layouts.app')

@section('title', 'Galerie Vidéos')

@section('main')

    <section class="md-section page-wrapper">
        <div class="container p-4">
            <div class="row wow slideInRight">
                <div class="col-12 col-sm-6 col-md-7 section-title">
                    <h1 class="text-muted section-title--styled">GALERIE VIDÉOS</h1>
                </div>
                <div class="col-12 col-sm-6 col-md-5">
                    <div class="recherche my-3">
                        <label for="search">Filtrer par :</label>
                        @if ($categories)
                            <select id="category" class="form-control">
                                <option value="">Catégorie</option>
                                @foreach ($categories as $cat)
                                    <option value="{{ $cat->slug }}"
                                        {{ request()->cat == $cat->slug ? 'selected' : '' }}>{{ $cat->name }}</option>
                                @endforeach
                            </select>
                        @endif
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-9" id="video">
                    <div class="row">

                        @if ($videos)
                            @forelse ($videos as $video)
                                <div class="col-md-6 p-2">
                                    <iframe class="w-100" height="300" src="{{ $video->video }}" frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                        allowfullscreen></iframe>
                                    <h6 class="video-title text-capitalize">{{ $video->title }}</h6>
                                </div>
                            @empty
                                @component('components.empty-result')
                                @endcomponent
                            @endforelse
                        @endif

                    </div>
                    @if ($videos)
                        <div class="pagination-div text-left">{{ $videos->appends(request()->input())->links() }}
                        </div>
                    @endif

                </div>


                <aside class="col-md-3 mt-5 mt-md-1">
                    @component('components.year', [
                        'yearTitle' => 'Video par année',
                        'years' => $years,
                        ])
                    @endcomponent
                </aside>
            </div>
        </div>

    </section>
@endsection
