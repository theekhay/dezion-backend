<?php

use Faker\Generator as Faker;
use App\Modules\Membership\Models\MemberDetail;

$factory->define(MemberDetail::class, function (Faker $faker) {
    return [
        'firstname' => $faker->firstName,
        'surname' => $faker->lastname,
        'middlename' =>  random_int(0,1) == 1 ? $faker->lastname : NULL,
        'email' => random_int(0,3) == 2 ? NULL : $faker->email,
        'address' => random_int(0,3) == 1 ? NULL :$faker->address,
        'telephone' => random_int(0,3) == 3 ? NULL : $faker->e164PhoneNumber,
        'created_by' => 1,
        'member_type_id' => $faker->numberBetween(1, 4),
        'branch_id' => $faker->numberBetween(1, 4),
    ];
});
