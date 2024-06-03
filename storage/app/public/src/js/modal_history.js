function modalHandler() {
    return {
        isOpen: false,
        modalData: {
            id: null,
            photo: '',
            result: '',
            date: ''
        },
        openModal(id, photo, result, date) {
            this.modalData.id = id;
            this.modalData.photo = photo;
            this.modalData.result = result;
            this.modalData.date = date;
            this.isOpen = true;
        },
        closeModal() {
            this.isOpen = false;
        }
    };
}

function deleteModalHandler() {
    return {
        isDeleteOpen: false,
        deleteId: null,
        openDeleteModal(id) {
            this.deleteId = id;
            this.isDeleteOpen = true;
        },
        closeDeleteModal() {
            this.isDeleteOpen = false;
        },
        confirmDelete() {
            @this.call('confirmDelete', this.deleteId);
            this.closeDeleteModal();
        }
    };
}
