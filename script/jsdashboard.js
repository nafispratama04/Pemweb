var TombolFitur = $(".tombolfitur");
var Fitur = $("nav .Fitur ul");

function klikFitur(){
    TombolFitur.off('click').on('click',function(){
        Fitur.toggle();
    });
    Fitur.off('click').on('click',function(){
        Fitur.toggle();
    });
}

$(document).ready(function(){
    var width = $(window).width();
    if(width < 1200){
        klikFitur();
        Fitur.hide();
    }else{
        Fitur.show();
    }
})

$(window).resize(function(){
    var width = $(window).width();
    if(width > 1199){
        Fitur.show();
    }else{
        Fitur.hide();
        klikFitur();
    }
});