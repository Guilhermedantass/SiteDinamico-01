function typeWrite(elemento){
    const textoArray = elemento.innerHTML.split('');
    elemento.innerHTML = '';
    textoArray.forEach((letra, i ) => {
        setTimeout(() =>
            elemento.innerHTML += letra, 75 * i);
    });
}

const title = document.querySelector("#title-contato");
typeWrite(title);