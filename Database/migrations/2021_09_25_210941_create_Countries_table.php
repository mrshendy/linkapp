<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->id();

            // حقل name مترجم (Spatie Translatable)
            $table->json('name');

            // باقي الحقول حسب الموديل
            $table->text('notes')->nullable();
            $table->string('user_add', 30);

            $table->softDeletes();   // الحذف المنطقي
            $table->timestamps();    // created_at & updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('countries');
    }
};
