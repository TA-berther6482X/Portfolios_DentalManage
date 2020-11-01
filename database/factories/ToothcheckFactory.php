<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ToothCheck;
use Illuminate\Support\Facades\Auth;
use Faker\Generator as Faker;

$factory->define(ToothCheck::class, function (Faker $faker) {
    return [
        'user_id' => 1123454321,
        'image' => 'pikapika_ha.png',
        'comment' => $faker->realText(20),
    ];
});
