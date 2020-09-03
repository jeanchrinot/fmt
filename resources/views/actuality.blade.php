@extends('layouts.app')

@section('title','Actualités')

@section('main')
<section class="md-section bg-lighter">
	<div class="container p-4">
		<div class="row wow slideInRight">
			<div class="col-7 section-title">
				<h1 class="text-muted section-title--styled">Actualités</h1>
			</div>
			<div class="col-4 float-right">
				<div class="recherche">
					<label for="search">Filtrer par :</label>
					@if($categories)
					<select id="category" class="form-control">
						<option value="">Catégorie</option>
						@foreach($categories as $cat)
						<option value="{{ $cat->slug }}" {{ (request()->cat==$cat->slug) ? 'selected' : '' }} >{{ $cat->name }}</option>
						@endforeach
					</select>
					@endif
				</div>
			</div>
		</div>
		<div class="row">
		    @foreach($news as $new)
		    @php
		      $date = dateToFrench($new->created_at,"j F");
		      $dates = explode(" ",$date);
		      $day = $dates[0];
		      $month = $dates[1];
		    @endphp
		    <div class="col-xs-12 col-sm-6 col-md-4 mb-3 wow fadeInLeft">
		        <article class="post clearfix mb-sm-30">
		                <div class="entry-header">
		                  <div class="post-thumb thumb"> 
		                    <img src="{{ getImage($new->image) }}" alt="" class="img-responsive img-fullwidth"> 
		                    <div class="thumb-overlay"></div>
		                  </div>
		                </div>
		                <div class="entry-content p-20 pr-10 bg-white">
		                  <div class="entry-meta media mt-0 no-bg no-border">
		                    <div class="entry-date media-left text-center flip bg-theme-colored">
		                      <ul>
		                        <li class="font-16 text-white font-weight-600 border-bottom">{{ $day }}</li>
		                        <li class="font-12 text-white text-uppercase">{{ substr($month,0,3) }}</li>
		                      </ul>
		                    </div>
		                    <div class="media-body pl-15">
		                      <div class="event-content pull-left flip">
		                        <h4 class="entry-title text-white text-uppercase m-0"><a href="/actualites/{{ $new->slug }}">{{ $new->title }}</a></h4>                      
		                      </div>
		                    </div>
		                  </div>
		                  <p class="mt-10 fw-300">{{ subString($new->details,124) }}</p>
		                  <a href="/actualites/{{ $new->slug }}" class="btn-read-more">Voir plus <i class="fa fa-arrow-circle-right"></i></a>
		                  <div class="clearfix"></div>
		                </div>
		          </article>
		    </div>
		    @endforeach
		    <div class="col-12">
		    	@if($news) <div class="pagination-div text-left">{{ $news->appends(request()->input())->links() }}</div> @endif
		    </div>
		  </div>
	</div>

</section>
@endsection
