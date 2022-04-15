function typeWrite(elemento){
    const textoArray = elemento.innerHTML.split('');
    elemento.innerHTML = '';
    textoArray.forEach((letra, i ) => {
        setTimeout(() =>
            elemento.innerHTML += letra, 75 * i);
    });
}

const title = document.querySelector("#title-contato");

const title_banner_conteiner = document.querySelector("#title-banner-conteiner");


if (title == null) {
    typeWrite(title_banner_conteiner);

}else{
    typeWrite(title);
}



