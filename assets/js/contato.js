$(document).ready(function(){
  
    var linkName = $('.contato');
    linkName.each(function(elemento){
        var LINK = $(this).attr('data-link');
        $(this).on('click', function(){
            window.open(LINK, '_blank');
        })
    })
})
