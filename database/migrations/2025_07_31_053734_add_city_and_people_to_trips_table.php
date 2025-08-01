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
    Schema::table('trips', function (Blueprint $table) {
        $table->string('city')->nullable();
        $table->integer('people')->nullable();
    });
}

public function down(): void
{
    Schema::table('trips', function (Blueprint $table) {
        $table->dropColumn(['city', 'people']);
    });
}
};
