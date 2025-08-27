<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();

            // العنوان بالعربية والإنجليزية
            $table->string('title_ar');
            $table->string('title_en');

            // التطبيق
            $table->enum('app_name', ['مريض','الأطباء','شركات الأدوية','مندوبين']);

            // الوصف بالعربية والإنجليزية
            $table->text('description_ar')->nullable();
            $table->text('description_en')->nullable();

            // الحالة (نشط - غير نشط)
            $table->enum('status', ['نشط','غير نشط'])->default('نشط');

            $table->softDeletes(); // soft delete
            $table->timestamps();  // created_at & updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
