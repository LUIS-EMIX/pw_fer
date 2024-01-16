$(function(){
    var $header = $('#header'),
        $headerHeight = $header.innerHeight(),
        $nav = $('#navigation');

        // EFECTO DE SUAVIDAD

        $('a.scroll').click(function(e){
            e.preventDefault();
            $('html, body').stop().animate({scrollTop: $($(this).attr('href')).offset().top}, 1000);
        });

        // SCROLL

        $(document).ready(function(){
            $("html").niceScroll({
                cursorcolor: "aqua",
                zindex: 1100,
                cursorborderradius: 3,
                cursorborder: "1px solid #001f3f",
                horizrailenable: false,
                cursorfixedheight: 120,
                cursorwidht: "40px",
            });
        });
});
