var skills = new Object;
var watched = -1;
var watchedHandler = -1;

$.ajax({
    url : 'get-skills',
    dataType : "json"
})
.done(function(res) {
    console.log(res); 
    skills =res;
    setSkill();
    
})
.fail(function(error) {
    alert("Wystąpił błąd w połączeniu zobacz do konsoli");
    console.log(error);
})
.always(function() {
    //$('.loading').hide();
});

function setSkill(){
    $('[data-skill=spell]').each((index,element) =>  {
        $(element).attr('content',skills.magick.length - 1 - index)

        if(skills.magick[skills.magick.length - 1 - index].active) $(element).addClass('active')

        $(element).click(function(){
            skillModal(skills.magick[skills.magick.length - 1 - index],$(this),"Magia","magi")
        })
    })

    $('[data-skill=def]').each((index,element) =>  {
        
        $(element).attr('content',skills.defens.length - 1 - index)

        if(skills.defens[skills.defens.length - 1 - index].active) $(element).addClass('active')

        $(element).click(function(){
            skillModal(skills.defens[skills.defens.length - 1 - index],$(this),"Obrona","obrony")
        })
    })

    $('[data-skill=attack]').each((index,element) =>  {
        $(element).attr('content',skills.damage.length - 1 - index)

        if(skills.damage[skills.damage.length - 1 - index].active) $(element).addClass('active')

        $(element).click(function(){
            skillModal(skills.damage[skills.damage.length - 1 - index],$(this),"Atak","ataku")
        })
    })
}

function skillModal(iteam,Handler,type,name){
    watchedHandler =Handler[0];
    watched = iteam;

    if( $( watchedHandler ).hasClass( "active" ) ) return;

    $(".modal").fadeIn();
    $('#title').text(type);
    
    $('#element-requires').text(iteam.point + ' punktów');
    $('#element-benefits').text(iteam.value + ' '+ name);
    $('#my-point').text(skills.myPoint+ ' punktów');
}

$('#modal-dismiss').click(()=>{
    $(".modal").fadeOut();
})

$('#modal-confirm').click(()=>{

    if(skills.myPoint < watched.point){
        showPopup("Nie masz wystarczającej ilości punktów");
        return;
    }

    $.ajax({
        url : 'set-skills',
        dataType : "json",
        type: "POST",
        data:{
            type: $(watchedHandler).data('skill'),
            id: $(watchedHandler).attr('content'),
        }
    })
    .done(function(res) {
        console.log(res); 
        $(".modal").fadeOut();
        skills.myPoint -= watched.point;
        $(watchedHandler).addClass('active');
    })
    .fail(function(error) {
        alert("Wystąpił błąd w połączeniu zobacz do konsoli");
        console.log(error);
    })
    .always(function() {
        //$('.loading').hide();
    });

})