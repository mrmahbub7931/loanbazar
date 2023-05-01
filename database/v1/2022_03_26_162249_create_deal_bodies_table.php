<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDealBodiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deal_bodies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('best_deal_id');
            $table->string('body')->nullable();
            $table->foreign('best_deal_id')->references('id')->on('best_deals')->onDelete('cascade');
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
        Schema::dropIfExists('deal_bodies');
    }
}
