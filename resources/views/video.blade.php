@extends('layouts.app')

@section('title','Galerie Vidéos')

@section('main')

<section class="md-section">
	<div class="container p-4">
		<div class="row">
			<div class="col-7 section-title">
				<h1 class="text-muted section-title--styled">Galerie Vidéos</h1>
			</div>
			<div class="col-4 float-right">
				<div class="recherche">
					<label for="search">Filtrer par :</label>
					@if($categories)
					<select id="category" class="form-control">
						<option value="">Catégorie</option>
						@foreach($categories as $cat)
						<option value="{{ $cat->slug }}" {{ (request()->cat==$cat->slug) ? 'selected' : '' }}>
							{{ $cat->name }}</option>
						@endforeach
					</select>
					@endif
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-9" id="video">
				<div class="row">

					@if($videos)
					@foreach($videos as $video)
					<div class="col-md-6 p-2">
						<iframe class="w-100" height="300" src="{{ $video->video }}" frameborder="0"
							allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
							allowfullscreen></iframe>
						<h6 class="video-title text-capitalize">{{ $video->title }}</h6>
					</div>

					@endforeach

					@endif

				</div>
				@if($videos) <div class="pagination-div text-left">{{ $videos->appends(request()->input())->links() }}
				</div> @endif

			</div>


			<aside class="col-md-3 mt-5 mt-md-1">
				<div class="sidebar-gallery">
					<div class="gallery-title p-2">Explorer par date</div>
					<div class="block-content">
						<ul id="recently-viewed-items">
							@php
							$currentYear=date("Y");
							for($i=$currentYear; $i>=$currentYear-5;$i--){
							echo '<li class=" year">&gt;<a href="?year='.$i.'">'.$i.'</a></li>';
							}
							@endphp
						</ul>
					</div>
				</div>
			</aside>
		</div>
	</div>

</section>
@endsection