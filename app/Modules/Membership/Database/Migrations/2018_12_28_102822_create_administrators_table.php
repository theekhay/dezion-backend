<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAdministratorsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('administrators', function (Blueprint $table) {
            $table->increments('id');

            $table->string('firstname');
            $table->string('surname');
            $table->string('username')->nullable();
            $table->integer('member_id')->nullable();
            $table->integer('church_id');
            $table->string('email');
            $table->string('telephone');

            $table->boolean('active')->default(1);

            $table->integer('type');

            $table->integer('created_by');
            $table->integer('deleted_by')->nullable();
            $table->string('password');

            //$table->string('role');

            $table->unique(['church_id', 'email']);
            $table->unique(['church_id', 'telephone']);

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
        Schema::drop('administrators');
    }
}
