<?php

use Illuminate\Database\Seeder;

class MemberTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Modules\Membership\Models\MemberType::class, 4 )->create();
    }
}
