@extends('layouts.app')

@section('title', 'Galerie Photos')

@section('main')
    <section class="md-section page-wrapper">
        <div class="container">
            <div class="row wow slideInRight">
                <div class="col-12 col-sm-6 col-md-7 section-title">
                    <h1 class="text-muted section-title--styled">Galerie Photos</h1>
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
                <div class="col-md-9">
                    <div class="row gallery" id="gallery">
                        @if ($galleries)
                            @forelse ($galleries as $gallery)
                                <div class="col-6 col-sm-4 col-lg-3 p-2">
                                    <a href="{{ getImage($gallery->image) }}" title="{{ $gallery->title }}">
                                        <img class=" wow bounceOut image-item card-img"
                                            style="height: 130px;object-fit: cover;" src="{{ getImage($gallery->image) }}"
                                            alt="{{ $gallery->title }} - Malagasy eto Torkia" />
                                    </a>
                                </div>
                            @empty
                                @component('components.empty-result')
                                @endcomponent
                            @endforelse
                        @endif
                    </div>

                    @if ($galleries)<div class="pagination-div">{{ $galleries->appends(request()->input())->links() }}</div>@endif

                </div>


                <aside class="col-md-3 mt-5 mt-md-1 wow slideInRight">
                    @component('components.year', [
                        'yearTitle' => 'Galerie Photos',
                        'years' => $years,
                        ])
                    @endcomponent

                    <div class="sidebar-video bg-white p-1">
                        <div class="videoWrapper my-3">
                            <iframe class="w-100" src="https://www.youtube.com/embed/wIOFD9R8y_Q" frameborder="0"
                                allowfullscreen></iframe>
                            <h3 class="my-3"><a href="{{ route('page.video') }}"
                                    class="btn btn-lg btn-common section-btn section-btn--green">Autres vidéos <i
                                        class="fa fa-long-arrow-right"></i></a></h3>
                        </div>
                    </div>
                </aside>
            </div>
        </div>

    </section>
@endsection
