<?php

use Faker\Generator as Faker;

$factory->define(App\Modules\Core\Models\MasterBranch::class, function (Faker $faker) {

    return [
        'name' => $faker->word,
        'created_by' => 1,
        'address' => $faker->address,
        'date_established' => $faker->dateTimeThisCentury(),
        'type' => 211,
        'status' => random_int(0,5) == 3 ? 666 : 111,
    ];
});
