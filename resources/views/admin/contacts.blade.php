@extends('admin.layout')
@section('title','Contacts')

@section('main')


<main class="col-sm-9 col-xs-12 content pt-3 pl-0" id="app">
	<h5 class="mb-0" ><strong>Contacts</strong></h5>
	<span class="text-secondary">Contacts <i class="fa fa-angle-right"></i> {{ $contact->name }}</span>

	<div class="row mt-3">
		<div class="col-sm-12">
			<!--Datatable-->
			<div class="mt-1 mb-3 p-3 button-container bg-white border shadow-sm">
				<div class="row">
					<div class="col-sm-6">
						<h6 class="mb-2">Détails de contact ({{ $contact->name }})</h6>
					</div>
					<div class="col-sm-6">
						<a class="btn btn-info text-white float-right my-3" href="{{ route('contact.edit',['id'=>$contact->id]) }}">Modifier</a>
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
					<div class="col-sm-12">
						<p class="text-muted"><strong>Téléphone:</strong> {{ $contact->phone }}</p>
						@if($contact->phone2) <p class="text-muted"><strong>Téléphone 2:</strong> {{ $contact->phone2 }}</p> @endif
						@if($contact->phone3) <p class="text-muted"><strong>Téléphone 3:</strong> {{ $contact->phone3 }}</p> @endif
						@if($contact->fax) <p class="text-muted"><strong>Fax:</strong> {{ $contact->fax }}</p> @endif
						<p class="text-muted"><strong>Email:</strong> {{ $contact->email }}</p>
						<p class="text-muted"><strong>Adresse:</strong> {{ $contact->address }}</p>
					</div>
				</div>
			</div>
			<!--/Datatable-->

		</div>
	</div>

	@include('admin.includes.modals')

</main>
@endsection