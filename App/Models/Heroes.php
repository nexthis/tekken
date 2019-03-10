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
               'manna' => 20,
               'defense' => 70,
               'image' => 'assets/images/heros/portrait/wojownik.png',
               'skills-image' => ['assets/images/heros/skills/wojownik-1.png', 'assets/images/heros/skills/wojownik-2.png', 'assets/images/heros/skills/wojownik-3.png'],
          ],

          [
               'name' => "Mag",
               'health' => 30,
               'damage' => 10,
               'manna' => 70,
               'defense' => 40,
               'image' => 'https://picsum.photos/200/300',
               'skills-image' => ['assets/images/heros/skills/magik-1.png', 'assets/images/heros/skills/magik-2.png', 'assets/images/heros/skills/magik-3.png'],
          ],

          [
               'name' => "Paladyn",
               'health' => 90,
               'damage' => 50,
               'manna' => 25,
               'defense' => 30,
               'image' => 'https://picsum.photos/200/300',
               'skills-image' => ['assets/images/heros/skills/paladyn-1.png', 'assets/images/heros/skills/paladyn-2.png', 'assets/images/heros/skills/paladyn-3.png'],
          ],

          [
               'name' => "Nieumarły",
               'health' => 50,
               'damage' => 50,
               'manna' => 30,
               'defense' => 40,
               'image' => 'assets/images/heros/portrait/nieumarły.png',
               'skills-image' => ['assets/images/heros/skills/nieumarły-1.png', 'assets/images/heros/skills/nieumarły-2.png', 'assets/images/heros/skills/nieumarły-3.png'],
          ],

          [
               'name' => "Ninja",
               'health' => 30,
               'damage' => 70,
               'manna' => 40,
               'defense' => 10,
               'image' => 'assets/images/heros/portrait/ninja.png',
               'skills-image' => ['assets/images/heros/skills/ninja-1.png', 'assets/images/heros/skills/ninja-2.png', 'assets/images/heros/skills/ninja-3.png'],
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
          $_SESSION['selctedHero'] = new Hero(self::$class[$id]);
     }
     
     public static function setHeroByName($name, $is_selected = true)
     { 
          //TODO add some code :-) 
     }
     public static function setHeroByClass($class)
     { 
          $_SESSION['selctedHero'] = $class;
     }

     public static function selctedHeroIndex()
     {
          //TODO add isSelected
          return unserialize(serialize($_SESSION['selctedHeroIndex']));
     }

     public static function selctedHero()
     {
          return unserialize(serialize($_SESSION['selctedHero']));
     }
}







