<?php

namespace App\Models;


class Hero{
    public
    $name, 
    $health,
    $maxHealth,
    $damage, 
    $manna, 
    $maxManna, 
    $defense, 
    $image,
    $skillsImage,
    $level = 0,
    $point = 0,
    $items = [ 
        [
            'name' => "Mała potka życia",
            'type' => ['health'],
            'value' => 20,
            'image' => 'assets/images/equipment/potions-health.png',
            'id' => 1
        ],     
        //defalt item the same as namespace App\Models\Items;
    ];

    function __construct($hero)
    {
        $this->name = $hero['name'];
        $this->health = $hero['health'];
        $this->maxHealth = $hero['health'];
        $this->damage = $hero['damage'];
        $this->manna = $hero['manna'];
        $this->maxManna = $hero['manna'];
        $this->defense = $hero['defense'];
        $this->image = $hero['image'];
        $this->skillsImage = $hero['skills-image'];
    }
    private function test(){
        
    }
}