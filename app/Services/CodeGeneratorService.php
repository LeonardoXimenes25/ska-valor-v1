<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

class CodeGeneratorService
{
    /**
     * Membuat kode otomatis dengan prefix tertentu.
     * Contoh: LPS-001, LPS-002, dst.
     */
    public static function generate(string $modelClass, string $column, string $prefix, int $length = 3): string
    {
        // Ambil record terakhir dari database
        $lastRecord = $modelClass::orderBy('id', 'desc')->first();

        if (!$lastRecord) {
            $number = 1;
        } else {
            // Ambil angka dari kode terakhir (misal LPS-001 ambil 001)
            $lastCode = $lastRecord->$column;
            $lastNumber = (int) str_replace($prefix . '-', '', $lastCode);
            $number = $lastNumber + 1;
        }

        // Gabungkan prefix dengan angka yang sudah diberi padding nol di depan
        return $prefix . '-' . str_pad($number, $length, '0', STR_PAD_LEFT);
    }
}