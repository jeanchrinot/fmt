@extends('layouts.app')

@section('title','Activités')

@section('main')
<section class="md-section bg-lighter">
	<div class="container p-4">
		<div class="row wow slideInRight">
			<div class="col-12 section-title">
				<h1 class="text-muted section-title--styled">Activités / <span class="red">Evenements</span></h1>
			</div>
		</div>
		<div class="row">
			<div class="col-md-9">
				<div class="row">
					@foreach($events as $event)

					<div class="col-xs-12 col-sm-6 col-md-6 mb-3 wow fadeInLeft">
						<article class="post clearfix mb-sm-30">
							<div class="entry-header">
								<div class="post-thumb thumb">
									<img src="{{ getImage($event->image) }}" alt=""
										class="img-responsive img-fullwidth">
									<div class="thumb-overlay"></div>
								</div>
							</div>
							<div class="entry-content post-text p-20 pr-10 bg-white">
								<div class="entry-meta media mt-0 no-bg no-border">
									<h2 class="mt-0"><a href="/activites/{{ $event->slug }}">{{ $event->name }}</a></h2>
									<ul class="list-inline font-14 article-date">
										<li class="pr-0"><i class="fa fa-calendar"></i>
											{{ dateToFrench($event->activity_date,"j F Y") }}</li>
										<!-- <li class="pl-0" style="margin-left: 5px;"><i class="fa fa-map-marker"></i> New York</li> -->
									</ul>
								</div>
								<p class="mt-10 fw-300">{{ subString($event->details,124) }}</p>
								<a href="/activites/{{ $event->slug }}" class="btn-read-more">Voir plus <i
										class="fa fa-arrow-circle-right"></i></a>
								<div class="clearfix"></div>
							</div>
						</article>
					</div>
					@endforeach
					<div class="col-12">
						@if($events) <div class="pagination-div text-left">
							{{ $events->appends(request()->input())->links() }}</div> @endif
					</div>
				</div>
			</div>
			<aside class="col-md-3 mt-5 mt-md-1 wow slideInRight">
				<div class="sidebar-gallery">
					<div class="gallery-title p-2">Filtrer par date</div>
					<div class="block-content">
						<ul id="recently-viewed-items" class="text-white">
							@php
							$currentYear=date("Y");
							for($i=$currentYear; $i > $currentYear-5;$i--){
							echo '<li class="year">&gt;<a class="text-white" href="?year='.$i.'">'.$i.'</a></li>';
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