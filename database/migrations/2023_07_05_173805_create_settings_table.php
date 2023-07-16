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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->text('mobile');
            $table->text('email');
            $table->text('facebook');
            $table->text('youtube');
            $table->text('twitter');
            $table->text('instagram');
            $table->longText('address');
            $table->longText('working_hours');
            $table->longText('about');
            $table->longText('terms');
            $table->longText('site_name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
