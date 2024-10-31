document.addEventListener("DOMContentLoaded", function () {
    const navbar = document.querySelector(".custom-navbar");
    const headerHeight = document.querySelector(".custom-header").offsetHeight;

    window.addEventListener("scroll", function () {
        if (window.scrollY > headerHeight) {
            navbar.classList.add("is-sticky");
        } else {
            navbar.classList.remove("is-sticky");
        }
    });
});