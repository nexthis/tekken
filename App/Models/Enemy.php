<?php

namespace App\Models;

class Enemy{
    public $name, $health, $damage, $manna, $defense, $image;
    
    function __construct($level)
    {   
        $this->name = "bot-".$level;
        $level ===0 ? $level = 0.6 : null;
        $this->health = rand ( 5 , 100 )*$level;
        $this->damage =rand ( 5 , 100 )*$level;
        $this->manna =round( rand ( 5 , 100 )*$level);
        $this->defense =rand ( 5 , 100 )*$level;
        //$this->health = 100 * $level;
    }
}