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
        Schema::create('meter_replacements', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('district_id');
            $table->decimal('longitude', 10, 7);
            $table->decimal('latitude', 10, 7);
            $table->tinyInteger('status')->comment('1 done , 2 cancelled ');
            $table->string('segment_number');
            $table->string('old_meter_number');
            $table->string('old_meter_read');
            $table->string('new_meter_number');
            $table->string('new_meter_read')->nullable();
            $table->string('new_meter_company_id');
            $table->text('comments')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('meter_replacements');
    }
};
