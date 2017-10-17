<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApiResourcesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('api_resources', function (Blueprint $table) {
            $table->integer('api_doc_id')->unsigned();
            $table->integer('resource_id')->unsigned();
            $table->boolean('depreciated')->default(false);

            $table->foreign('api_doc_id')
                ->references('id')
                ->on('api_docs')
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
        Schema::dropIfExists('api_resources');
    }
}
