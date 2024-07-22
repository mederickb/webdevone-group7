document.addEventListener("DOMContentLoaded", function() {
    const menuToggle = document.querySelector(".menu-toggle");
    const listContainer = document.querySelector(".list-container");

    menuToggle.addEventListener("click", function() {
        listContainer.classList.toggle("show");
    });
});