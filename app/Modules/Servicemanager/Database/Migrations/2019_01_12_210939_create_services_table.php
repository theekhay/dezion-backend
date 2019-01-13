<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateServicesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name');
            $table->string('code', 10)->nullable();
            $table->integer('church_id');

            $table->integer('created_by');
            $table->integer('deleted_by')->nullable();

            $table->string('schedule')->nullable(); //<-- this is supposed to be how often the service holds

            $table->string('enabled_for')->default('*');

            $table->boolean('active')->default(1);
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
        Schema::drop('services');
    }
}
