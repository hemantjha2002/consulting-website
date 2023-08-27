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