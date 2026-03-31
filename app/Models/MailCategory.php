<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

#[Fillable(['code', 'name', 'description'])]
class MailCategory extends Model
{
    use SoftDeletes;
    
    public function incomingMails(): HasMany {
        return $this->hasMany(IncomingMail::class, 'mail_category_id');
    }

    public function outgoingMails(): HasMany {
        return $this->hasMany(OutgoingMail::class, 'mail_category_id');
    }
}
