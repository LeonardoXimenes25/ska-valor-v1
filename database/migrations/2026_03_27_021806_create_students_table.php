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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('student_id')->unique(); // NISN atau Nomor Induk
            $table->string('name', 60);
            $table->enum('sex', ['m', 'f'])->default('m');
            $table->date('date_of_birth');
            $table->string('place_of_birth');
            $table->string('address');
            $table->string('phone_number', 20)->nullable();
            
            // Informasi Orang Tua/Wali
            $table->string('parent_name', 60)->nullable();
            $table->string('parent_phone', 20)->nullable();

            // informasi lokasi
            $table->string('municipality')->nullable();
            $table->string('administrative_post')->nullable();
            $table->string('tribe')->nullable();
            $table->string('village')->nullable();
            
            $table->string('image')->nullable(); 
            
            $table->enum('status', ['active', 'dropout', 'alumni'])->default('active');
            $table->boolean('is_active')->default(true); // Memudahkan query: where('is_active', true)
            
            // Relasi ke Program
            $table->foreignId('program_category_id')->constrained('program_categories')->onDelete('cascade');
            
            // Tanggal Masuk
            $table->date('enrollment_date')->nullable();
            $table->timestamps();
            $table->softDeletes(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
