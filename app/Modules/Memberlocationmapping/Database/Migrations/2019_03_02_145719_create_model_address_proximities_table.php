<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateModelAddressProximitiesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('model_address_proximities', function (Blueprint $table) {

            $table->increments('id');
            $table->uuid('uuid')->unique();

            $table->integer('church_id');
            $table->float('distance', 12, 3);
            $table->string('status');

            $table->integer('created_by');
            $table->integer('updated_by')->nullable();

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
        Schema::drop('model_address_proximities');
    }
}
