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
        Schema::create('field_surveys', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('district_id');
            $table->string('segment_number');
            $table->integer('segment_type_id');
            $table->integer('property_type_id');
            $table->integer('meter_type_id');
            $table->string('meter_number');
            $table->integer('meters_count');
            $table->text('comments')->nullable();
            $table->string('client_name')->nullable();
            $table->string('client_phone')->nullable();
            $table->string('client_national_id')->nullable();
            $table->decimal('longitude', 10, 7);
            $table->decimal('latitude', 10, 7);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('field_surveys');
    }
};
