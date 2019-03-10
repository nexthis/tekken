function showPopup(text,time = 2000){
    var height = 80;
    var popup = $(`<div class="popup error">${text}</div>`);
    $('.popup').each((index,element)=>{
        height += $(element).outerHeight() + 10;
    });
    popup.css('top',height+'px')
    $('body').append( popup );
    setTimeout(()=>{
        popup.remove();
    },time)
}

function showModal(){

}