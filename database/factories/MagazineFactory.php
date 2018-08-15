<?php

use Faker\Generator as Faker;

$factory->define(App\Magazine::class, function (Faker $faker) {
    return [
        //
        'name' => $faker->country,
        'description' => $faker->text,
        'img' => $faker->imageUrl(),
        'date' => $faker->date("2018-01-01"),
    ];
});
