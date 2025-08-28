<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('specialties', function (Blueprint $table) {
            $table->id();
            $table->json('title')->nullable();   // عنوان مترجم
            $table->string('image')->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->string('user_add', 30);

            $table->softDeletes(); // <-- soft delete
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('specialties');
    }
};
