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
class Statistics extends Controller
{
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
        if(!Heroes::isSelected()){
            $this->routeTo('');
            return;
        }
        $hero = Heroes::selctedHero();
        $enemy = isset($_SESSION["enemy"]) ? unserialize(serialize($_SESSION["enemy"])) : $this->enemy = new Enemy(Heroes::selctedHero()->level);
        View::renderTemplate('Statistics/index.html',compact('hero','enemy'));

    }

}

