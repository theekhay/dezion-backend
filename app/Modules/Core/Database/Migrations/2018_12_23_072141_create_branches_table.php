<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBranchesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branches', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('uuid')->unique();

            $table->string('name');
            $table->integer('church_id');
            $table->string('code')->nullable();

            $table->integer('status');

            $table->integer('created_by');
            $table->string('address')->nullable();

            $table->string('country')->nullable();
            $table->string('state')->nullable();

            $table->integer('deleted_by')->nullable();
            $table->date('date_established')->nullable();

            $table->integer('type')->nullable();

            $table->softDeletes();
            $table->timestamps();

            $table->unique(['name', 'church_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('branches');
    }
}
