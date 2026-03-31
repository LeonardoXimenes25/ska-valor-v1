<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

#[Fillable(['mail_category_id', 'reference_number', 'destination', 'subject', 'mail_date', 'attachment', 'description', 'status'])]
class OutgoingMail extends Model
{
    use SoftDeletes;
    
    public function category(): BelongsTo
    {
        return $this->belongsTo(MailCategory::class, 'mail_category_id');
    }
}
