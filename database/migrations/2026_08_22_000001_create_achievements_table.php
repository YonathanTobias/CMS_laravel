<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('achievements', function (Blueprint $table) {
            $table->id();
            $table->string('student_name');
            $table->string('student_prodi')->nullable();
            $table->string('title');
            $table->string('badge_title')->default('Juara 1');
            $table->string('badge_color')->default('bg-amber-500 text-slate-950');
            $table->string('event_name')->nullable();
            $table->text('description')->nullable();
            $table->string('poster_image')->nullable();
            $table->integer('order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('achievements');
    }
};
