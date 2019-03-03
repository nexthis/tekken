<?php

namespace App\Models;

class Heroes
{
     public static $class =
     [
          [
               'name' => "Wojownik",
               'health' => 90,
               'damage' => 30,
               'manna' => 10,
               'defense' => 75,
               'image' => 'https://picsum.photos/200/300',
               'skills-image' => ['assets/images/heros/skills/mag-1.jpg', 'assets/images/heros/skills/mag-2.jpg', 'assets/images/heros/skills/mag-3.jpg'],
          ],

          [
               'name' => "Mag",
               'health' => 30,
               'damage' => 40,
               'manna' => 70,
               'defense' => 40,
               'image' => 'https://picsum.photos/200/300',
               'skills-image' => ['assets/images/heros/skills/mag-1.jpg', 'assets/images/heros/skills/mag-2.jpg', 'assets/images/heros/skills/mag-3.jpg'],
          ],

          [
               'name' => "Paladyn",
               'health' => 90,
               'damage' => 50,
               'manna' => 25,
               'defense' => 30,
               'image' => 'https://picsum.photos/200/300',
               'skills-image' => ['assets/images/heros/skills/mag-1.jpg', 'assets/images/heros/skills/mag-2.jpg', 'assets/images/heros/skills/mag-3.jpg'],
          ],

          [
               'name' => "Nieumarły",
               'health' => 50,
               'damage' => 50,
               'manna' => 30,
               'defense' => 40,
               'image' => 'https://picsum.photos/200/300',
               'skills-image' => ['assets/images/heros/skills/mag-1.jpg', 'assets/images/heros/skills/mag-2.jpg', 'assets/images/heros/skills/mag-3.jpg'],
          ],

          [
               'name' => "Ninja",
               'health' => 30,
               'damage' => 70,
               'manna' => 40,
               'defense' => 10,
               'image' => 'https://picsum.photos/200/300',
               'skills-image' => ['assets/images/heros/skills/mag-1.jpg', 'assets/images/heros/skills/mag-2.jpg', 'assets/images/heros/skills/mag-3.jpg'],
          ],

     ];


     public static function isSelected()
     {
          if (!isset($_SESSION['isSelected'])) return false;
          return $_SESSION['isSelected'];
     }

     public static function setHero($id, $is_selected = true)
     {
          if ($is_selected !== true) {
               $_SESSION['isSelected'] = $is_selected;
               return;
          }

          $_SESSION['isSelected'] = $is_selected;
          $_SESSION['selctedHeroIndex'] = $id;
          $_SESSION['selctedHero'] = new Hero(self::$class[$_SESSION['selctedHeroIndex']]);
     }
     
     public static function setHeroByName($name, $is_selected = true)
     { 
          //TODO add some code :-) 
     }


     public static function selctedHeroIndex()
     {
          //TODO add isSelected
          return $_SESSION['selctedHeroIndex'];
     }

     public static function selctedHero()
     {
          return $_SESSION['selctedHero'];
     }
}







