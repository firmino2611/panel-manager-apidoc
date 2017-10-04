<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApiCodeStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('api_code_status', function (Blueprint $table) {
            $table->integer('api_doc_id')->unsigned();
            $table->integer('code_status_id')->unsigned();
            $table->text('releases')->nullable();

            $table->foreign('api_doc_id')
                    ->references('id')
                        ->on('api_docs')
                            ->onDelete('cascade');

            $table->foreign('code_status_id')
                    ->references('id')
                        ->on('code_status')
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
        Schema::dropIfExists('api_code_statuses');
    }
}
