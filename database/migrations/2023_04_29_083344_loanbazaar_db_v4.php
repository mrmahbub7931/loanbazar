<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class LoanbazaarDbV4 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // insurances table create
        Schema::create('insurances', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('url',250)->unique();
            $table->text('description')->nullable();
            $table->string('header_image')->default('header_image.jpg');
            $table->boolean('status')->default(true)->comment( '1 => Active, 2 => Inactive' );
            $table->softDeletes();
            $table->timestamps();
        });

        // insurance_posts create
        Schema::create('insurance_posts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('insurance_id');
            $table->string('title');
            $table->string('url',250)->unique();
            $table->text('description')->nullable();
            $table->string('pdf_file')->nullable();
            $table->string('featured_image')->default('featured_image.png');
            $table->string('status')->default(true)->comment('1 => Active, 2 => Inactive');
            $table->foreign('insurance_id')->references('id')->on('insurances')->onDelete('cascade');
            $table->timestamps();
        });

        // life_general_form create
        Schema::create('life_general_form', function (Blueprint $table) {
            $table->id();
            $table->string('insurance_type');
            $table->string('full_name');
            $table->string('email');
            $table->string('phone');
            $table->string('date_of_birth')->nullable();
            $table->string('profession')->nullable();
            $table->string('location')->nullable();
            $table->string('status')->nullable()->default('new');
            $table->string('admin_note',255)->nullable();
            $table->string('vendor_note',255)->nullable();
            $table->timestamps();
        });

        // bike_car_form create
        Schema::create('bike_car_form', function (Blueprint $table) {
            $table->id();
            $table->string('insurance_type');
            $table->string('full_name');
            $table->string('email');
            $table->string('phone');
            $table->string('receiving_address')->nullable();
            $table->string('insurance_date')->nullable();
            $table->string('file')->nullable();
            $table->string('status')->nullable()->default('new');
            $table->string('admin_note',255)->nullable();
            $table->string('vendor_note',255)->nullable();
            $table->timestamps();
        });

        // teams create
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('name',255);
            $table->string('designation',255);
            $table->string('facebook_url')->nullable();
            $table->string('linkedin_url')->nullable();
            $table->string('instagram_url')->nullable();
            $table->string('team_image')->default('default.png');
            $table->boolean('status')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });

        // circulars create
        Schema::create('circulars', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('job_title',255);
            $table->string('job_location',255)->nullable();
            $table->text('job_description')->nullable();
            $table->boolean('status')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });

        // circulars add a new column 'slug'
        Schema::table('circulars', function (Blueprint $table) {
            $table->string('slug',255);
        });

        // media table create
        Schema::create('media', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('file')->nullable();
            $table->string('file_type')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });

        // exchangne_rates table create
        Schema::create('exchangne_rates', function (Blueprint $table) {
            $table->id();
            $table->string('date');
            $table->text('currency');
            $table->text('buying');
            $table->text('selling');
            $table->timestamps();
        });

        // writers table create
        Schema::create('writers', function (Blueprint $table) {
            $table->id();
            $table->string('writer_name');
            $table->text('writer_bio')->nullable();
            $table->string('writer_image')->default('avatar.png');
            $table->timestamps();
        });

        // home_images table create
        Schema::create('home_images', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->string('image_title');
            $table->string('image')->default('banner.png');
            $table->timestamps();
        });

        // counters table create
        Schema::create('counters', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->string('title');
            $table->string('card_disbursed');
            $table->string('client_served');
            $table->string('loan_disbursed');
            $table->timestamps();
        });

        // corporate_partners table create
        Schema::create('corporate_partners', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->string('name',255);
            $table->string('corporate_logo');
            $table->timestamps();
        });

        // financial_partners table create
        Schema::create('financial_partners', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->string('name',255);
            $table->string('financial_logo');
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
        // insurances delete
        Schema::dropIfExists('insurances');
        // insurance_posts delete
        Schema::dropIfExists('insurance_posts');
        // life_general_form delete
        Schema::dropIfExists('life_general_form');
        // bike_car_form delete
        Schema::dropIfExists('bike_car_form');
        // teams delete
        Schema::dropIfExists('teams');
        // circulars delete
        Schema::dropIfExists('circulars');
        // circulars delete a column 'slug'
        Schema::table('circulars', function (Blueprint $table) {
            $table->dropColumn('slug');
        });
        // media delete
        Schema::dropIfExists('media');
        // exchangne_rates delete
        Schema::dropIfExists('exchangne_rates');
        // writers delete
        Schema::dropIfExists('writers');
        // home_images delete
        Schema::dropIfExists('home_images');
        // counters delete
        Schema::dropIfExists('counters');
        // corporate_partners delete
        Schema::dropIfExists('corporate_partners');
        // financial_partners delete
        Schema::dropIfExists('financial_partners');
    }
}
