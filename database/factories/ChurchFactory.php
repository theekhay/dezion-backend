<?php

use Faker\Generator as Faker;

$factory->define(App\Modules\Core\Models\Church::class, function (Faker $faker) {

    return [
        'name' => $faker->word,
        'active' => $faker->numberBetween($min = 0, $max = 1),
        'logo' => $faker->imageUrl($width = 640, $height = 480),
        'date_established' => $faker->dateTimeThisCentury(),
        'mode' => 111,
        'created_by' => 1,

    ];
});
