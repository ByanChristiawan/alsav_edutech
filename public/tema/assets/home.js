const loader = document.getElementById("bg-loader")
document.addEventListener("DOMContentLoaded", () => {
    loader.classList.remove("flex")
    loader.classList.add("hidden")
    document.getElementById("app").classList.remove("hidden")
})

document.querySelectorAll(".items").forEach(item => {
    item.addEventListener("click", (e) => {
      const href = item.getAttribute("href");
  
      if (href === "#") {
        const popupContainer = document.getElementById("popupContainer");
        popupContainer.style.right = "0"; 
  
        setTimeout(function () {
          popupContainer.style.right = "-100%"; 
        }, 3000);
      }
    });
  });
