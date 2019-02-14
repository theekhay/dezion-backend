<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUnAssimilatedBucketsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('un_assimilated_buckets', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name');
            $table->integer('created_by');
            $table->boolean('status');

            $table->integer('deleted_by');

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
        Schema::drop('un_assimilated_buckets');
    }
}
