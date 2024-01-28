<?php

namespace App\Livewire\Pages\Dashboard;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Services\Contracts\MyFilesServiceInterface;

class MyFiles extends Component
{
    use WithFileUploads;
    
    public $files;
    public $folderName;

    public function render()
    {
        return view('livewire.pages.dashboard.my-files');
    }

    public function boot(MyFilesServiceInterface $myFilesService)
    {
        $this->myFilesService = $myFilesService;
    }

    public function toggleSendFilesModal($action)
    {
        $this->dispatch('toggleSendFilesModal', action: $action);
    }

    public function toggleCreateFolderModal($action)
    {
        $this->dispatch('toggleCreateFolderModal', action: $action);
    }

    public function uploadFiles()
    {
        $this->myFilesService->uploadFiles($this->files);
    }

    public function createFolder()
    {
        $this->myFilesService->createFolder($this->folderName);
    }
}
