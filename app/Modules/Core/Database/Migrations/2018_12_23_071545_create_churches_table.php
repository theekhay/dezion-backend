<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateChurchesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('churches', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name')->unique();
            $table->string('code')->nullable();
            $table->boolean('active')->default(1);
            $table->integer('created_by');
            $table->text('logo')->nullable();
            $table->string('slogan')->nullable();

            $table->string('activation_key')->unique();
            $table->date('date_established')->nullable();

            $table->integer('mode');

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
        Schema::drop('churches');
    }
}
