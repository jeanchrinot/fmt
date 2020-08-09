@extends('layouts.app')

@section('title','Galerie')

@section('main')
<section class="md-section">
	<div class="container p-4">
		<div class="row wow slideInRight">
			<div class="col-7">
				<h1 class="text-muted p-3">Gallery</h1>
			</div>
			<div class="col-4 float-right">
				<div class="recherche">
					<label for="search">Filtrer par :</label>
					<select id="filter-image" class="form-control">
						@if($categories)
						@foreach($categories as $cat)
						<option>{{ $cat->name }}</option>
						@endforeach
						@endif
					</select>
				</div>
			</div>
		</div>
		<div class="row">
			<div id="gallery" class="col-md-9 gallery">

				<div class="row">
					@if($galleries)
					@foreach($galleries as $gallery)
					<div class="col-6 col-sm-4 col-lg-3">
						<a href="assets/img/gallery/{{ $gallery->image }}"><img class=" wow bounceOut image-item card-img" src="assets/img/gallery/{{ $gallery->image }}"></a>
					</div>
					@endforeach
					@endif
					
				</div>
				


			</div>


			<aside class="col-md-3 mt-5 mt-md-1 wow slideInRight">
				<div class="sidebar-gallery">
					<div class="gallery-title p-2">Photos gallery</div>
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

				<div class="sidebar-video bg-white p-1">
					<div class="videoWrapper my-3">
						<iframe class="w-100" src="https://www.youtube.com/embed/wIOFD9R8y_Q" frameborder="0" allowfullscreen></iframe>
						<h3 class="my-3"><a href="video.php">Autre video</a></h3>
					</div>
				</div>
			</aside>
		</div>
	</div>

</section>
@endsection
