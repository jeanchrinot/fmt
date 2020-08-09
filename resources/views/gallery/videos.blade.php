@extends('layouts.app')

@section('title','Galerie Vidéos')

@section('main')

<section class="md-section">
	<div class="container p-4">
		<div class="row">
			<div class="col-7">
				<h1 class="text-muted p-3">Galerie Vidéos</h1>
			</div>
			<div class="col-4 float-right">
				<div class="recherche">
					<label for="search">Filtrer par :</label>
					@if($categories)
					<select id="filter-image" class="form-control">
						@foreach($categories as $cat)
						<option>{{ $cat->name }}</option>
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
					<div class="col-sm-6 col-lg-4">
						<div class="card">
							<div class="card-body">
								<iframe class="w-100" src="{{ $video->video }}" frameborder="0" allowfullscreen></iframe>
							</div>
							<div class="card-footer">
								{{ $video->title }}
							</div>
						</div>
					</div>
					@endforeach
					@endif
				</div>
				
			</div>


			<aside class="col-md-3 mt-5 mt-md-1">
				<div class="sidebar-gallery">
					<div class="gallery-title p-2">Video gallery</div>
					<div class="block-content">
						<ul id="recently-viewed-items">
							<li class="year">&gt;<a href="#">2020</a></li>
							<li class="year">&gt;<a href="#">2019</a></li>
							<li class="year">&gt;<a href="#">2018</a></li>
							<li class="year">&gt;<a href="#">2017</a></li>
							<li class="year">&gt;<a href="#">2016</a></li>
							<li class="year">&gt;<a href="#">2015</a></li>
						</ul>
					</div>
				</div>
			</aside>
		</div>
	</div>

</section>
@endsection