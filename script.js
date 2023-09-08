

const accordionItemHeaders = document.querySelectorAll(".accordion1-item-header");

accordionItemHeaders.forEach((accordionItemHeader) => {
    accordionItemHeader.addEventListener("click", (event) => {
        const currentlyActiveAccordionItemHeader = document.querySelector(".accordion1-item-header.active");

        if (currentlyActiveAccordionItemHeader && currentlyActiveAccordionItemHeader !== accordionItemHeader) {
            currentlyActiveAccordionItemHeader.classList.toggle("active");
            currentlyActiveAccordionItemHeader.nextElementSibling.style.maxHeight = 0;
        }

        accordionItemHeader.classList.toggle("active");
        const accordionItemBody = accordionItemHeader.nextElementSibling;

        if (accordionItemHeader.classList.contains("active")) {
            accordionItemBody.style.maxHeight = accordionItemBody.scrollHeight + "px";
        } else {
            accordionItemBody.style.maxHeight = 0;
        }

        // Adding or removing a 'selected' class for styling
        accordionItemHeaders.forEach(header => {
            if (header !== accordionItemHeader) {
                header.classList.remove("selected");
            }
        });

        accordionItemHeader.classList.toggle("selected");
    });
});
const hamburger = document.querySelector(".hamburger");
const navLinks = document.querySelector(".nav_links");
const links = document.querySelectorAll(".nav_links li");

hamburger.addEventListener('click', () => {
    //Animate Links
    navLinks.classList.toggle("open");
    links.forEach(link => {
        link.classList.toggle("fade");
    });

    //Hamburger Animation
    hamburger.classList.toggle("toggle");
});
// -------------------------------gallery_section---------------------------
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
// ------------------------------------------------------------------carousel_client_section------------------------------------
