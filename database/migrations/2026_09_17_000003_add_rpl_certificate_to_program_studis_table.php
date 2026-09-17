<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('program_studis', function (Blueprint $table) {
            $table->string('rpl_certificate')->nullable()->after('accreditation_certificate');
        });
    }

    public function down(): void
    {
        Schema::table('program_studis', function (Blueprint $table) {
            $table->dropColumn('rpl_certificate');
        });
    }
};
