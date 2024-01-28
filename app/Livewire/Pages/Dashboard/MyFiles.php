<?php

namespace App\Livewire\Pages\Dashboard;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Services\Contracts\MyFilesServiceInterface;

class MyFiles extends Component
{
    use WithFileUploads;
    
    public $files;

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

    public function uploadFiles()
    {
        $this->myFilesService->uploadFiles($this->files);
    }
}
