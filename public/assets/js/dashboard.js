if (Livewire != undefined) {
    createLivewireEvents();
} else {
    document.addEventListener('livewire:initialized', function () {
        createLivewireEvents();
    });
}

function createLivewireEvents() {
    const sendFilesModal = new bootstrap.Modal('#sendFilesModal', {});
    const createFolderModal = new bootstrap.Modal('#createFolderModal', {});
    
    Livewire.on('toggleSendFilesModal', (event) => {
        event.action ? sendFilesModal.show() : sendFilesModal.hide();
    });

    Livewire.on('toggleCreateFolderModal', (event) => {
        event.action ? createFolderModal.show() : createFolderModal.hide();
    });
}