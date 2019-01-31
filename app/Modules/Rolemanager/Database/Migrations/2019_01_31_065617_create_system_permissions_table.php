<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSystemPermissionsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('system_permissions', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name');
            $table->string('alias');
            $table->string('module'); //this is also like the category
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
        Schema::drop('system_permissions');
    }
}
