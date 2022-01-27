<div class="modal fade" id="details-modal" tabindex="-1" role="dialog" aria-labelledby="label_message"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="label_message">Détails</h5>
                <button type="button" class="close close-message" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="details-modal-body">
                <p class="text-muted"><strong>Nom et prenom :</strong><span id="nameSender"></span></p>
                <p class="text-muted"><strong>Email:</strong><span id="email"></span></p>
                <p class="text-muted"><strong>Téléphone:</strong><span id="phone"></span></p>
                <p class="text-muted"><strong>Sujet :</strong><span id="subject"></span></p>
                <p class="text-muted"><strong>Message :</strong></p>
                <p class="small" id="messageContent"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info close-message" data-dismiss="modal"
                    id="msg-close-btn">Fermer</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Suppression -->
<div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="label_message"
    aria-hidden="true">
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
                <button data-token={{ csrf_token() }} type="button" class="btn btn-danger" id="confirm-delete">
                    Supprimer</button>
                <button type="button" class="btn btn-info" data-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="responseModal" tabindex="-1" role="dialog" 
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Message</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Message envoyé avec succès !</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>
