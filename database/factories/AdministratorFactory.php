<?php

use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;

$factory->define(App\Modules\Membership\Models\Administrator::class, function (Faker $faker) {
    return [

        'firstname' => $faker->firstName,
        'surname' => $faker->lastname,
        'email' => $faker->email,
        'telephone' => $faker->e164PhoneNumber,
        'church_id' => $faker->numberBetween($min = 1, $max = 8),
        'member_id' => ($faker->numberBetween(0, 10) == 5 ) ? random_int(1, 10) : NULL,
        'username' => random_int(0,3) == 3 ? $faker->name : NULL,
        'password' => Hash::make( $faker->firstname ),
        'created_by' => 1,
    ];
});
