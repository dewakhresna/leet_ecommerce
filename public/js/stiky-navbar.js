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
    const maxVarian = 4;
    let varianCount = 0; // Mulai dengan varian default
    const tambahVarianBtn = document.getElementById("tambah-varian");
    const varianContainer = document.getElementById("varian-container");

    function createVarianElement() {
        if (varianCount < maxVarian) {
            varianCount++;
            const varianDiv = document.createElement("div");
            varianDiv.className = "varian-item mt-2";
            varianDiv.innerHTML = `
                        <select class="form-select" name="varian[${varianCount}]" aria-label="Default select example">
                            <option selected>Pilih Varian</option>
                            <option value="S">S</option>
                            <option value="M">M</option>
                            <option value="L">L</option>
                            <option value="XL">XL</option>
                            <option value="2XL">2XL</option>
                        </select>
                        <input type="number" class="form-control" name="stok[${varianCount}]" placeholder="Jumlah Stock">
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


document.addEventListener("DOMContentLoaded", function () {
    // Batas maksimal varian untuk edit produk
    const maxVarianEdit = 4;
    let varianCountEdit = 0; // Mulai dengan varian default di halaman edit
    const tambahVarianBtnEdit = document.getElementById("tambah-varian-edit");
    const varianContainerEdit = document.getElementById("varian-container-edit");

    if (!tambahVarianBtnEdit || !varianContainerEdit) {
        console.error("Elemen tambah-varian-edit atau varian-container-edit tidak ditemukan.");
        return;
    }

    // Fungsi untuk membuat elemen varian baru pada halaman edit
    function createVarianElementEdit() {
        if (varianCountEdit < maxVarianEdit) {
            varianCountEdit++;
            const varianDivEdit = document.createElement("div");
            varianDivEdit.className = "varian-item-edit mt-2";
            varianDivEdit.id = `varian-${varianCountEdit}`; // ID unik untuk setiap varian
            varianDivEdit.innerHTML = `
                <select class="form-select" name="varian[${varianCountEdit}]" aria-label="Default select example">
                    <option selected>Pilih Varian</option>
                    <option value="S">S</option>
                    <option value="M">M</option>
                    <option value="L">L</option>
                    <option value="XL">XL</option>
                    <option value="2XL">2XL</option>
                </select>
                <input type="number" class="form-control" name="stok[${varianCountEdit}]" placeholder="Jumlah Stock">
                <button type="button" class="btn btn-danger btn-sm hapus-varian-edit">Hapus Varian</button>
            `;
            varianContainerEdit.appendChild(varianDivEdit);

            // Event listener untuk tombol hapus di elemen varian yang baru
            const hapusVarianBtnEdit = varianDivEdit.querySelector(".hapus-varian-edit");
            hapusVarianBtnEdit.addEventListener("click", function () {
                varianDivEdit.remove();
                // Hitung ulang jumlah elemen varian yang ada setelah dihapus
                varianCountEdit = varianContainerEdit.querySelectorAll('.varian-item-edit').length;
                toggleTambahVarianButtonEdit();
            });

            toggleTambahVarianButtonEdit();
        }
    }

    // Fungsi untuk mengaktifkan/menonaktifkan tombol "Tambah Varian" pada halaman edit
    function toggleTambahVarianButtonEdit() {
        tambahVarianBtnEdit.disabled = varianCountEdit >= maxVarianEdit;
    }

    // Event listener untuk tombol tambah varian di halaman edit
    tambahVarianBtnEdit.addEventListener("click", function () {
        createVarianElementEdit();
    });
});