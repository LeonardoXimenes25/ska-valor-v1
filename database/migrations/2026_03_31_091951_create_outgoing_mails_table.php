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
        Schema::create('outgoing_mails', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mail_category_id')->constrained('mail_categories')->onDelete('cascade');
            $table->string('reference_number')->unique();
            $table->string('destination');
            $table->string('subject');
            $table->date('mail_date');
            $table->string('attachment')->nullable();
            $table->text('description')->nullable();
            $table->enum('status', ['draft', 'published', 'archieved'])->default('draft');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('outgoing_mails');
    }
};
