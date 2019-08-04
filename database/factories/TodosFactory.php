<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Todos;
use Faker\Generator as Faker;

$factory->define(Todos::class, function (Faker $faker) {
    return [
		'name' => $faker->sentence(3),
		'description' => $faker->paragraph(4),
		'completed' => false,
    ];
});
