<?php

/** @var Factory $factory */

use App\Models\Channel;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Channel::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
        'icon' => $faker->imageUrl('240', '120')
    ];
});
