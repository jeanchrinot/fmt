@extends('layouts.app')

@php 
	$title = $new->title;
@endphp
@section('title',$title)

@section('main')
<section class="md-section bg-lighter">
	<div class="container p-4">
		<div class="row wow slideInRight">
			<div class="col-7 section-title">
				<h1 class="text-muted section-title--styled">{{ $new->title }}</h1>
			</div>
		</div>
		<div class="row">
			<div class="col-md-8">
				@php
			      $date = dateToFrench($new->created_at,"j F");
			      $dates = explode(" ",$date);
			      $day = $dates[0];
			      $month = $dates[1];
		    	@endphp
				<article class="post post-detail clearfix mb-sm-30">
		                <div class="entry-header">
		                  <div class="post-thumb thumb thumb--detail"> 
		                    <img src="{{ getImage($new->image) }}" alt="" class="img-responsive img-fullwidth"> 
		                    <div class="thumb-overlay"></div>
		                  </div>
		                </div>
		                <div class="entry-content p-20 pr-10 bg-white">
		                  <div class="entry-meta media mt-0 no-bg no-border">
		                    <div class="entry-date media-left text-center flip bg-theme-colored">
		                      <ul>
		                        <li class="font-16 text-white font-weight-600 border-bottom">{{ $day }}</li>
		                        <li class="font-16 text-white text-uppercase">{{ substr($month,0,3) }}</li>
		                      </ul>
		                    </div>
		                    <div class="media-body pl-15">
		                      <div class="event-content pull-left flip">
		                        <h4 class="entry-title text-white text-uppercase m-0"><a href="/actualites/{{ $new->slug }}">{{ $new->title }}</a></h4>                      
		                      </div>
		                    </div>
		                  </div>
		                  <p class="mt-10 fw-300">{{ $new->details }}</p>
		                  <div class="clearfix"></div>
		                </div>
		          </article>
			</div>
			<aside class="col-md-4 mt-5 mt-md-1 wow slideInRight">
				<div class="sidebar-gallery">
					<div class="gallery-title p-2">Voir aussi</div>
					<div class="block-content">
						@if($others)
						<ul id="recently-viewed-items">
							@foreach($others as $other)
							<li class="year">&gt;<a href="/actualites/{{ $other->slug }}">{{ $other->title }}</a></li>
							@endforeach
						</ul>
						@endif
					</div>
				</div>
			</aside>
		  </div>
	</div>

</section>
@endsection
