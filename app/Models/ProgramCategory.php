<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable(['name', 'description'])]

class ProgramCategory extends Model
{
    // relation with program table
    public function programs(): HasMany
    {
        return $this->hasMany(Program::class);
    }

    // relation with module table
    public function modules(): HasMany
    {
        return $this->hasMany(Module::class);
    }
}
