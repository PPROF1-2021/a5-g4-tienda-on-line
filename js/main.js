/* _______Menu hamburguesa________*/
const hamMenu = document.querySelector('.hamMenu');
const navLinks = document.querySelector('.navLinks');

hamMenu.addEventListener('click', () => {
    navLinks.classList.toggle('active');
});