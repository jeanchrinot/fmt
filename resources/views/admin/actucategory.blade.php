@extends('admin.layout')
@section('title','Liste des catégories')

@section('main')


<main class="col-sm-9 col-xs-12 content pt-3 pl-0" id="app">
	<h5 class="mb-0" ><strong>Catégories d'Actualités</strong></h5>
	<span class="text-secondary">Catégories d'Actualités <i class="fa fa-angle-right"></i> Tous les catégories</span>

	<div class="row mt-3">
		<div class="col-sm-12">
			<!--Datatable-->
			<div class="mt-1 mb-3 p-3 button-container bg-white border shadow-sm">
				<div class="row">
					<div class="col-sm-6">
						<h6 class="mb-2">Liste des catégories</h6>
					</div>
					<div class="col-sm-6">
						<a class="btn btn-info text-white float-right my-3" href="{{ route('actucategory.add') }}">Nouveau</a>
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
								<th>Nom de la catégorie</th>
								<th>Slug</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							@if(count($actucategories))
							@foreach($actucategories as $category)
							<tr>
								<td class="align-middle">{{ $category->name }}</td>
								<td class="align-middle">{{ $category->slug }}</td>
								<td class="d-flex justify-content-center">
									<div><a href="/admin/actucategory/edit/{{ $category->id }}" class="action btn btn-success" style="margin-left: 4px;color:#fff;"><i class="fa fa-pencil"></i></a></div>
									<!--<button class="action btn btn-success"><i class="fa fa-pencil"></i></button>-->
									<delete-button item-type="actucategory" item-id="{{ $category->id }}"></delete-button>
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