<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        //id de los usarios aleatorios
        'user_id' => rand(1, 4),
        'title' => $faker->sentence
    ];
});
