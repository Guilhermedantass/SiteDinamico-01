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
         $('.content, header').css({'width':'calc(100% - 250px)'});
        $('.menu').animate({'width':targetSizeMenu+'px', 'padding':'10'});
        $('.content, header').animate({'left':targetSizeMenu+'px'});
        open = true;
       }
    })

    $(window).resize(function () {
        windowSize = $(window)[0].innerWidth;
        if(windowSize <= 768){
            $('.menu').css('width','0').css('padding','0');
            $('.content, header').css({'width':'100%', 'left':'0'});
            open = false;
        }else{
            open = true;
            $('.menu').css('width','250px').css('padding','10px 0');
            $('.content, header').css({'width':'calc(100% - 250px)', 'left':'250px'});
        }
    })
})