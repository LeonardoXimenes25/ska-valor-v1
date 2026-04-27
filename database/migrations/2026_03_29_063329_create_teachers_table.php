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
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            // personal information
            $table->string('teacher_code')->unique();
            $table->string('full_name');
            $table->enum('sex', ['m', 'f'])->default('m');
            $table->string('address')->nullable();
            $table->string('phone', 13)->nullable();
            $table->text('bio')->nullable();
            $table->string('image')->nullable();

            // Employment Status (Ini yang kamu tanyakan)
            $table->enum('status', ['active', 'resigned', 'fired', 'retired', 'terminated', 'on_leave'])->default('active');
            
            // Informasi Cuti / Keluar
            $table->string('status_note')->nullable(); // Detail: "Sakit", "Maternity", "Pindah Luar Kota"
            $table->date('join_date')->nullable();     // Kapan mulai kontrak
            $table->date('leave_start_date')->nullable(); // Jika cuti, mulai kapan
            $table->date('leave_end_date')->nullable();   // Jika cuti, perkiraan masuk kapan
            $table->date('exit_date')->nullable();      // Kapan resmi keluar (resign/pensiun)

            // education information
            $table->string('institution_name')->nullable();
            $table->string('major')->nullable();
            $table->string('degree_level')->nullable();
            $table->string('graduation_year')->nullable();

            // table relation with program
            // $table->foreignId('program_category_id')->constrained('program_categories')->onDelete('cascade');
            
            
            $table->softDeletes(); // Profesional: gunakan soft delete agar data tidak hilang permanen
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teachers');
    }
};
