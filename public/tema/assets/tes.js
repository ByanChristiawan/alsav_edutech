function toggleClass() {
    const parentElement = document.getElementById("buttonDays"); // Get the parent element
    const childElement = parentElement.querySelector(".acc"); // Get the child element
    const childTwoElemnt = parentElement.querySelector(".hover-color");

    const classesToAdd = ["bg-black", "text-white"];

    // Toggle the class on the child element
    childElement.classList.toggle("bg-black");
    childTwoElemnt.classList.remove("hover-color");
    classesToAdd.forEach(function(newClass) {
        childTwoElemnt.classList.toggle(newClass);
    });
  }