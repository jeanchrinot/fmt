@extends('admin.layout')
@section('title','Liste des actualités')

@section('main')


<main class="col-sm-9 col-xs-12 content pt-3 pl-0" id="app">
	<h5 class="mb-0" ><strong>Actualités</strong></h5>
	<span class="text-secondary">Actualités <i class="fa fa-angle-right"></i> Tout</span>

	<div class="row mt-3">
		<div class="col-sm-12">
			<!--Datatable-->
			<div class="mt-1 mb-3 p-3 button-container bg-white border shadow-sm">
				<div class="row">
					<div class="col-sm-6">
						<h6 class="mb-2">Liste des actualités</h6>
					</div>
					<div class="col-sm-6">
						<a class="btn btn-info text-white float-right my-3" href="{{ route('actu.add') }}">Nouveau</a>
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
				
				<div class="table-responsive">
					<table id="example" class="table table-striped table-bordered text-center">
						<thead>
							<tr>
								<th>Image</th>
								<th>Titre</th>
								<th>Détails</th>
								<th>Date</th>
								<th>Status</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							@if(count($actus))
							@foreach($actus as $actu)
							<tr>
								<td class="align-middle">
									<img src="{{ getImage($actu->image) }}" width="50" height="50" class=" rounded-circle" alt="Photo de profile">
								</td>
								<td class="align-middle">{{ $actu->title }}</td>
								<td class="align-middle">{{ subString($actu->details,40) }}</td>
								<td class="align-middle">{{ formatDate($actu->created_at) }}</td>
								<td class="align-middle"><span class="badge badge-{{ ($actu->featured==1) ? 'success' : 'secondary' }}">{{ ($actu->featured==1) ? 'Actif' : 'Passif' }}</span></td>
								<td class="d-flex justify-content-center">
									<item-details-button item-type="actu" item-id="{{ $actu->id }}"></item-details-button>
									<div><a href="/admin/actu/edit/{{ $actu->id }}" class="action btn btn-success" style="margin-left: 4px;color:#fff;"><i class="fa fa-pencil"></i></a></div>
									<!--<button class="action btn btn-success"><i class="fa fa-pencil"></i></button>-->
									<delete-button item-type="actu" item-id="{{ $actu->id }}"></delete-button>
								</td>
							</tr>
							@endforeach
							@endif
						</tbody>
					</table>
				</div>
			</div>
			<!--/Datatable-->

		</div>
	</div>

	@include('admin.includes.modals')

</main>
@endsection