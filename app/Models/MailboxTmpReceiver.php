<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MailboxTmpReceiver extends Model
{
    use HasFactory;
        protected $fillable =[
        'mailbox_id',
        'receiver_id',
        'created_at',
        'updated_at',
    ];

        public function mailbox()
    {
        return $this->belongsTo(Mailbox::class, 'mailbox_id');
    }

    //     public function receiver()
    // {
    //     return $this->belongsTo(Position::class, 'receiver_id');
    // }
}
