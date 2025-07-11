<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('users', function (Blueprint $table) {
        $table->id();
        $table->string('companyName');
        $table->string('companyAddress1');
        $table->string('companyAddress2');
        $table->string('townCity');
        $table->string('country');
        $table->string('postcode');
        $table->string('telephone');
        $table->string('businessType');
        $table->string('companyReg');
        $table->string('website');
        $table->string('businessEmail');
        $table->string('motorTradeInsurance');
        $table->string('vatNumber');
        $table->string('firstName');
        $table->string('surname');
        $table->string('title');
        $table->string('jobTitle');
        $table->string('phone');
        $table->string('personalEmail');
        $table->string('password');
        $table->string('uploadID');
        $table->string('motorTradeProof');
        $table->string('addressProof');
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
