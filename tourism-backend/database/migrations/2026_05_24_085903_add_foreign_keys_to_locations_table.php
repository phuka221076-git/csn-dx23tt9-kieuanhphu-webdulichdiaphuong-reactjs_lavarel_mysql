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
        Schema::table('locations', function (Blueprint $table) {
            $table->foreign(['category_id'])->references(['id'])->on('categories')->onUpdate('restrict')->onDelete('cascade');
            $table->foreign(['province_id'])->references(['id'])->on('provinces')->onUpdate('restrict')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('locations', function (Blueprint $table) {
            $table->dropForeign('locations_category_id_foreign');
            $table->dropForeign('locations_province_id_foreign');
        });
    }
};
