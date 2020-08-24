<p class="text-muted"><strong>Nom et prenom :</strong> {{ $message->name }} {{ $message->surname }}</p>
<p class="text-muted"><strong>Email:</strong> {{ $message->email }}</p>
<p class="text-muted"><strong>Téléphone:</strong> {{ $message->phone }}</p>
<p class="text-muted"><strong>Sujet :</strong>{{ $message->subject }}</p>
<p class="text-muted"><strong>Message :</strong></p>
<p class="small">{{ $message->message }}</p>