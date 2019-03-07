function showPopup(text,time = 2000){
    //TODO create jquery object - https://learn.jquery.com/using-jquery-core/jquery-object/
    var popup = `<div class="popup error">${text}</div>`;
    $('body').append( popup );
    setTimeout(()=>{
        $('.popup').remove();
    },time)
   
}