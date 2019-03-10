<?php

namespace App\Controllers;
 
use \Core\View;
use \Core\Controller;
use App\Models\Heroes;
/**
 * Home controller
 *  
 * PHP version 7.0
 */
class Home extends Controller
{
    /**
     * It will block the main page
     *
     * @return void
     */
    public function __construct()
    {
        if(Heroes::isSelected()){

            $this->routeTo('umiejetnosci');
        }
    } 

    /**
     * Show the index page
     *
     * @return void
     */
    public function index()
    {   
        
        View::renderTemplate('Home/index.html');
    }

    public function selectHero(){
        Heroes::setHero($_GET['heroSelected']);
        $this->routeTo('walka');
    }
}
