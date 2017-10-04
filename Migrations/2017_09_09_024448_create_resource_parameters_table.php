<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResourceParametersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resource_parameters', function (Blueprint $table) {
            $table->integer('parameter_id')->unsigned();
            $table->integer('resource_id')->unsigned();

            $table->foreign('parameter_id')
                ->references('id')
                ->on('parameters')
                ->onDelete('cascade');

            $table->foreign('resource_id')
                ->references('id')
                ->on('resources')
                ->onDelete('cascade');

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
        Schema::dropIfExists('resource_parameters');
    }
}
