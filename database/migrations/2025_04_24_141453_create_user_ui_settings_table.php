<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('user_ui_settings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->unique();
            $table->string('primary_color')->nullable();
            $table->enum('theme', ['light', 'dark', 'system'])->default('light');
            $table->enum('skin', ['default', 'bordered', 'semi_dark'])->default('default');
            $table->enum('menu', ['expanded', 'collapsed'])->default('expanded');
            $table->enum('navbar', ['sticky', 'static', 'hidden'])->default('sticky');
            $table->enum('content', ['compact', 'wide'])->default('wide');
            $table->enum('direction', ['ltr', 'rtl'])->default('ltr');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_ui_settings');
    }
};
