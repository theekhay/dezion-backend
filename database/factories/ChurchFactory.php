<?php

use Faker\Generator as Faker;

$factory->define(App\Modules\Core\Models\Church::class, function (Faker $faker) {

    return [
        'name' => $faker->word,
        'active' => $faker->numberBetween($min = 0, $max = 1),
        'logo' => $faker->imageUrl($width = 640, $height = 480),
        'date_established' => $faker->dateTimeThisCentury(),
        'mode' => 111,
        'created_by_email' => $faker->email,
        'created_by_telephone' => $faker->e164PhoneNumber,
        'activation_key' => $faker->uuid,
        'created_by_email' => $faker->email,
        'created_by_telephone' => $faker->e164PhoneNumber,

    ];
});
