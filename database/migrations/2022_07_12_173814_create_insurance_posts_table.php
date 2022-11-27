<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInsurancePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
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
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('insurance_posts');
    }
}
