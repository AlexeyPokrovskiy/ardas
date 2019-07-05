<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Product;
use Faker\Generator as Faker;

$factory->defineAs(Product::class,'products', function (Faker $faker) {
    return [
        'name' => $faker->company,
        'cost' => rand(100, 1000),
    ];
});
