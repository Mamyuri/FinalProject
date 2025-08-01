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
    Schema::create('trips', function (Blueprint $table) {
            $table->id();
            $table->string('name');        // اسم الرحلة
            $table->decimal('price', 8, 2); // السعر
            $table->date('date');          // تاريخ الرحلة
            $table->string('image')->nullable(); // صورة الرحلة (اختياري)
            $table->timestamps();
        });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trips');
    }
};
