function previewImage(event) {
    const input = event.target;
    const reader = new FileReader();
    reader.onload = function() {
        const preview = document.getElementById('preview');
        preview.src = reader.result;
        preview.classList.remove('hidden');
    }
    if (input.files && input.files[0]) {
        reader.readAsDataURL(input.files[0]);
    }
}
