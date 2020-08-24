@extends('admin.layout')
@section('title','Liste des députés')

@section('main')


<main class="col-sm-9 col-xs-12 content pt-3 pl-0" id="app">
	<h5 class="mb-0" ><strong>Députés</strong></h5>
	<span class="text-secondary">Députés<i class="fa fa-angle-right"></i> Liste</span>

	<div class="row mt-3">
		<div class="col-sm-12">
			<!--Datatable-->
			<div class="mt-1 mb-3 p-3 button-container bg-white border shadow-sm">
				<div class="row">
					<div class="col-sm-6">
						<h6 class="mb-2">Liste des députés</h6>
					</div>
					<div class="col-sm-6">
						<a class="btn btn-info text-white float-right my-3" href="{{ route('deputy.add') }}">Nouveau</a>
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
								<th>Nom</th>
								<th>Prénoms</th>
								<th>Ville representée</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							@if(count($deputies))
							@foreach($deputies as $deputy)
							@foreach($deputy->deputies as $province)
							<tr>
								<td class="align-middle">
									<img src="{{ getUserImage($deputy->image) }}" width="50" height="50" class=" rounded-circle" alt="Photo de profile">
								</td>
								<td class="align-middle">{{ $deputy->surname }}</td>
								<td class="align-middle">{{ $deputy->name }}</td>
								<td class="align-middle">{{ province($province->province) }}</td>
								<td class="d-flex justify-content-center">
									<item-details-button item-type="users" item-id="{{ $deputy->id }}"></item-details-button>
									<!--<button class="action btn btn-success"><i class="fa fa-pencil"></i></button>-->
									<delete-button item-type="deputy" item-id="{{ $deputy->id }}-{{ $province->province }}"></delete-button>
								</td>
							</tr>
							@endforeach
							@endforeach
							@else
							<tr>
								<td colspan="5">Aucun deputé enregistré.</td>
							</tr>
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