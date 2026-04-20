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
        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            // Định nghĩa khóa ngoại liên kết với bảng provinces
            $table->foreignId('province_id')->constrained('provinces')->onDelete('cascade');
            // Định nghĩa khóa ngoại liên kết với bảng categories
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
            
            $table->string('name'); // Tên địa điểm (vd: Thung lũng tình yêu)
            $table->string('address'); // Địa chỉ chi tiết
            $table->longText('content'); // Bài viết giới thiệu chi tiết
            $table->string('image_thumbnail')->nullable(); // Ảnh đại diện địa điểm
            $table->decimal('latitude', 10, 8)->nullable(); // Tọa độ để nhúng map (nếu cần)
            $table->decimal('longitude', 11, 8)->nullable();
            $table->boolean('is_featured')->default(false); // Địa điểm nổi bật?
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('locations');
    }
};
