<p class="text-muted"><strong>Titre:</strong> {{ $details->name }}</p>
<p class="text-muted"><strong>Slug:</strong> {{ $details->slug }}</p>
<p class="text-muted"><strong>Date:</strong> {{ formatDateTime($details->activity_date) }}</p>
<p class="text-muted"><strong>Détails:</strong><br> {{ $details->details }}</p>
<div>
	<img src="{{ getImage($details->image) }}" style="max-width: 100%;">
</div>