<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePharmacies extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pharmacies', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->string('registered_name');
            $table->string('branch_code');
            $table->string('license_num');
            $table->string('address');
            $table->string('phone');
            $table->boolean('delivery')->default(false);
            $table->string('paypal_email');
            $table->string('blockchain_ver');
            $table->string('contact_person');
            $table->string('contact_person_number');
            $table->string('area');
            $table->foreignId('department_id')->constrained();
            $table->foreignId('country_id')->constrained();
            $table->foreignId('state_id')->constrained();
            $table->foreignId('city_id')->constrained();
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
        Schema::dropIfExists('pharmacies');
    }
}
