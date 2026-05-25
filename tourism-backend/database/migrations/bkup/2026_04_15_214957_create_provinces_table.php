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
        Schema::create('provinces', function (Blueprint $table) {
            $table->id(); // Khóa chính tự tăng
            $table->string('name'); // Tên tỉnh (vd: Lâm Đồng)
            $table->string('slug')->unique(); // Đường dẫn không dấu (vd: lam-dong)
            $table->string('image')->nullable(); // Ảnh đại diện của tỉnh
            $table->text('description')->nullable(); // Mô tả sơ lược
            $table->timestamps(); // Tạo 2 cột created_at và updated_at
        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('provinces');
    }
};
