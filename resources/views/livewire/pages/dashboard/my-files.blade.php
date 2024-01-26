<div class="container-fluid">
  <div class="mb-4">
    <h4>Meus arquivos</h4>

    <button 
      type="button"
      class="btn btn-primary"
      wire:click="toggleSendFilesModal(true)">
        <i class="fa-solid fa-upload"></i> Enviar arquivos
    </button>
  </div>

  <div class="card border-0">
    <div class="card-header">
      <h6 class="card-title">
        Diretório atual: /
      </h6>
    </div>
    <div class="card-body">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">Nome</th>
            <th scope="col">Data</th>
            <th scope="col">Tamanho</th>
            <th scope="col">Ações</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">Teste</th>
            <td>01/01/2024</td>
            <td>12548784 bytes</td>
            <td>Botões</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

  @include('livewire.pages.dashboard.modals.send-files')
</div>