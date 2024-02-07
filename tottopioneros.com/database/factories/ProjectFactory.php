<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Project::class, function (Faker $faker) {
    return [
        'uuid' => $faker->uuid,
        'name' => $faker->name,
        'slug' => $faker->slug,
        'reference' => $faker->unique()->postcode,
        'group' => $faker->unique()->word,
        'description' => $faker->realText(200)
    ];
});
