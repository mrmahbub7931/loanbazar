<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCardServiceDocsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('card_service_docs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('card_service_id');
            $table->string('title');
            $table->text('body');
            $table->boolean('status');
            $table->foreign('card_service_id')->references('id')->on('card_services')->onDelete('cascade');
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
        Schema::dropIfExists('card_service_docs');
    }
}
