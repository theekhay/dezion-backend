<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterDistrictTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('districts', function (Blueprint $table) {

            if(Schema::hasColumn('districts', 'head') ) {
                $table->renameColumn('head', 'head_member_id');
            }

            if(Schema::hasColumn('districts', 'name') ) {
                $table->unique('name');
            }

            $table->string('head_phone_number')->nullable();
            $table->string('head_name')->nullable();
            $table->string('head_email')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('districts', function (Blueprint $table) {

            $table->dropColumn(['head_phone_number', 'head_name', 'head_email']);

            if(Schema::hasColumn('districts', 'head_member_id') ) {
                //Schema::rename('head_member_id', 'head');
                $table->renameColumn('head_member_id', 'head');
            }

            if(Schema::hasColumn('districts', 'name') ) {
                $table->dropUnique(['name']);
            }

        });

    }
}
