<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterCellsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cells', function (Blueprint $table) {

            $table->string('community_name')->nullable();
            $table->string('district_name')->nullable();
            $table->string('zone_name')->nullable();
            $table->string('leader_mobile_number')->nullable();

            $table->integer('district_id')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cells', function (Blueprint $table) {

            $table->dropColumn(['community_name', 'district_name', 'zone_name', 'leader_mobile_number' ]);
            $table->integer('district_id')->change();
        });
    }
}
