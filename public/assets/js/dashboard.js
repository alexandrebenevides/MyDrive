if (Livewire != undefined) {
    createLivewireEvents();
} else {
    document.addEventListener('livewire:initialized', function () {
        createLivewireEvents();
    });
}

function createLivewireEvents() {
    const sendFilesModal = new bootstrap.Modal('#sendFilesModal', {});
    
    Livewire.on('toggleSendFilesModal', (event) => {
        event.action ? sendFilesModal.show() : sendFilesModal.hide();
    });
}