<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Inventory;
use Faker\Generator as Faker;

$factory->define(Inventory::class, function (Faker $faker) {
    return [ 
        'brand' => $faker->word,
        'name' => $faker->word,
        'type' => $faker->word,
        'category' => $faker->randomElement($array = array ('Food & Drink','Health & Beauty','Clothing','Household','Electronics')),
        'price' => $faker->numberBetween($min = 1, $max = 99),        
        'amount' => $faker->numberBetween($min = 0, $max = 500)      
    ];
});