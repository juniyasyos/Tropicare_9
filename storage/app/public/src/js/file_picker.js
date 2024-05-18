const fileInput = document.getElementById("filePicker");
const preview = document.getElementById("preview");
const fileInputOverlay = document.getElementById("fileInputOverlay");

fileInput.addEventListener("change", function () {
    const file = this.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function () {
            preview.src = reader.result;
            preview.classList.remove("hidden");
            fileInputOverlay.style.display = "none";
        };
        reader.readAsDataURL(file);
    } else {
        preview.src = "";
        preview.classList.add("hidden");
        fileInputOverlay.style.display = "flex";
    }
});

// document.addEventListener("livewire:load", function () {
//     var loadingContainer = document.getElementById('loadingContainer');
//     var dataImage = loadingContainer.dataset.image;
//     const axios = require("axios");
//     const fs = require("fs");

//     const image = fs.readFileSync(dataImage, {
//         encoding: "base64",
//     });

//     axios({
//         method: "POST",
//         url: "https://outline.roboflow.com/p_diseases/1",
//         params: {
//             api_key: "ocI0aRkXvOCRimVsznZU",
//         },
//         data: image,
//         headers: {
//             "Content-Type": "application/x-www-form-urlencoded",
//         },
//     })
//         .then(function (response) {
//             console.log(response.data);
//         })
//         .catch(function (error) {
//             console.log(error.message);
//         });
// });
