$(function () {
    // var INCLUDE_PATH = $('base').attr('base');
    // Aqui vai o codigo js
    $("nav.mobile").click(function () {
        //OQUE VAI ACONTECER QUANDO CLICAR NA NAV MOBILE
        var listamenu = $("nav.mobile ul");
        var botaomobile = $("nav.mobile .botao-menu-mobile i")

        if (listamenu.is(":hidden")) {
            listamenu.slideToggle();
            botaomobile.removeClass("fa-solid fa-bars");
            botaomobile.addClass("fa-solid fa-xmark");
        } else {
            listamenu.slideToggle();
            botaomobile.removeClass("fa-solid fa-xmark");
            botaomobile.addClass("fa-solid fa-bars");
        }
    })


    if ($('target').length > 0) {
        // elemento existe e vai dar um scroll
        var elemento = '#' + $('target').attr('target');
        var divScroll = $(elemento).offset().top;
        $('html, body').animate({
            'scrollTop': divScroll
        }, 2000)
    }

    //carregarDinamico();

    // function carregarDinamico() {
    //     $("[realtime]").click(function () {
    //         var pagina = $(this).attr('realtime');
    //         $('.conteiner-principal').hide();
    //         $('.conteiner-principal').load(INCLUDE_PATH+'pages/'+pagina+'.php');
    //         $('.conteiner-principal').fadeIn(2000)
    //         return false;
    //     })
    // }

    

})



// FAZENDO COM FADEIN/FADEOUT      
// if(listamenu.is(':hidden'))
//     listamenu.fadeIn();
// else
//     listamenu.fadeOut();