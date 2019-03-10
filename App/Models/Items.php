<?php

namespace App\Models;


class Items{
    public static $iteams = [
        [
            'name' => "Mała potka życia",
            'type' => ['health'],
            'value' => 20,
            'image' => 'assets/images/equipment/potions-health.png',
            'id' => 1
        ],
        [
            'name' => "Duża potka życia",
            'type' => ['health'],
            'value' => 20,
            'image' => 'assets/images/equipment/potions-health.png',
            'id' => 2
        ],
        [
            'name' => "Mała potka manny",
            'type' => ['manna'],
            'value' => 20,
            'image' => 'assets/images/equipment/potions-manna.png',
            'id' => 3
        ],
        [
            'name' => "Duża potka manny",
            'type' => ['manna'],
            'value' => 20,
            'image' => 'assets/images/equipment/potions-manna.png',
            'id' => 4
        ],
        [
            'name' => "Masna potka",
            'type' => ['manna','health'],
            'value' => 'max',
            'image' => 'assets/images/equipment/potions-max.png',
            'id' => 5
        ],
        [
            'name' => "Mała potka obrażeń",
            'type' => ['damage'],
            'value' => 10,
            'image' => 'assets/images/equipment/potions-damage.png',
            'id' => 6
        ],
        [
            'name' => "Duża potka obrażeń",
            'type' => ['damage'],
            'value' => 20,
            'image' => 'assets/images/equipment/potions-damage.png',
            'id' => 7
        ],
    ];
}