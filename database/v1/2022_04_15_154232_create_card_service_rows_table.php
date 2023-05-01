<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCardServiceRowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('card_service_rows', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('card_service_id');
            $table->string('card_image')->default('card.png');
            $table->string('notify_top')->nullable();
            $table->text('interest_period')->nullable();
            $table->text('annual_fee')->nullable();
            $table->text('card_processing')->nullable();
            $table->text('free_supplementary_card')->nullable();
            $table->text('withdrawl_limit')->nullable();
            $table->text('fees_charges')->nullable();
            $table->text('features')->nullable();
            $table->text('eligibility')->nullable();
            $table->string('notify_bottom')->nullable();
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
        Schema::dropIfExists('card_service_rows');
    }
}
