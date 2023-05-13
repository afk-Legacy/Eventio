<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendee extends Model
{
    use HasFactory;
    protected $primaryKey = 'email';
    public $incrementing = false;

    public function user()
    {
        return $this->belongsTo(User::class, 'email', 'email');
    }
}
