<?php

use Faker\Generator as Faker;

$factory->define(App\Modules\Core\Models\MasterBranch::class, function (Faker $faker) {

    return [
        'name' => $faker->word,
        'active' => $faker->numberBetween($min = 0, $max = 1),
        'created_by' => 1,
        'address' => $faker->address,
        'date_established' => $faker->dateTimeThisCentury(),
        'type' => 211
    ];
});
