/* Este código agrega detectores de eventos a los elementos 'openMenu' y 'closeMenu'. Cuando el 'openMenu'
se hace clic en el elemento, agrega la clase "aside-visible" al elemento 'aside', haciéndolo visible.
Cuando se hace clic en el elemento 'closeMenu', se elimina la clase "aside-visible" de la clase 'aside'
elemento que se oculta. */
const openMenu = document.querySelector("#open-menu");
const closeMenu = document.querySelector("#close-menu");
const aside = document.querySelector("aside");

openMenu.addEventListener("click", () => {
    aside.classList.add("aside-visible");
})

closeMenu.addEventListener("click", () => {
    aside.classList.remove("aside-visible");
})