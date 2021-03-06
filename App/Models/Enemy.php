<?php

namespace App\Models;

class Enemy{
    public $name, $health,$maxHealth, $damage, $manna,$maxManna, $defense, $image;
    
    function __construct($level)
    {   
        $this->name = "bot-".$level;
        
        $level === 0 ? $level = 0.6 : null;

        $this->health = rand ( 5 , 100 )*($level * 0.2);
        $this->damage =rand ( 5 , 45 )*($level * 0.2);
        $this->manna =round( rand ( 5 , 80 )*($level * 0.2));
        $this->defense =rand ( 5 , 70 )*($level * 0.2);

        $this->image = 'assets/images/enemies/enemie-'.rand(1,12).'.png';
        
        $this->maxManna = $this->manna;
        $this->maxHealth = $this->health;
        //$this->health = 100 * $level;
    }
}