<?php

namespace App\Controllers;
 
use \Core\View;
use \Core\Controller;
use App\Models\Heroes;
use App\Models\Enemy;
/**
 * Home controller
 *  
 * PHP version 7.0
 */
class Fight extends Controller
{
    private $enemy = Enemy::class;
    private $myRound = true;
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
        $this->enemy = new Enemy(Heroes::selctedHero()->level);
        echo json_encode( $this->enemy);
    }

    function makeFight(){
        
    }

}
