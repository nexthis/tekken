
var items = new Object;
$.ajax({
    url : 'get-equipment',
    dataType : "json",
})
.done(function(res) {
    console.log(res); 
    items = res;
    setItems();
})
.fail(function(error) {
    alert("Wystąpił błąd w połączeniu zobacz do konsoli");
    console.log(error);
})
.always(function() {

});


function setItems(){
    $('.column').each((index,element) =>  {
        if(index >= items.length) return false;

        $(element).append( `<img src="${items[index].image}" alt="" srcset="">` );
        $(element).click(()=>{
            $('.modal').fadeIn();
            equipmentModal(items[index],element);
        });

    })
}

function equipmentModal(item,element){
    $('#title').text(item.name);
    $('#element-requires').text(item.value + " punktów");

    $('#modal-confirm').click(function(){
        $.ajax({
            url : 'use-item',
            dataType : "json",
            data: item
        })
        .done(function(res) {
            console.log(res); 
            $(element).empty();
        })
        .fail(function(error) {
            alert("Wystąpił błąd w połączeniu zobacz do konsoli");
            console.log(error);
        })
        $('.modal').fadeOut();
    })
}


$('#modal-dismiss').click(function(){
    $('.modal').fadeOut();
})