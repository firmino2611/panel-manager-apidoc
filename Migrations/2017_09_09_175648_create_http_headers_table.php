<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHttpHeadersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('http_headers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 30);
            $table->text('description');
            $table->integer('api_doc_id')->unsigned();

            $table->foreign('api_doc_id')
                ->references('id')
                ->on('api_docs')
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
        Schema::dropIfExists('http_headers');
    }
}
