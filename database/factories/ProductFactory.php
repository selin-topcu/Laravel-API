<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Product::class, function (Faker $faker) {
    $productname=$faker->sentence(3);
    return [
        'name' => $productname,
        'slug' => Str::slug($productname),
        'description' => $faker->paragraph(5),
        'price' => mt_rand(10,100)/10
    ];
});
