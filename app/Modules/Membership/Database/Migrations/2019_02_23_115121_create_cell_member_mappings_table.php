<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCellMemberMappingsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cell_member_mappings', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('church_id');
            $table->integer('member_id');
            $table->integer('mapped_model_id');
            $table->string('mapped_model');
            $table->integer('status');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('cell_member_mappings');
    }
}
