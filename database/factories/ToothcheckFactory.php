<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ToothCheck;
use Illuminate\Support\Facades\Auth;
use Faker\Generator as Faker;

$factory->define(ToothCheck::class, function (Faker $faker) {
    return [
        'user_id' => 1111111111,
        'image' => 1111111111 . Str::random(6) . '.jpg',
        'comment' => $faker->realText(20),
    ];
});
