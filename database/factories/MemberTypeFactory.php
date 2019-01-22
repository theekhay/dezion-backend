<?php

use Faker\Generator as Faker;

$factory->define(App\Modules\Membership\Models\MemberType::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'code' => ( random_int(0, 1) == 1) ? $faker->lexify('???') : NULL,
        'church_id' => random_int(1 ,8),
        'created_by' => 1,
        'status' => random_int(0,5) == 3 ? 666 : 111,

    ];
});
