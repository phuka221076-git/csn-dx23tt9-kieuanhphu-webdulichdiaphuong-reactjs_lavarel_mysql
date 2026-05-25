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
        Schema::create('location_info_types', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Ví dụ: Kiến trúc & Ý nghĩa, Giờ mở cửa...
            $table->string('slug')->unique(); // kiến-truc-y-nghia
            $table->string('icon')->nullable(); // Để hiển thị icon ngoài React
            $table->integer('sort_order')->default(0); // Thứ tự hiển thị
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('location_info_types');
    }
};
