<?php

namespace App\Models;

use App\Models\Program;
use App\Models\Teacher;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable([
    'program_id',
    'teacher_id',
    'learning_day',
    'start_time',
    'end_time',
    'start_date',
    'end_date',
    'quota',
    'status'    
])]

class Schedule extends Model
{
    public function program()
    {
        return $this->belongsTo(Program::class);
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    protected function casts(): array
        {
            return [
                'start_time' => 'datetime:H:i',
                'end_time' => 'datetime:H:i',
                'start_date' => 'date',
                'end_date' => 'date',
            ];
        }
}
