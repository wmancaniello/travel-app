<!-- Modale di conferma eliminazione -->
<div class="modal fade mt-5" id="deleteModal{{ $trip->id }}" tabindex="-1"
    aria-labelledby="deleteModalLabel{{ $trip->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel{{ $trip->id }}">Conferma Cancellazione</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Sei sicuro di voler cancellare il viaggio: <strong>{{ $trip->title }}</strong>?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                <form action="{{ route('admin.trips.destroy', $trip->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Cancellare</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /Modale di conferma eliminazione -->