<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoanServiceFaqsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loan_service_faqs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('loan_service_id');
            $table->text('faq_title');
            $table->text('faq_description');
            $table->foreign('loan_service_id')->references('id')->on('loan_services')->onDelete('cascade');
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
        Schema::dropIfExists('loan_service_faqs');
    }
}
