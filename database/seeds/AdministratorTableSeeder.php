<?php

use Illuminate\Database\Seeder;

class AdministratorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Modules\Membership\Models\Administrator::class, random_int(0, 5) )->create();
    }
}
