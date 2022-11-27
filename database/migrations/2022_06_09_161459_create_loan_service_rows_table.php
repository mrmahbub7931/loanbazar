<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoanServiceRowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loan_service_rows', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('loan_service_id');
            $table->string('bank_logo')->default('bank_1.png');
            $table->string('notify_top')->nullable();
            $table->string('bank_name')->nullable();
            $table->text('ineterest_rate_range')->nullable();
            $table->text('processing_fee')->nullable();
            $table->text('loan_amount')->nullable();
            $table->text('loan_tenure')->nullable();
            $table->text('fees_charges')->nullable();
            $table->text('features')->nullable();
            $table->text('eligibility')->nullable();
            $table->string('notify_bottom')->nullable();
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
        Schema::dropIfExists('loan_service_rows');
    }
}
