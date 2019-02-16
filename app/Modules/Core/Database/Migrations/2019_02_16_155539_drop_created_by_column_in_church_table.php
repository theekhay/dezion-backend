<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropCreatedByColumnInChurchTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if ( Schema::hasColumn('churches', 'created_by')) {
            Schema::table('churches', function (Blueprint $table) {
                //drop the created_by column.
                $table->dropColumn('created_by');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if ( ! Schema::hasColumn('churches', 'created_by') ){

            Schema::table('churches', function (Blueprint $table) {
                $table->integer('created_by');
            });
        }
    }
}
