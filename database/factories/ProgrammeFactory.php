<?php

/** @var Factory $factory */

use App\Models\Programme;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Programme::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence(4),
        'description' => $faker->paragraph(4),
        'duration' => $faker->randomNumber(4)
    ];
});
