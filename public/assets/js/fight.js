
var hero = Object;
var enemy = Object;
var audio = new Audio();

//GET hero
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

//GET Enemy
$.ajax({
    url : 'get-enemy',
    dataType : "json"
})
.done(function(res) {
    enemy = res;
    setEnemy();
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

function setEnemy(){
    $('#target-hp').text(`${enemy.health} hp`)
    $('#target-manna').text(`${enemy.manna} manny`)
}

// PLAY Song
//TODO fix short refresh (in promise)
function playSong(){
    //od 1 do 6 
    audio.src = `assets/audio/background-music-${Math.floor(Math.random() * 6) + 1}.mp3`;
    audio.load();
    audio.play();
}


$(window).ready(()=>{
    playSong();
    audio.onended = function() {
        playSong();
    };
    audio.onerror = function(error) {
        alert("Wystąpił błąd w inicjacji zobacz do konsoli");
        console.log(error);
    };
})


$("#skill-1").click(function() {
    fight(1);
});

$("#skill-2").click(function() {
    fight(2);
});

$("#skill-3").click(function() {
    fight(3);
});


function fight(skill){

}