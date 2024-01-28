<div class="modal fade" id="createFolderModal" tabindex="-1" wire:ignore.self>
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5">Criar nova pasta</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form>
            <div class="mb-3">
              <label class="form-label">Nome da nova pasta</label>
              <input class="form-control" type="text" name="folderName" wire:model="folderName">
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" wire:click="toggleCreateFolderModal(false)">Fechar</button>
          <button type="button" class="btn btn-primary" data-bs-dismiss="modal" wire:click="createFolder">Criar</button>
        </div>
      </div>
    </div>
  </div>