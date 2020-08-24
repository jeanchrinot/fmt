<div class="avatar avatar--details">
	<div class="avatar__left">
		<img src="{{ getUserImage($details->image) }}" alt="" class="rounded-circle" style="margin-top: 0;" />
	</div>
	<div class="avatar__right">
		<p class="text-muted"><strong>Nom:</strong> {{ $details->surname }} <strong>Prénoms:</strong> {{ $details->name }}</p>
        <p class="text-muted"><strong>Type:</strong> {{ getMemberType($details->type) }}</p>
	</div>      
</div>
<p class="text-muted"><strong>Email:</strong> {{ $details->email }}</p>
<p class="text-muted"><strong>Téléphone:</strong> {{ $details->phone }}</p>
<p class="text-muted"><strong>Ville:</strong> {{ province($details->province) }}</p>
<p class="text-muted"><strong>Date de naissance:</strong> {{ date_format(date_create($details->birthday),"d/m/Y") }}</p>
<p class="text-muted"><strong>Département:</strong> {{ $details->department }}</p>
<p class="text-muted"><strong>Genre:</strong> {{ gender($details->gender) }}</p>