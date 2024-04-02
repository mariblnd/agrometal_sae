var contactFormStatus = true;
var itemPopupStatus = true;

function swithContactFormStatus() {
    var element = document.getElementById("contactForm");
    if (contactFormStatus) {
        element.classList.remove("none");
    } else{
        element.classList.add("none");
    }

    contactFormStatus = !contactFormStatus;
}