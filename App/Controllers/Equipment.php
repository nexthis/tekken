<?php

namespace App\Controllers;
 
use \Core\View;
use \Core\Controller;
/**
 * Home controller
 *  
 * PHP version 7.0
 */
class Equipment extends Controller
{

    /**
     * Show the index page
     *
     * @return void
     */
    public function index()
    {
        View::renderTemplate('Equipment/index.html');
    }

}
