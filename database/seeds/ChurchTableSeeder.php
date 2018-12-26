<?php

use Illuminate\Database\Seeder;

class ChurchTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Modules\Core\Models\Church::class, 8)->create()->each(function ($church) {

            $church->getBranches()->save( factory(App\Modules\Core\Models\Branch::class)->make(['church_id' => $church->id]) );

            $church->getMemberTypes()->save( factory(App\Modules\Membership\Models\MemberType::class)->make(['church_id' => $church->id]) );
        });
    }
}
