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
    public $pathStack = [];
    public $listTree = [];
    public $path = '';

    public function render()
    {
        return view('livewire.pages.dashboard.my-files');
    }

    public function boot(MyFilesServiceInterface $myFilesService)
    {
        $this->myFilesService = $myFilesService;
    }

    public function mount()
    {
        $this->getListTree();
    }

    public function getListTree()
    {
        $this->listTree = $this->myFilesService->getFilesFromPath($this->pathStack);
    }

    public function toggleSendFilesModal(bool $action)
    {
        $this->dispatch('toggleSendFilesModal', action: $action);
    }

    public function toggleCreateFolderModal(bool $action)
    {
        $this->dispatch('toggleCreateFolderModal', action: $action);
    }

    public function uploadFiles()
    {
        $this->myFilesService->uploadFiles($this->files, $this->path);
        $this->getListTree();
    }

    public function createFolder()
    {
        $this->myFilesService->createFolder($this->folderName, $this->path);
        $this->getListTree();
    }

    public function removeItem(string $objectKey)
    {
        $this->myFilesService->removeItem($objectKey);
        $this->getListTree();
    }

    public function moveDirectory(string $folderName = null)
    {
        if (is_null($folderName)) {
            array_pop($this->pathStack);
        } else {
            array_push($this->pathStack, $folderName);
        }

        $this->path = count($this->pathStack) > 0 ? implode('/', $this->pathStack) . '/' : '';
        $this->getListTree();
    }
}
