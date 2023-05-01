<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLifeGeneralFormTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
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
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('life_general_form');
    }
}
