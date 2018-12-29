<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAdminBranchesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_branches', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('admin_id');
            $table->integer('created_by');
            $table->integer('branch_id');
            $table->boolean('active')->default(true); //
            $table->unique(['branch_id', 'admin_id']);

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
        Schema::drop('admin_branches');
    }
}
