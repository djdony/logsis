<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
* @method float randomFloat($nbMaxDecimals = null, $min = 0, $max = null)
*/

$factory->define(App\Book::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence(2),
        'price' => $faker->randomFloat(2,50, 1000),
    ];
});

