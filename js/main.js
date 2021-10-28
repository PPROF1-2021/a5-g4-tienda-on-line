/* _______Menu hamburguesa________*/
const hamMenu = document.querySelector(".hamMenu");
const navLinks = document.querySelector(".navLinks");

hamMenu.addEventListener("click", () => {
  navLinks.classList.toggle("active");
});

/* _______Validación de formularios________ (solo feedback de bootstrap por ahora)*/

const formularios = document.querySelector('.formularios');
const formSubmit = document.querySelector('.submitBtn');

formSubmit.addEventListener("click", (e) => {
  formularios.classList.add("was-validated");
});

