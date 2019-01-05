<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInAppsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('in_app_messages', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('sender');
            $table->integer('recipient');
            $table->text('message');
            $table->integer('reply_to')->nullable();
            $table->boolean('read')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('in_apps');
    }
}
