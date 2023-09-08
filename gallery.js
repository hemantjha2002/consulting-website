var modal = document.querySelector(".gallery_modal");
var trigger = document.querySelector(".trigger");
var closeButton = document.querySelector(".close-button");

function toggleModal() {
    modal.classList.toggle("show_modal");
}

function windowOnClick(event) {
    if (event.target === modal) {
        toggleModal();
    }
}

trigger.addEventListener("click", toggleModal);
closeButton.addEventListener("click", toggleModal);
window.addEventListener("click", windowOnClick);

document.addEventListener("DOMContentLoaded", function () {
    $('[data-fancybox="gallery"]').fancybox({
        buttons: [
            "slideShow",
            "thumbs",
            "zoom",
            "fullScreen",
            "share",
            "close"
        ],
        loop: false,
        protect: true
    });
});