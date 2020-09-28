$("#owlCarousel").owlCarousel({
        loop:true,
        dots:true,
        center:true,
        nav:true,
        navText: ["<i class='fa fa-arrow-left'></i>",
        "<i class='fa fa-arrow-right'></i>"],
        responsive:{
            0:{
                items:1
            },
            768:{
                items:3
            },
            1000:{
                items:3
            }
        }
})
$("#aloqa").click(function(){
    $('.bg-choose').css('left','50%')
    $("#con").animate({
        left:0
    },500);
    $("#reg").animate({
        right: -1000
    },500);
});
$("#ariza").click(function(){
    $('.bg-choose').css('left','0%')
    $("#con").animate({
        left:-1000
    },500);
    $("#reg").animate({
        right: 0
    },500)
})
