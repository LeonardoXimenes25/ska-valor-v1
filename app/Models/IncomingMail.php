<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable([
    'mail_category_id', 
    'reference_number', 
    'sender', 
    'subject', 
    'mail_date', 
    'received_date', 
    'attachment', 
    'description'])]

class IncomingMail extends Model
{
    public function category(): BelongsTo {
        return $this->belongsto(MailCategory::class, 'mail_category_id');
    }
}
