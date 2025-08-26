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
            $table->enum('lang', ['ar','en']);                 // اللغة
            $table->string('title');                           // العنوان (AR أو EN)
            $table->enum('app_name', ['مريض','الأطباء','شركات الأدوية','مندوبين']); // التطبيق
            $table->text('description')->nullable();           // الوصف (AR أو EN)
            $table->softDeletes();                             // soft delete
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
