@extends('admin.layout')
@section('title','A propos')

@section('main')


<main class="col-sm-9 col-xs-12 content pt-3 pl-0" id="app">
	<h5 class="mb-0" ><strong>A propos</strong></h5>
	<span class="text-secondary">A propos</span>

	<div class="row mt-3">
		<div class="col-sm-12">
			<!--Datatable-->
			<div class="mt-1 mb-3 p-3 button-container bg-white border shadow-sm">
				<div class="row">
					<div class="col-sm-6">
						<h6 class="mb-2">A propos de l'association</h6>
					</div>
					<div class="col-sm-6">
						<a class="btn btn-info text-white float-right my-3" href="{{ route('page.item.edit',['item'=>'about','id'=>$about->id]) }}">Modifier</a>
					</div>
					<div class="col-8" id="alert-area" style="margin-right: auto;margin-left: auto;">
						@if (\Session::has('success'))
				              <div class="alert alert-success alert-dissmissible">
				              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				                      {!! \Session::get('success') !!}
				                  
				              </div>
				          @endif
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<p class="text-muted"><strong>A propos:</strong><br>{{ $about->about }}</p>
						<p class="text-muted"><strong>Mission:</strong><br>{{ $about->mission }}</p>
						<p class="text-muted"><strong>Vision:</strong><br>{{ $about->vision }}</p>
						<p class="text-muted"><strong>Mot du président:</strong><br>{{ $about->words_of_president}}</p>
					</div>
					<div class="col-md-6">
						<div style="width: 100%;">
							<p class="text-muted">Image 1</p>
							<img src="{{ getImage($about->image) }}" style="max-width: 100%;">
						</div>
						<div style="width: 100%;">
							<p class="text-muted">Image 2</p>
							<img src="{{ getImage($about->image2) }}" style="max-width: 100%;">
						</div>
					</div>
				</div>
			</div>
			<!--/Datatable-->

		</div>
	</div>

	@include('admin.includes.modals')

</main>
@endsection