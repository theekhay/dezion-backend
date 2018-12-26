<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMemberDetailsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member_details', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('branch_id');
            $table->integer('member_type_id');

            $table->boolean('is_bulk')->default(0);
            $table->integer('batch')->nullable();

            $table->string('firstname');
            $table->string('surname');
            $table->string('middlename')->nullable();

            $table->string('email')->nullable();
            $table->text('address')->nullable();

            $table->string('telephone')->nullable();

            $table->integer('created_by');
            $table->integer('deleted_by')->nullable();

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
        Schema::drop('member_details');
    }
}
