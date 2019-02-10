<?php

namespace App\Models;

class Heroes{
   public static $class = ["","","","",""];

   public static function isSelected(){
        if(!isset($_SESSION['isSelected'])) return false;
        return $_SESSION['isSelected'];
   }

   public static function setSelected($value){
        $_SESSION['isSelected'] = $value;
   }

   public static function getSelected(){

   }

}