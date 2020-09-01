<p class="text-muted"><strong>Titre:</strong> {{ $details->title }}</p>
<p class="text-muted"><strong>Slug:</strong> {{ $details->slug }}</p>
<p class="text-muted"><strong>Détails:</strong><br> {{ $details->details }}</p>
<div>
	<img src="{{ getImage($details->image) }}" style="max-width: 100%;">
</div>