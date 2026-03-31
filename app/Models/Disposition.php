<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(['incoming_mail_id', 'disposition_to', 'instructions', 'status', 'due_date'])]

class Disposition extends Model
{
    public function incomingMail(): BelongsTo
    {
        return $this->belongsto(IncomingMail::class);
    }
}
