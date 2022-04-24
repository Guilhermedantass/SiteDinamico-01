function typeWrite(elemento) {
    const textoArray = elemento.innerHTML.split('');
    elemento.innerHTML = '';
    textoArray.forEach((letra, i) => {
        setTimeout(() =>
            elemento.innerHTML += letra, 75 * i);
    });
}

const title = document.querySelector("#title-contato");

const title_banner_conteiner = document.querySelector("#title-banner-conteiner");

const title_noticias_conteiner = document.querySelector("#title-noticias-conteiner");


if (title != null) {
    typeWrite(title);
}
if (title_banner_conteiner != null) {
    typeWrite(title_banner_conteiner);
}
// if (title_noticias_conteiner != null) {
//     typeWrite(title_noticias_conteiner);
// }