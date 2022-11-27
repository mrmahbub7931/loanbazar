<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBikeCarFormTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
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
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bike_car_form');
    }
}
