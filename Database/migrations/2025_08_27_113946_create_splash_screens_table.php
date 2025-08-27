<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('splash_screens', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable(); // مسار الصورة
            $table->json('title')->nullable();   // عنوان مترجم
            $table->json('description')->nullable(); // وصف مترجم
            $table->enum('app_type', ['delegate', 'patient', 'doctor', 'pharma_company']); // نوع التطبيق
            $table->enum('status', ['active', 'inactive'])->default('active'); // الحالة
            $table->string('user_add', 30);
            $table->timestamps();
            $table->softDeletes(); // لدعم Soft Delete
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('splash_screens');
    }
};