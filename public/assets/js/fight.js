
var hero = Object;
$.ajax({
    url : 'get-hero',
    dataType : "json"
})
.done(function(res) {
    console.log(res); 
    hero = res;
    setHero();
})
.fail(function(error) {
    alert("Wystąpił błąd w połączeniu zobacz do konsoli");
    console.log(error);
})
.always(function() {
    //$('.loading').hide();
});


function setHero(){
    $('#my-hp').text(`${hero.health} hp`)
    $('#my-manna').text(`${hero.manna} manny`)
    $( ".skill-effect" ).each((index,element) =>  {
        $(element).attr("src",hero.skillsImage[index]);
    });
}