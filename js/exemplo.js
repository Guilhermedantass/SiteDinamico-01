$(function () {

    var atual = -1;

    var maximo = $('.box-especialidades').length - 1;

    var timer;

    var animacaoDelay = 2;


    $(window).on("load scroll", function(){
        $(".box-especialidades").each(function(){
           
            var el = $(this);
            var eleHeight = el.outerHeight(); // altura da div
            var eleTopo = el.offset().top; // distancia da div ao topo do documento
            var scrlTopo = $(window).scrollTop(); // quanto foi rolada a janela
            var distance = eleTopo-scrlTopo; // distancia da div ao topo da janela
            var altJanela = window.innerHeight; // altura da janela
            if(distance <= altJanela-(eleHeight/2)) {
                el.eq(atual).animate({ 'opacity': 1 }, 1000);
                
                
            }
        });
    });



})