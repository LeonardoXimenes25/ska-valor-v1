<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

#[Fillable([
    // personal information
    'teacher_code', 
    'full_name', 
    'sex', 
    'address', 
    'phone', 
    'bio',
    'image',
    // status & contract 
    'status', 
    'status_note', 
    'join_date', 
    'leave_start_date', 
    'leave_end_date', 
    'exit_date',
    // education information 
    'institution_name', 
    'major', 
    'degree_level', 
    'graduation_year', 
    ])]
class Teacher extends Model
{
    use SoftDeletes;

    protected function fullName(): Attribute
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

    protected function casts(): array
    {
        return [
            'join_date' => 'date',
            'leave_start_date' => 'date',
            'leave_end_date' => 'date',
            'exit_date' => 'date',
        ];
    }
}