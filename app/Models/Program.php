<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(['code', 'program_name', 'program_category_id', 'sub_category', 'description', 'is_active'])]
class Program extends Model
{
    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
        ];
    }

    public function programCategory(): BelongsTo
    {
        return $this->belongsTo(ProgramCategory::class, 'program_category_id');
    }
}
