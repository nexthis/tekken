
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
    hero.health = parseFloat(hero.health).toFixed(2);
    $('#my-hp-progress').attr('max',hero.maxHealth);
    $('#my-manna-progress').attr('max',hero.maxManna);

    $('#my-hp').text(`${hero.health} hp`)
    $('#my-manna').text(`${hero.manna} manny`)
    $('#my-hp-progress').attr('value',hero.health);
    $('#my-manna-progress').attr('value',hero.manna);

    $( ".skill-effect" ).each((index,element) =>  {
        $(element).attr("src",hero.skillsImage[index]);
    });

    $('#my-image').attr('src',hero.image);
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
    enemy.health = parseFloat(enemy.health).toFixed(2);

    $('#target-hp-progress').attr('max',enemy.maxHealth);
    $('#target-manna-progress').attr('max',enemy.maxManna);

    $('#target-hp').text(`${enemy.health} hp`)
    $('#target-manna').text(`${enemy.manna} manny`)
    $('#target-hp-progress').attr('value',enemy.health);
    $('#target-manna-progress').attr('value',enemy.manna);

    $('#target-image').attr('src',enemy.image);
})
.fail(function(error) {
    alert("Wystąpił błąd w połączeniu zobacz do konsoli");
    console.log(error);
})
.always(function() {
    //$('.loading').hide();
});



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
        if(typeof res.end !=='undefined'){
            res.end === 'win' ? win() : lost();
            return;
        }
        heroDamage = hero.health - res.hero.health;
        enemyDamage = enemy.health - res.enemy.health;
        //TODO remove the two lines underneath  
        console.log("hero:" + hero.health + " - " +res.hero.health)
        console.log("enemy:" +  enemy.health + " - " +res.enemy.health)

        heroDamage = parseFloat(heroDamage).toFixed(2);
        enemyDamage = parseFloat(enemyDamage).toFixed(2)
        
        hero = res.hero;
        enemy = res.enemy;

        hero.health = parseFloat(hero.health).toFixed(2);
        enemy.health = parseFloat(enemy.health).toFixed(2);

        damageEnemy(enemyDamage);
        setTimeout(()=>damageHero(heroDamage),1000); 
    })
    .fail(function(error) {
        alert("Wystąpił błąd w połączeniu zobacz do konsoli");
        console.log(error);
    })
}

function damageEnemy(damage){
    $('#my-manna').text(`${hero.manna} manny`);
    $('#my-manna-progress').attr('value',hero.manna);

    $('#target-hp-progress').attr('value',enemy.health);
    $('#target-hp').text(`${enemy.health} hp`);
    showDamage();

}
function damageHero(damage){
    $('#target-manna').text(`${enemy.manna} manny`);
    $('#target-manna-progress').attr('value',enemy.manna);

    $('#my-hp-progress').attr('value',hero.health);
    $('#my-hp').text(`${hero.health} hp`);

    showDamage(damage);
}

function showDamage(damage){
    $('#damage').text(damage);
    $('#damage').css('opacity','1');
    setTimeout(()=>$('#damage').css('opacity','0'),400);
}

function win(){
    $('.modal').fadeIn();
    $('#title').text("Wygrałeś !!");
    $('#target-hp-progress').attr('value',0);
    $('#target-hp').text(`0 hp`);
    $('#modal-confirm').click(()=>{
        document.location.href = '/Tekken/'
    })
}

function lost(){
    $('.modal').fadeIn();
    $('#title').text("Przegrałeś");

    $('#my-hp-progress').attr('value',0);
    $('#my-hp').text(`0 hp`);

    $('#modal-confirm').click(()=>{
        document.location.href = '/Tekken/'
    })
}


// Jak by co to nie ja pisałem... XD szkoda że nie używamy node js + ~es6