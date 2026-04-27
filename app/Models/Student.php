<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

#[Fillable([    
                'student_id', 
                'name', 
                'sex', 
                'date_of_birth', 
                'place_of_birth', 
                'address',
                'phone_number',
                'municipality',
                'administrative_post',
                'tribe',
                'village', 
                'image',
                'parent_name', 
                'parent_phone', 
                'status', 
                'is_active', 
                'program_category_id', 
                'enrollment_date'])]

class Student extends Model
    {
        // relation with program category table
        public function programCategory()
        {
            return $this->belongsTo(ProgramCategory::class, 'program_category_id');
        }


        // mutator
        protected function name(): Attribute
        {
            return Attribute::make(
                get: fn (string $value) => ucwords($value),
                set: fn($value) => ucwords(strtolower($value)),
            );
        }

        protected function address(): Attribute
        {
            return Attribute::make(
                get: fn (string $value) => ucwords($value),
                set: fn($value) => ucwords(strtolower($value)),
            );
        }

        protected function place_of_birth(): Attribute
        {
            return Attribute::make(
                get: fn (string $value) => ucwords($value),
                set: fn($value) => ucwords(strtolower($value)),
            );
        }

        protected function casts(): array
        {
            return [
                'date_of_birth' => 'date',
                'enrollment_date' => 'date',
                'is_active' => 'boolean',
            ];
        }

    }
