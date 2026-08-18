<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('spmi_documents', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('document_number')->nullable();
            $table->string('category')->default('SOP'); // SOP, Kebijakan, Manual Mutu, Akreditasi, Formulir
            $table->string('file_path')->nullable();
            $table->string('year')->default('2026');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('spmi_documents');
    }
};
