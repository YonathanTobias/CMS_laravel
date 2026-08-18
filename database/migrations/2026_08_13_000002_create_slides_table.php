<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('slides', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('subtitle')->nullable();
            $table->string('badge')->default('PMB 2026/2027');
            $table->string('badge_color')->default('bg-amber-500 text-slate-950');
            $table->text('image');
            $table->string('cta_text')->default('Daftar PMB Online');
            $table->string('cta_link')->default('#');
            $table->string('secondary_text')->nullable();
            $table->string('secondary_link')->nullable();
            $table->integer('order')->default(1);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('slides');
    }
};
