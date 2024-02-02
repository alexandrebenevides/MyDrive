<div class="container-fluid">
  <div class="mb-4">
    <h4>Meus arquivos</h4>

    <button 
      type="button"
      class="btn btn-primary"
      wire:click="toggleSendFilesModal(true)">
        <i class="fa-solid fa-upload"></i> Enviar arquivos
    </button>

    <button 
      type="button"
      class="btn btn-primary"
      wire:click="toggleCreateFolderModal(true)">
        <i class="fa-solid fa-folder"></i> Nova pasta
    </button>
  </div>

  <div class="card border-0">
    <div class="card-header">
      <h6 class="card-title">
        Diretório atual: /{{ implode('/', $pathStack) }}
      </h6>
    </div>
    <div class="card-body">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">Nome</th>
            <th scope="col">Última alteração</th>
            <th scope="col">Tamanho</th>
            <th scope="col">Ações</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($listTree as $key => $item)
          <tr>
            <th scope="row">
              <i class="fa-regular fa-{{ ($item['size'] > 0) ? 'file' : 'folder' }}"></i>
              {{ $key }}
            </th>
            <td>{{ $item['lastModified'] }}</td>
            <td>{{ $item['size'] }} bytes</td>
            <td>
              <button 
                type="button"
                class="btn btn-primary btn-sm"
                wire:click="removeItem('{{ $item['objectKey'] }}')">
                  <i class="fa-solid fa-trash"></i>
              </button>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

  @include('livewire.pages.dashboard.modals.send-files')
  @include('livewire.pages.dashboard.modals.create-folder')
</div>