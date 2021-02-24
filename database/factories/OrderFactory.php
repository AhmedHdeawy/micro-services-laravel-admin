<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Order;
use Faker\Generator as Faker;

$factory->define(Order::class, function (Faker $faker) {
    return [
        'name'  =>  $faker->name(),
        'email'  =>  $faker->email,
        'phone'  =>  $faker->phoneNumber,
        'address'  =>  $faker->address
    ];
});
