<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoanServiceDocsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loan_service_docs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('loan_service_id');
            $table->string('title');
            $table->text('body');
            $table->boolean('status');
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
        Schema::dropIfExists('loan_service_docs');
    }
}
