var $banner = $('.banner');
$banner.animate({
    width: "100vw"
}, 300, function(){
    $banner.animate({
        top: 0,
        height: "47vw"
    }, 600, function(){
        $('.logo-interna').animate({opacity: 1});
        $('.grade-nav').animate({opacity: 1});
        $('.bloco-projeto').animate({opacity: 1});
        $('.veja-tambem').animate({opacity: 1});
    });
});

$('select').change(function(){
    var valor = $(this).val();
    var id = $(this).attr('id');
    if(id == 'clientes'){
        if(valor != ""){
            $('.project').fadeIn('slow');
            $('.project:not(.'+valor+')').fadeOut('slow');
        }else{
            $('.project').fadeIn('slow');
        }
    }else if(id == 'projetos'){
        if(valor != ""){
            $('.categoria').parent().parent().parent('.project').fadeIn('slow');
            $('.categoria:not(.'+valor+')').parent().parent().parent().fadeOut('slow');
        }else{
            $('.categoria').parent().parent().parent('.project').fadeIn('slow');
        }
    }
});