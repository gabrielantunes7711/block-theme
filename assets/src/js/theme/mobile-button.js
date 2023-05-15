$(document).ready(function(){
    if(window.screen.width <= 1023){
        $('.menu-mobile').click(function() {
            $(this).toggleClass('open');
            $('.menu-list').toggleClass('menu-list--active');
            $('body').toggleClass('-locked');
            $('.sub-menu').removeClass('-active');
        });
    }
});