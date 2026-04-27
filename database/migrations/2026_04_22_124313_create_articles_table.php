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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->ForeignId('category_id')->constrained('article_categories')->onDelete('cascade');
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('excerpt');
            $table->text('content')->nullable();
            $table->string('image')->nullable();
            $table->enum('status', ['draft', 'published', 'archieved'])->default('draft');
            $table->date('published_at')->nullable(); // Jadwal tayang
            $table->integer('views')->default(0); // Counter pembaca
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
