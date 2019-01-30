<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCommunitiesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('communities', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name')->unique();
            $table->string('code')->nullable();

            $table->uuid('uuid')->unique();
            $table->integer('status');

            $table->integer('district_id');

            $table->string('leader_phone_number')->nullable();
            $table->string('leader_name')->nullable();
            $table->integer('leader_member_id')->nullable();
            $table->string('leader_email')->nullable();

            $table->integer('created_by');
            $table->integer('deleted_by')->nullable();
            $table->integer('updated_by')->nullable();

            $table->date('date_created')->nullable();

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
        Schema::drop('communities');
    }
}
