<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['title', 'subject', 'description', 'file_path', 'program_category_id'])]

class Module extends Model
{
    public function programCategory()
    {
        return $this->belongsTo(ProgramCategory::class, 'program_category_id');
    }
}
