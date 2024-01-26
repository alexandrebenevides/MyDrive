<div class="modal fade" id="sendFilesModal" tabindex="-1" wire:ignore.self>
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5">Enviar arquivos</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="mb-3">
            <label for="formFile" class="form-label">Selecione os arquivos</label>
            <input class="form-control" type="file" name="files" wire:model="files" multiple>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" wire:click="toggleSendFilesModal(false)">Fechar</button>
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal" wire:click="uploadFiles">Enviar</button>
      </div>
    </div>
  </div>
</div>

@push('scripts')
<script>
  document.addEventListener('livewire:init', function () {

    const sendFilesModal = new bootstrap.Modal('#sendFilesModal', {});

    Livewire.on('toggleSendFilesModal', (event) => {
      event.action ? sendFilesModal.show() : sendFilesModal.hide();
    });

  });
</script>
@endpush