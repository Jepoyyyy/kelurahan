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
    Schema::table('innovation_updates', function (Blueprint $table) {
        $table->date('activity_date')->nullable()->after('description');
    });
}

public function down(): void
{
    Schema::table('innovation_updates', function (Blueprint $table) {
        $table->dropColumn('activity_date');
    });
}
};
