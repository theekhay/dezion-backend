<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMemberTypesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member_types', function (Blueprint $table) {
            $table->increments('id');

            $table->uuid('uuid')->unique();
            $table->integer('status');

            $table->string('name');
            $table->string('code')->nullable();
            $table->integer('church_id');

            $table->integer('created_by');
            $table->integer('deleted_by')->nullable();

            $table->integer('type')->default(111);

            $table->string('excluded_branches')->nullable();

            $table->timestamps();
            $table->softDeletes();

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
        Schema::drop('member_types');
    }
}
