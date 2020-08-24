@extends('admin.layout')
@section('title','Dashboard')

@section('main')

@if($data)
	@php
	// Membre de bureau
	$office_members = $data['office_members'];
	$nb_om = count($office_members);
	// Membres
	$nb_m = count($data['users']);

	//Admin web

    $users = json_decode(json_encode($data['users']), true);
	$nb_admin = count(array_filter($users, function ($user) {
                        return ($user['type'] == 2);
                    }));

    $messages = $data['messages'];

	@endphp
@endif

<main class="col-sm-9 col-xs-12 content pt-3 pl-0" id="app">
	<h5 class="mb-3" ><strong>dashboard</strong></h5>


	<div class="mt-1 mb-3 button-container">
		<div class="row pl-0">
			<div class="col-lg-4 col-md-4 col-sm-6 col-12 mb-3">
				<div class="bg-white border shadow">
					<div class="media p-4">
						<div class="align-self-center mr-3 rounded-circle notify-icon bg-theme">
							<i class="fa fa-user"></i>
						</div>
						<div class="media-body pl-2">
							<h3 class="mt-0 mb-0"><strong>{{ $nb_m }}</strong></h3>
							<p><small class="text-muted bc-description">nombre des membres</small></p>
						</div>
					</div>
				</div>
			</div>

			<div class="col-lg-4 col-md-4 col-sm-6 col-12 mb-3">
				<div class="bg-white border shadow">
					<div class="media p-4">
						<div class="align-self-center mr-3 rounded-circle notify-icon bg-danger">
							<i class="fa fa-envelope-open"></i>
						</div>
						<div class="media-body pl-2">
							<h3 class="mt-0 mb-0"><strong>{{ $nb_om }}</strong></h3>
							<p><small class="text-muted bc-description">membres de bureau</small></p>
						</div>
					</div>
				</div>
			</div>

			<div class="col-lg-4 col-md-4 col-sm-6 col-12 mb-3">
				<div class="bg-theme border shadow">
					<div class="media p-4">
						<div class="align-self-center mr-3 rounded-circle notify-icon bg-white">
							<i class="fa fa-users text-theme"></i>
						</div>
						<div class="media-body pl-2">
							<h3 class="mt-0 mb-0"><strong>{{ $nb_admin }}</strong></h3>
							<p><small class="bc-description text-white">admin web</small></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


	<!--page Index-->
	<div class="mt-4 mb-4 p-3 bg-white border shadow-sm lh-sm">
		
		<div class="row">
			<!--Message-->
			<div class="table-responsive with-action" id="contact_message">
				<div class="pt-2">
					<h5 class="mb-4 text-center bc-header">Messages</h5>
				</div>
				<table class="table table-bordered table-striped mt-0 text-center">
					<thead>
						<tr>
							<th>Sujet</th>
							<th>Date</th>
							<th>Contenu</th>
							<th>Status</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@if(count($messages))
						@foreach($messages as $message)
						<tr>
							<td class="align-middle text-center">{{ $message->subject }}</td>
							<td  class="align-middle text-center">{{ date_format($message->created_at,"d/m/Y H:i") }}</td>
							<th>{{ substr($message->message,0,39) }}{{ strlen($message->message)> 40 ? '...' : '' }}</th>
							<td class="align-middle"><span class="badge {{ ($message->viewed) ? 'badge-success':'badge-info' }}">{{ ($message->viewed) ? 'lu':'nouveau' }}</span></td>
							<td class=" align-middle text-center d-flex justify-content-center">
								<message-details-button msg-id="{{ $message->id }}" viewed="{{ $message->viewed }}"></message-details-button>

								<delete-button item-type="message" item-id="{{ $message->id }}"></delete-button>
							</td>
						</tr>
						@endforeach
						@else
						<tr>
							<td colspan="4">Aucun message réçu.</td>
						</tr>
						
						@endif
						
						
					</tbody>
				</table>
			</div>
			<!--End message-->
		</div>

		
		
	</div><!--End page Index-->

	<!-- Modal message -->
	<!-- <div id="messageDetails">
		<message-details></message-details>
	</div> -->
	
	@include('admin.includes.modals')

</main>
@endsection
