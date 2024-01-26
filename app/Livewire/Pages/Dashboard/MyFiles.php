<?php

namespace App\Livewire\Pages\Dashboard;

use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\On;

class MyFiles extends Component
{
    use WithFileUploads;
    
    public $files;

    public function render()
    {
        return view('livewire.pages.dashboard.my-files');
    }

    public function toggleSendFilesModal($action)
    {
        $this->dispatch('toggleSendFilesModal', action: $action);
    }

    public function uploadFiles()
    {
        info([$this->files]);
    }
}
