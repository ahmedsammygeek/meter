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
        Schema::create('other_replacements', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('district_id');
            $table->decimal('longitude', 10, 7);
            $table->decimal('latitude', 10, 7);
            $table->tinyInteger('status')->comment('1 done , 2 cancelled ');
            $table->text('comments')->nullable();
            $table->string('segment_number');
            $table->string('current_meter_number');
            $table->string('current_meter_read');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('other_replacements');
    }
};
