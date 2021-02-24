<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\OrderItem;
use App\Product;
use Faker\Generator as Faker;

$factory->define(OrderItem::class, function (Faker $faker) {
    $product = Product::inRandomOrder()->first();
    return [
        'price' =>  $product->price,
        'qty' =>  random_int(4, 10),
        'product_id'    =>  $product->id
    ];
});
