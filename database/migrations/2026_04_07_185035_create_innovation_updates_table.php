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
        Schema::create('innovation_updates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('innovations_id')->constrained('innovations')->cascadeOnDelete();
            $table->string('title');
            $table->text('description');
            $table->timestamps();
            $table->index('innovations_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('innovation_updates');
    }
};
