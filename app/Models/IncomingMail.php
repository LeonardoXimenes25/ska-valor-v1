<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

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
    use SoftDeletes;
    
    public function category(): BelongsTo {
        return $this->belongsto(MailCategory::class, 'mail_category_id');
    }

    public function dispositions(): HasMany
    {
        return $this->hasMany(Disposition::class);
    }
}
