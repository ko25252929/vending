<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'product_name'=> $faker->city, 
        'price'=> $faker->randomDigit,
        'stock'=> $faker->randomDigit,
        'comment'=> $faker->realText, 
        'img_path'=> $faker->image, 
        //
    ];
});
