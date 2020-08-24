<div>
	<p class="text-muted"><strong>Label:</strong> {{ $details->name }}</p>
	<p class="text-muted"><strong>Description:</strong> {{ $details->details }}</p>
</div>
<div class="img img--slider" style="position: relative;width: 100%;">
	<img src="{{ getImage($details->image) }}" style="max-width: 100%;">
</div>