<?php

use Illuminate\Database\Seeder;
use App\Modules\Membership\Models\MemberDetail;

class MemberDetailTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory( MemberDetail::class, 100 )->create( );
    }
}
