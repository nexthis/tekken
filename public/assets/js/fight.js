
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
    $('#my-hp-progress').attr('max',hero.health);
    $('#my-manna-progress').attr('max',hero.manna);
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
    console.log(res); 
    enemy = res;
    setEnemy();
    $('#target-hp-progress').attr('max',enemy.health);
    $('#target-manna-progress').attr('max',enemy.manna);
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
    $('#my-hp-progress').attr('value',hero.health);
    $('#my-manna-progress').attr('value',hero.manna);

    $( ".skill-effect" ).each((index,element) =>  {
        $(element).attr("src",hero.skillsImage[index]);
    });
}

function setEnemy(){
    $('#target-hp').text(`${enemy.health} hp`)
    $('#target-manna').text(`${enemy.manna} manny`)
    $('#target-hp-progress').attr('value',enemy.health);
    $('#target-manna-progress').attr('value',enemy.manna);
}

// PLAY Song
//TODO fix short refresh (in promise)
function playSong(){
    //od 1 do 6 
    audio.src = `assets/audio/background-music-${Math.floor(Math.random() * 6) + 1}.mp3`;
    audio.load();
   // audio.play(); TODO uncomments
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
    $.ajax({
        type:"POST",
        url : 'make-fight',
        data:{skill:skill},
    }).done(function(res) {
        console.log(res); 
        if(typeof res.error !=='undefined'){
            showPopup(res.error);
            return;
        }
        hero = res.hero;
        enemy = res.enemy;
        setEnemy();
        setTimeout(()=>setHero(),1000); 


    })
    .fail(function(error) {
        alert("Wystąpił błąd w połączeniu zobacz do konsoli");
        console.log(error);
    })
}
