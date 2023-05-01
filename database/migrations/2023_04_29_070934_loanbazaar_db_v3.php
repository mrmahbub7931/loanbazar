<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class LoanbazaarDbV3 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // create loan_card_apply table
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
            $table->string('email')->nullable();
            $table->string('present_address')->nullable();
            $table->string('profession')->nullable();
            $table->string('existing_lc')->nullable();
            $table->string('existing_etin')->nullable();
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

        // best_deals table create
        Schema::create('best_deals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('title');
            $table->string('img_src');
            $table->string('btn_url');
            $table->string('btn_txt');
            $table->boolean('status')->default(true);
            $table->timestamps();
        });

        // deal_bodies table create
        Schema::create('deal_bodies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('best_deal_id');
            $table->string('body')->nullable();
            $table->foreign('best_deal_id')->references('id')->on('best_deals')->onDelete('cascade');
            $table->timestamps();
        });

        // reviews table create
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->text('body');
            $table->string('name');
            $table->string('designation');
            $table->string('avatar')->default('default_avatar.png');
            $table->timestamps();
        });

        // reviews add a new column 'company_name'
        Schema::table('reviews', function (Blueprint $table) {
            $table->string('company_name')->nullable();
        });

        // card_services table create
        Schema::create('card_services', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('service_title');
            $table->string('slug');
            $table->text('title_description')->nullable();
            $table->text('disclaimer')->nullable();
            $table->boolean('status')->default(true);
            $table->string('header_image')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });

        // card_service_faqs table create
        Schema::create('card_service_faqs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('card_service_id');
            $table->text('faq_title')->nullable();
            $table->text('faq_description')->nullable();
            $table->foreign('card_service_id')->references('id')->on('card_services')->onDelete('cascade');
            $table->timestamps();
        });

        // card_service_rows table create
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

        // loan_services table create
        Schema::create('loan_services', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('service_title');
            $table->string('slug');
            $table->text('title_description')->nullable();
            $table->text('disclaimer')->nullable();
            $table->boolean('status')->default(true);
            $table->string('header_image')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });

        // loan_service_rows table create
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

        // loan_service_faqs table create
        Schema::create('loan_service_faqs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('loan_service_id');
            $table->text('faq_title');
            $table->text('faq_description');
            $table->foreign('loan_service_id')->references('id')->on('loan_services')->onDelete('cascade');
            $table->timestamps();
        });

        // card_service_docs table create
        Schema::create('card_service_docs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('card_service_id');
            $table->string('title');
            $table->text('body');
            $table->boolean('status');
            $table->foreign('card_service_id')->references('id')->on('card_services')->onDelete('cascade');
            $table->timestamps();
        });

        // loan_service_docs table create
        Schema::create('loan_service_docs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('loan_service_id');
            $table->string('title');
            $table->text('body');
            $table->boolean('status');
            $table->foreign('loan_service_id')->references('id')->on('loan_services')->onDelete('cascade');
            $table->timestamps();
        });

        // card_service_rows add a column
        Schema::table('card_service_rows', function (Blueprint $table) {
            $table->string('bank_name')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // delete loan_card_apply table
        Schema::dropIfExists('loan_card_apply');
        // delete best_deals table
        Schema::dropIfExists('best_deals');
        // delete deal_bodies table
        Schema::dropIfExists('deal_bodies');
        // delete reviews table
        Schema::dropIfExists('reviews');
        // delete card_services table
        Schema::dropIfExists('card_services');
        // delete card_service_faqs table
        Schema::dropIfExists('card_service_faqs');
        // delete card_service_rows table
        Schema::dropIfExists('card_service_rows');
        // delete loan_services table
        Schema::dropIfExists('loan_services');
        // delete loan_service_rows table
        Schema::dropIfExists('loan_service_rows');
        // delete loan_service_faqs table
        Schema::dropIfExists('loan_service_faqs');
        // delete card_service_docs table
        Schema::dropIfExists('card_service_docs');
        // delete loan_service_docs table
        Schema::dropIfExists('loan_service_docs');
        // delete card_service_rows bank_name column
        Schema::table('card_service_rows', function (Blueprint $table) {
            $table->dropColumn('bank_name');
        });
        // delete reviews company_name column
        Schema::table('reviews', function (Blueprint $table) {
            $table->dropColumn('company_name');
        });
    }
}
