<?php

use Faker\Generator as Faker;

$factory->define(App\Modules\Membership\Models\MemberType::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'code' => ( random_int(0, 1) == 1) ? $faker->lexify('???') : NULL,
        'active' => $faker->numberBetween( 0, 1),
        'church_id' => random_int(1 ,8),
        'created_by' => 1,
    ];
});
