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

<main class="col-sm-9 col-xs-12 content pt-3 pl-0">
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
			<div class="table-responsive">
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
						@foreach($messages as $message)
						<tr>
							<td class="align-middle text-center">{{ $message->subject }}</td>
							<td  class="align-middle text-center">{{ date_format($message->created_at,"d/m/Y H:i") }}</td>
							<th>{{ substr($message->message,0,39) }}{{ strlen($message->message)> 40 ? '...' : '' }}</th>
							<td class="align-middle"><span class="badge {{ ($message->viewed) ? 'badge-success':'badge-info' }}">{{ ($message->viewed) ? 'lu':'nouveau' }}</span></td>
							<td class=" align-middle text-center d-flex justify-content-center">
								<button class="action btn btn-theme" data-toggle="modal" data-target="#detail_message">
									<i class="fa fa-eye"></i>
								</button>
								<button class="action btn btn-danger" data-toggle="modal" data-target="#delete_message"><i class="fa fa-trash"></i></button>
							</td>
						</tr>
						@endforeach
						<tr>
							<td class="align-middle text-center">Message 2</td>
							<td  class="align-middle text-center">21/08/2019</td>
							<th>Lorem ipsum dolor sit amet...</th>
							<td class="align-middle"><span class="badge badge-info">nouveau</span></td>
							<td class=" align-middle text-center d-flex justify-content-center">
								<button class="action btn btn-theme view_message" data-toggle="modal" data-target="#detail_message">
									<i class="fa fa-eye"></i>
								</button>
								<button class="action btn btn-danger delete_message" data-toggle="modal" data-target="#delete_message"><i class="fa fa-trash"></i></button>
							</td>
						</tr>
						
					</tbody>
				</table>
			</div>
			<!--End message-->
		</div>

		
		
	</div><!--End page Index-->

	<!-- Modal message -->
	<div class="modal fade" id="detail_message" tabindex="-1" role="dialog" aria-labelledby="label_message" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="label_message">Details du message</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<p class="text-muted"><strong>Nom et prenom :</strong> Lorem ipsum dolor</p>
					<p class="text-muted"><strong>Email:</strong> lorem@gmail.com</p>
					<p class="text-muted"><strong>Telephone:</strong> 0331172082</p>
					<p class="text-muted"><strong>Sujet :</strong>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
					<p class="text-muted"><strong>Message :</strong></p>
					<p class="small">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eveniet assumenda placeat aperiam ex praesentium consequatur blanditiis delectus distinctio dicta. Dolorum!</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-info" data-dismiss="modal">Fermer</button>	
				</div>
			</div>
		</div>
	</div>

	<!-- Modal message -->
	<div class="modal fade" id="delete_message" tabindex="-1" role="dialog" aria-labelledby="label_message" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="label_message">Suppression</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<p>Voulez-vous supprimer?</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal">Supprimer</button>	
					<button type="button" class="btn btn-info" data-dismiss="modal">Fermer</button>	
				</div>
			</div>
		</div>
	</div>

</main>
@endsection
