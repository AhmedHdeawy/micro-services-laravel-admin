<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'title' =>  $faker->text(25),
        'description' =>  $faker->realText(),
        'image' =>  $faker->imageUrl(),
        'price' =>  $faker->numberBetween(10, 300)
    ];
});
