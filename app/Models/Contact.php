<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    public function emailsubject(){
        return $this->belongsTo(EmailSubjects::class, 'email_subject_id');
    }
}
