<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('drinks', function (Blueprint $table) {
            $table->string('name_en')->nullable();
            $table->string('name_ru')->nullable();
            $table->text('description_en')->nullable();
            $table->text('description_ru')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('drinks', function (Blueprint $table) {
            $table->dropColumn('name_tm');
            $table->dropColumn('name_ru');
            $table->dropColumn('description_tm');
            $table->dropColumn('description_ru');
        });
    }
};
