<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Municipality::class, function (Faker $faker) {
    $cityName = $faker->city;
    // $external_id = function () {
    //         return factory('App\Step')->create()->id;
    //     };

    return [
        'name' => $cityName,
        'mayor' => $faker->name,
        'external_id' => $faker->unique()->randomNumber,
        'address_streetName' => $faker->streetName,
        'address_buildingNumber' => $faker->buildingNumber,
        'address_postcode' => $faker->randomNumber(3, true) . ' ' . $faker->randomNumber(2, true),
        'address_city' => $cityName,
        'phone_prefix' => '0' . $faker->numberBetween(2,555),
        'phone' => $faker->randomNumber(8, true),
        'fax' => $faker->randomNumber(8, true),
        'email' => $faker->unique()->safeEmail,
        'web' => $faker->url,
        'geo_latitude' => $faker->latitude,
        'geo_longitude' => $faker->longitude
    ];
});
