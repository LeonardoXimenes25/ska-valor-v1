<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['teacher_id', 'name', 'sex', 'address'])]
class Teacher extends Model
{
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
}
