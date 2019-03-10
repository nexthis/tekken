<?php

namespace App\Models;

class SkillsModel
{
   public static $damage =[
      ['value'=>5,'point'=>1,'active'=>false],
      ['value'=>10,'point'=>1,'active'=>false],
      ['value'=>5,'point'=>2,'active'=>false],
      ['value'=>15,'point'=>2,'active'=>false],
      ['value'=>20,'point'=>3,'active'=>false],
   ];

   public static $defens =[
      ['value'=>5,'point'=>1,'active'=>false],
      ['value'=>10,'point'=>1,'active'=>false],
      ['value'=>5,'point'=>2,'active'=>false],
      ['value'=>15,'point'=>2,'active'=>false],
      ['value'=>20,'point'=>3,'active'=>false],
   ];

   public static $magick =[
      ['value'=>5,'point'=>1,'active'=>false],
      ['value'=>10,'point'=>1,'active'=>false],
      ['value'=>5,'point'=>2,'active'=>false],
      ['value'=>15,'point'=>2,'active'=>false],
      ['value'=>20,'point'=>3,'active'=>false],
   ];
   public static function getDamage(){
      return  isset($_SESSION['skill-damage'])? $_SESSION['skill-damage'] : $_SESSION['skill-damage'] = self::$damage;
   }
   public static function getDefens(){
      return  isset($_SESSION['skill-defens'])? $_SESSION['skill-defens'] : $_SESSION['skill-defens'] = self::$defens;
   }
   public static function getMagick(){
      return  isset($_SESSION['skill-magick']) ? $_SESSION['skill-magick'] : $_SESSION['skill-magick'] = self::$magick;
   }
   public static function setDamage($value){
      $_SESSION['skill-damage'] = $value;
   }
   public static function setDefens($value){
      $_SESSION['skill-defens'] = $value;
   }
   public static function setMagick($value){
      $_SESSION['skill-magick'] = $value;
   }
}







