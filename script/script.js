let passwordInput = document.getElementById("txtPassword");
let toggle = document.getElementById("btnToggle");
let icon = document.getElementById("eyeIcon");

function togglePassword(){
    if (passwordInput.type === "password"){
        passwordInput.type = "text";
        icon.classList.add("fa-eye-slash");
    } else {
        passwordInput.type = "password";
        icon.classList.remove("fa-eye-slash");
    }
}

toggle.addEventListener('click', togglePassword, false);