<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddChurchIdToRoleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('roles', function (Blueprint $table) {

            $table->integer('church_id');
            $table->integer('status');

            $table->integer('created_by');
            $table->integer('deleted_by')->nullable();
            $table->integer('updated_by')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('role', function (Blueprint $table) {

            $table->dropColumn(['church_id', 'status', 'created_by', 'deleted_by', 'updated_by']);
        });
    }
}
