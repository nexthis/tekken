<?php

namespace App\Controllers;
 
use \Core\View;
use \Core\Controller;
use App\Models\Heroes;
use App\Models\Enemy;
use App\Models\Hero;
use App\Models\Items;
/**
 * Home controller
 *  
 * PHP version 7.0
 */
class Fight extends Controller
{
    private $enemy = Enemy::class;
    /**
     * It will block the main page
     *
     * @return void
     */
    public function __construct()
    {
        if(!Heroes::isSelected()){

            $this->routeTo('');
        }
        $this->enemy = isset($_SESSION["enemy"]) ? unserialize(serialize($_SESSION["enemy"])) : false;
    } 

    /**
     * Show the index page
     *
     * @return void
     */
    public function index()
    {
        View::renderTemplate('Fight/index.html');
    }

    public function getHero(){
        header('Content-type: application/json');
        echo json_encode(Heroes::selctedHero());
    }

    function getEnemy(){
        header('Content-type: application/json');
        $this->enemy = isset($_SESSION["enemy"]) ? unserialize(serialize($_SESSION["enemy"])) : $this->enemy = new Enemy(Heroes::selctedHero()->level);
        $_SESSION["enemy"] = $this->enemy;
        echo json_encode( $this->enemy);
    }

    function makeFight(){
        header('Content-type: application/json');

        //current hero
        $hero = Heroes::selctedHero();

        //increases hero damage based on selected skill
        switch($_REQUEST['skill']){
            case 1:
                    $this->enemy->health -= $this->takeDamage($hero->damage,$this->enemy->defense);
                break;
            case 2:
                    if($hero->manna < 5) {
                        echo json_encode(['error'=>'Masz za mało many !!']);
                        return;
                    }
                    $hero->manna -= 5;
                    $this->enemy->health -= $this->takeDamage($hero->damage*1.2,$this->enemy->defense);
                break;
            case 3:
                    if($hero->manna < 10) {
                        echo json_encode(['error'=>'Masz za mało many !!']);
                        return;
                    }
                    $hero->manna -= 10;
                    $this->enemy->health -= $this->takeDamage($hero->damage*1.4,$this->enemy->defense);
                break;
        }

        //if hero win
        if($this->enemy->health <= 0){
            echo json_encode(['end'=>'win']);
            $this->win($hero);
            return;
        }

        //increases enemy damage based on selected skill (random)
        switch(rand ( 1 , 3 )){
            case 1:
                    $hero->health -= $this->takeDamage($this->enemy->damage,$hero->defense);
                break;
            case 2:
                    if($this->enemy->manna < 5) {
                        $hero->health -= $this->takeDamage($this->enemy->damage,$hero->defense);
                    }
                    else{
                        $this->enemy->manna -= 5;
                        $hero->health -= $this->takeDamage($this->enemy->damage*1.2,$hero->defense);
                    }
                break;
            case 3:
                    if($this->enemy->manna < 10) {
                        if($this->enemy->manna < 5) {
                            $hero->health -= $this->takeDamage($this->enemy->damage,$hero->defense);
                        }
                        else{
                            $this->enemy->manna -= 5;
                            $hero->health -= $this->takeDamage($this->enemy->damage*1.2,$hero->defense);
                        }
                    }
                    else{
                        $this->enemy->manna -= 10;
                        $hero->health -= $this->takeDamage($this->enemy->damage*1.4,$hero->defense);
                    }
                break;
        }
        
        //if enemy win
        if($hero->health <= 0){
            echo json_encode(['end'=>'lost', 'hero' => $hero->health, "enemy" => $this->enemy->health]);
            $this->lost();
            return;
        }

        //save states 
        Heroes::setHeroByClass($hero);
        $_SESSION["enemy"] = $this->enemy;

        //RETURN json
        echo json_encode(
            [
                'hero' => Heroes::selctedHero(),
                'enemy'=>$this->enemy
            ]
        );
    }

    function takeDamage($damage,$defense){
        $value =0;
        if( $damage >  $defense){
            $value = $damage * ( 1+0.05* ($damage - $defense) );  
        }
        else if($damage ==  $defense){
            $value =  $damage;
        }
        else{
            $value =  $damage * ( 1+0.025* ($damage - $defense) ); 
        }
        return  $value <= 0 ? 1 : $value;
    }

    function win(Hero $hero){
        $hero->health = $hero->maxHealth;
        $hero->manna = $hero->maxManna;
        $hero->level +=1;
        $hero->point +=1;
        array_push($hero->items,Items::$iteams[array_rand(Items::$iteams, 1)]);
        unset($_SESSION['enemy']);
        Heroes::setHeroByClass($hero);
    }

    function lost(){
        session_destroy();
    }

}
