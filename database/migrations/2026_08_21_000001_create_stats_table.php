<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('stats', function (Blueprint $table) {
            $table->id();
            $table->string('value'); // e.g., '5', '96%', '25+', 'Unggul'
            $table->string('label'); // e.g., 'Program Studi Pilihan', 'Alumni Bekerja < 3 Bulan'
            $table->string('color')->default('text-blue-700'); // e.g. text-blue-700, text-amber-500
            $table->integer('order')->default(1);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('stats');
    }
};
