<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Municipality::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->text(10),
        'mayor' => $faker->name,
        'address' => $faker->address,
        'phone' => $faker->e164PhoneNumber,
        'fax' => $faker->e164PhoneNumber,
        'email' => $faker->unique()->safeEmail,
        'web' => $faker->url,
        'geo_latitude' => $faker->latitude,
        'geo_longitude' => $faker->longitude
    ];
});
