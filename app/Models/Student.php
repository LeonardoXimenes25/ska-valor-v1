<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['student_id', 'name', 'sex', 'date_of_birth', 'place_of_birth', 'address', 'image'])]

class Student extends Model
    {
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
            ];
        }
    }
