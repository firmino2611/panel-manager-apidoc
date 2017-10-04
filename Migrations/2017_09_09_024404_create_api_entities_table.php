<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApiEntitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('api_entities', function (Blueprint $table) {
            $table->integer('api_doc_id')->unsigned();
            $table->integer('entity_id')->unsigned();

            $table->foreign('api_doc_id')
                    ->references('id')
                        ->on('api_docs')
                            ->onDelete('cascade');

            $table->foreign('entity_id')
                    ->references('id')
                        ->on('entities')
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
        Schema::dropIfExists('api_entities');
    }
}
