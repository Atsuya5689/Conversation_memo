<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\talk;
use Faker\Generator as Faker;

$factory->define(talk::class, function (Faker $faker) {
    return [
        'body' => $faker->word,
        'from_user_id' => 1,
        'to_user_id' => 2,
    ];
});
