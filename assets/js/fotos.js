$(document).ready(function(){

    var divName = $('.filho-fotos');
    divName.each(function( index ) {
        var IMG = $(this).attr('data-img');
        $(this).on('click', function(){
            abrirModal(IMG);
        });
    });

});

$('#closed').on('click', function(){
    fecharModal();
});

function abrirModal(img){
    $('.modal_galeria').css('display', 'block');
    $('.back_modal').css('display', 'flex');
    $('.modal_img').attr('src', img)
}
function fecharModal(){
    $('.modal_galeria').css('display', 'none');
    $('.back_modal').css('display', 'none');
    $('.corpo-modal').css('background-image', '');
}