<?php

/** @var Factory $factory */

use App\Models\Timetable;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Timetable::class, function (Faker $faker) {
    $start = $faker->dateTimeBetween('next Monday', 'next Monday +7 days');
    return [
        'start_time' => $start,
        'end_time' => $faker->dateTimeBetween($start, $start->format('Y-m-d H:i:s').' +2 hours')
    ];
});
