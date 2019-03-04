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
        $hero = Heroes::selctedHero();
        View::renderTemplate('Statistics/index.html',compact('hero'));

    }

}

