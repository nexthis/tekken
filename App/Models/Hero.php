<?php

namespace App\Models;


class Hero{
    public
    $name, 
    $health, 
    $damage, 
    $manna, 
    $defense, 
    $image,
    $skillsImage,
    $level = 0;

    function __construct($hero)
    {
        $this->name = $hero['name'];
        $this->health = $hero['health'];
        $this->damage = $hero['damage'];
        $this->manna = $hero['manna'];
        $this->defense = $hero['defense'];
        $this->image = $hero['image'];
        $this->skillsImage = $hero['skills-image'];
    }
    private function test(){
        
    }
}