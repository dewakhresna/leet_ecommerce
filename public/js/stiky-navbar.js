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

// Skrip untuk menambah varian
// document.addEventListener("DOMContentLoaded", function () {
//     const maxVarian = 4;
//     let varianCount = 1; // Mulai dengan varian default
//     const tambahVarianBtn = document.getElementById("tambah-varian");
//     const varianWrapper = document.querySelector(".varian-wrapper .col-sm-10");

//     function createVarianElement() {
//         if (varianCount < maxVarian) {
//             varianCount++;
//             const varianDiv = document.createElement("div");
//             varianDiv.className = "varian-item mb-2";
//             varianDiv.innerHTML = `
//                 <select class="form-select" aria-label="Default select example">
//                     <option selected>Pilih Varian</option>
//                     <option value="S">S</option>
//                     <option value="M">M</option>
//                     <option value="L">L</option>
//                     <option value="XL">XL</option>
//                     <option value="2XL">2XL</option>
//                 </select>
//                 <input type="number" class="form-control" placeholder="Jumlah Stock">
//                 <button type="button" class="btn btn-danger btn-sm">Hapus Varian</button>
//             `;
//             varianWrapper.appendChild(varianDiv);

//             const hapusVarianBtn = varianDiv.querySelector("button");
//             hapusVarianBtn.addEventListener("click", function () {
//                 varianDiv.remove();
//                 varianCount--;
//                 toggleTambahVarianButton();
//             });

//             toggleTambahVarianButton();
//         }
//     }

//     function toggleTambahVarianButton() {
//         tambahVarianBtn.disabled = varianCount >= maxVarian;
//     }

//     tambahVarianBtn.addEventListener("click", function () {
//         createVarianElement();
//     });
// });

document.addEventListener("DOMContentLoaded", function () {
    const maxVarian = 5;
    let varianCount = 1; // Mulai dengan varian default
    const tambahVarianBtn = document.getElementById("tambah-varian");
    const varianContainer = document.getElementById("varian-container");

    function createVarianElement() {
        if (varianCount < maxVarian) {
            varianCount++;
            const varianDiv = document.createElement("div");
            varianDiv.className = "varian-item mt-2";
            varianDiv.innerHTML = `
                        <select class="form-select" name="stock[]" aria-label="Default select example">
                            <option selected>Pilih Varian</option>
                            <option value="S">S</option>
                            <option value="M">M</option>
                            <option value="L">L</option>
                            <option value="XL">XL</option>
                            <option value="2XL">2XL</option>
                        </select>
                        <input type="number" class="form-control" name="stock[]" placeholder="Jumlah Stock">
                        <button type="button" class="btn btn-danger btn-sm hapus-varian">Hapus Varian</button>
            `;
            varianContainer.appendChild(varianDiv);

            // Event listener for removing the variant
            const hapusVarianBtn = varianDiv.querySelector(".hapus-varian");
            hapusVarianBtn.addEventListener("click", function () {
                varianDiv.remove();
                varianCount--;
                toggleTambahVarianButton();
            });

            toggleTambahVarianButton();
        }
    }

    function toggleTambahVarianButton() {
        tambahVarianBtn.disabled = varianCount >= maxVarian;
    }

    tambahVarianBtn.addEventListener("click", function () {
        createVarianElement();
    });
});
