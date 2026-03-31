<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(['mail_category_id', 'reference_number', 'destination', 'subject', 'mail_date', 'attachment', 'description', 'status'])]
class OutgoingMail extends Model
{
    public function category(): BelongsTo
    {
        return $this->belongsTo(MailCategory::class, 'mail_category_id');
    }
}
