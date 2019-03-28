var $hamburger = $(".hamburger");
var $menuList = $(".nav-content");
var $mainnav = $("#main-nav");

var $largura = $(window).width();
var $altura = $(window).height();

var $top = "";
var $height = "";

if($altura > 2*$largura){
    $height = "231vw";
}else{
    $height = "200vw";
}

if($largura > 1366){
    $top = "-50%";
}else if($largura <= 1366 && $largura > 1150){
    $top = "-40%";
}else if($largura <= 1150 && $largura > 990){
    $top = "-30%";
}else if($largura <= 990 && $largura > 700){
    $top = "-20%";
}else if($largura <= 700 && $largura > 450){
    $top = "-10%";
}else{
    $top = "0%";
}

$hamburger.on("click", function(e) {
    if($hamburger.hasClass("is-active")){
        $menuList.fadeOut(300, function(){
            $('.logo-nav').fadeOut(300);
            $mainnav.animate({
                width: "70px",
                height: "64px",
                top: "40px",
                left: "50%",
                "padding-top": 0,
                "margin-left": "-35px"
            }, 400, function(){
                $hamburger.removeClass("is-active");
            });
        });
    }else{
        $mainnav.animate({
            width: "200%",
            height: $height,
            top: $top,
            left: "-50%",
            "padding-top": "28%",
            "margin-left": 0
        }, 400, function(){
            $hamburger.addClass("is-active");
            $('.logo-nav').fadeIn(300);
            $menuList.fadeIn(300);
        });
    }
});

$('.frm_form_field h4.yellow').on("click", function(e){
    $('.home-parte-1').fadeOut(500, function(){
        $('.parte-2').fadeIn(500);
        $('.frm_submit').fadeIn(500);
    });
});

$('.intro-tel input').mask('(00) 0000-00009');
$('.intro-tel input').keyup(function(event) {
    if($(this).val().length == 15){
        $('.intro-tel input').mask('(00) 00000-0009');
    } else {
        $('.intro-tel input').mask('(00) 0000-00009');
    }
});

$('.tel-sobre input').mask('(00) 0000-00009');
$('.tel-sobre input').keyup(function(event) {
    if($(this).val().length == 15){
        $('.tel-sobre input').mask('(00) 00000-0009');
    } else {
        $('.tel-sobre input').mask('(00) 0000-00009');
    }
});

$('.txt-hover.centro').mouseenter(function(){
    $('.txt-hover.centro p').css({opacity:0, display: 'inline-block'});
    $('.txt-hover.centro p').animate({
        opacity: 1,
        width: "100px"
    }, 400);
});

$('.item-nav.esquerda').mouseenter(function(){
    $('.txt-hover.esquerda').css({opacity:0, display: 'inline-block'});
    $('.txt-hover.esquerda').animate({
        opacity: 1,
        padding: "5px 20px 5px 53px"
    }, 400);
});

$('.item-nav.direita').mouseenter(function(){
    $('.txt-hover.direita').css({opacity:0, display: 'inline-block'});
    $('.txt-hover.direita').animate({
        opacity: 1,
        padding: "5px 53px 5px 20px"
    }, 400);
});

$('.txt-hover.centro').mouseleave(function(){
    $('.txt-hover.centro p').animate({
        width: "1px",
        opacity: 0
    }, 400, function(){
        $('.txt-hover.centro p').css({display: 'none'});
    });
});

$('.item-nav.esquerda').mouseleave(function(){
    $('.txt-hover.esquerda').animate({
        opacity: 0,
        padding: "5px 0px"
    }, 400, function(){
        $('.txt-hover.esquerda').css({display: 'none'});
    });
});

$('.item-nav.direita').mouseleave(function(){
    $('.txt-hover.direita').animate({
        opacity: 0,
        padding: "5px 0px"
    }, 400, function(){
        $('.txt-hover.direita').css({display: 'none'});
    });
});

var $fundoCor = $('.celular').height() - 100;
$('.fundo-cor').css({height: $fundoCor});

var $fundoCor2 = $('.celular-2').height() - 100;
$('.fundo-cor-2').css({height: $fundoCor2});

var $grafWidth = $('.celular-2').length * $('.celular-2').width();
$('.metodo-graf').css({width: $grafWidth});

ScrollReveal().reveal('.project', { delay: 550, reset: false });
ScrollReveal().reveal('.forms', { delay: 500, reset: false });