// document.addEventListener("DOMContentLoaded", function () {
//     const navbar = document.querySelector(".custom-navbar");
//     const headerHeight = document.querySelector(".custom-header").offsetHeight;

//     window.addEventListener("scroll", function () {
//         if (window.scrollY > headerHeight) {
//             navbar.classList.add("is-sticky");
//         } else {
//             navbar.classList.remove("is-sticky");
//         }
//     });
// });

function displaySelectedImage(event, elementId) {
    const selectedImage = document.getElementById(elementId);
    const fileInput = event.target;

    if (fileInput.files && fileInput.files[0]) {
        const reader = new FileReader();

        reader.onload = function (e) {
            selectedImage.src = e.target.result;
        };

        reader.readAsDataURL(fileInput.files[0]);
    }
}
