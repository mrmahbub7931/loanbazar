<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoanCardApply extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loan_card_apply', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('send_to_vendor')->unsigned()->nullable();
            $table->bigInteger('tracking_id')->unsigned();
            $table->string('type');
            $table->string('card_name')->nullable();
            $table->string('loan_name')->nullable();
            $table->string('full_name');
            $table->string('phone');
            $table->string('date_of_birth')->nullable();
            $table->string('email');
            $table->string('present_address');
            $table->string('profession');
            $table->string('existing_lc');
            $table->string('existing_etin');
            $table->string('user_note')->nullable();
            $table->string('vendor_note')->nullable();
            $table->string('author_note')->nullable();
            $table->string('company_name')->nullable();
            $table->string('designation')->nullable();
            $table->string('monthly_salary')->nullable();
            $table->string('salary_paid_by')->nullable();
            $table->string('business_name')->nullable();
            $table->string('business_type')->nullable();
            $table->string('business_monthly_income')->nullable();
            $table->string('house_type')->nullable();
            $table->string('monthly_rental_income')->nullable();
            $table->string('status')->default('New');
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
        Schema::dropIfExists('loan_card_apply');
    }
}
