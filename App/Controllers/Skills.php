<?php

namespace App\Controllers;
 
use \Core\View;
use \Core\Controller;
use App\Models\Heroes;
use App\Models\SkillsModel;

/**
 * Home controller
 *  
 * PHP version 7.0
 */
class Skills extends Controller
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
        View::renderTemplate('Skills/index.html');
    }
    public function getSkills(){
        header('Content-type: application/json');
        echo json_encode(['damage'=>SkillsModel::getDamage(),'defens'=>SkillsModel::getDefens(),'magick'=>SkillsModel::getMagick(),'myPoint'=>Heroes::selctedHero()->point]);
    }

    public function setSkills(){
        header('Content-type: application/json');
        $value = 0;
        $hero = Heroes::selctedHero();
        switch($_REQUEST['type']){
            case 'spell':

                $value = SkillsModel::getMagick();
                $value[$_REQUEST['id']]['active'] = true;
                SkillsModel::setMagick($value);

                $hero->manna += $value[$_REQUEST['id']]['value'];
                $hero->maxManna += $value[$_REQUEST['id']]['value'];
                $hero->point -= $value[$_REQUEST['id']]['point'];
                Heroes::setHeroByClass($hero);

                echo json_encode(['test'=>'testowania']);
                //Heroes::selctedHero()->manna += SkillsModel::$magick[$_REQUEST['id']]['value'];

                break;
            case 'def':

                $value = SkillsModel::getDefens();
                $value[$_REQUEST['id']]['active'] = true;
                SkillsModel::setDefens($value);

                $hero->defense += $value[$_REQUEST['id']]['value'];
                $hero->point -= $value[$_REQUEST['id']]['point'];
                Heroes::setHeroByClass($hero);

                echo json_encode(['test'=>'testowania']);

                break;
            case 'attack':

                $value = SkillsModel::getDamage();
                $value[$_REQUEST['id']]['active'] = true;
                SkillsModel::setDamage($value);

                $hero->damage += $value[$_REQUEST['id']]['value'];

                $hero->point -= $value[$_REQUEST['id']]['point'];
                Heroes::setHeroByClass($hero);

                echo json_encode(['test'=>'testowania']);

                break;
        }

        return true;
    }
    
}
