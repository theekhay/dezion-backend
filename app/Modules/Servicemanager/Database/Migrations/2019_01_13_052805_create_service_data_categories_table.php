<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateServiceDataCategoriesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_data_categories', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('church_id');
            $table->string('name');
            $table->string('code')->nullable();
            $table->boolean('active')->default(1);
            $table->integer('created_by');
            $table->integer('deleted_by')->nullable();

            $table->boolean('is_approved')->nullable();
            $table->boolean('requires_approval')->nullable();
            $table->boolean('approved_by')->nullable();

            $table->string('allowed_branches')->default('*');


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
        Schema::drop('service_data_categories');
    }
}
