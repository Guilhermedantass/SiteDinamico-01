$(function () {

    var open = true;

    var windowSize = $(window)[0].innerWidth;

    var targetSizeMenu = (windowSize < 400 ? 200 : 300) 

    

    if(windowSize <= 768){
        open = false;
        $('.menu').css({'width':'0', 'padding':'0', 'display':'block'});
    }
    
    $('.menu-btn').click(function(){
       if(open){
           $('.menu').animate({'width':'0', 'padding':'0'});
           $('.content, header').css({'width':'100%'});
           $('.content, header').animate({'left':'0'});
           open = false;

       }else{
        $('.menu').animate({'width':targetSizeMenu+'px', 'padding':'10'});
        $('.content, header').animate({'left':targetSizeMenu+'px'});
        //$('.content, header').css({'width':'calc(100% - 300px)'});
        open = true;
       }
    })
})