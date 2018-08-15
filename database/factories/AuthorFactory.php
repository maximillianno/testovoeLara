<?php

use Faker\Generator as Faker;

$factory->define(App\Author::class, function (Faker $faker) {
    return [
        //
        'firstName' => $faker->firstName,
        'lastName' => $faker->lastName,
        'middleName' => $faker->firstName,
    ];
});
