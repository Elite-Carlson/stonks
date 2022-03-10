const eye = document.querySelector(".eye");
const password = document.querySelector(".password");

function unhide(){
    if (eye.className == "eye") {
        eye.className = "view";
        password.type = "text";
    } else {
        eye.className = "eye";
        password.type = "password";
    }
}
eye.addEventListener("click", unhide);