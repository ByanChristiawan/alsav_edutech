const passwordInput = document.getElementById("password");
const showBtn = document.getElementById("show")
const iconImg = document.getElementById("iconShow")

showBtn.addEventListener("click", (e) => {
    if (passwordInput.type === "password") {
        passwordInput.type = "text";
        iconImg.src = "/assets/images/hide.png";
    } else {
        passwordInput.type = "password";
        iconImg.src = "/assets/images/show.png";
    }
})