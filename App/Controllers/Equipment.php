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
class Equipment extends Controller
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
        View::renderTemplate('Equipment/index.html');
    }
    public function getEquipment()
    {
        header('Content-type: application/json');
        echo json_encode(Heroes::selctedHero()->items);
    }
    public function useItem(){
        header('Content-type: application/json');
        $hero = Heroes::selctedHero();
        $enemy  = unserialize(serialize($_SESSION['enemy']));
        foreach ($_REQUEST['type'] as  $value) {

            switch($value){
                case 'health':
                    if($_REQUEST['value'] == 'max'){
                        $hero->health = $hero->maxHealth;
                        break 1;
                    }
                    if($hero->health < $hero->health + $_REQUEST['value']){
                        $hero->health +=  $_REQUEST['value'];
                    }
                    else{
                        $hero->health = $hero->maxHealth;
                    }
                    break;
                case 'manna':
                    if($_REQUEST['value'] == 'max'){
                        $hero->manna = $hero->maxManna;
                        break 1;
                    }
                    if($hero->manna < $hero->manna + $_REQUEST['value']){
                        $hero->manna +=  $_REQUEST['value'];
                    }
                    else{
                        $hero->manna = $hero->maxManna;
                    }

                    break;
                case 'damage':
                    if($_REQUEST['value'] == 'max'){
                        $enemy->health = 0;
                        break 1;
                    }
                    $enemy->health -= $_REQUEST['value'];

                     break;
            }

        }

        foreach ($hero->items as $index => $value) {
            if($value['id'] == $_REQUEST['id']){
                array_splice($hero->items, $index, 1);
                //$hero->items = array_values($hero->items); // 'reindex' array
                break;
            }
        }

        $_SESSION["enemy"] = $enemy;
        Heroes::setHeroByClass($hero);

        echo json_encode($_REQUEST);
    }
}
