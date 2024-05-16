document.addEventListener("DOMContentLoaded", function () {
    const modalButton = document.querySelector(
        '[data-modal-toggle="createProductModal"]'
    );
    const modal = document.getElementById("createProductModal");
    const modelClose = document.getElementById("close");

    modalButton.addEventListener("click", function () {
        modal.classList.toggle("hidden");
        modal.classList.add("flex");
    });
    modelClose.addEventListener("click", function () {
        modal.classList.toggle("flex");
        modal.classList.add("hidden");
    });
});
