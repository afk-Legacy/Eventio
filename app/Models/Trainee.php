<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trainee extends Model
{
    use HasFactory;
    protected $table = 'trainees';

    // fname  lname 	address 	phone_no 	bio 	experience 	
    public $fillable = ['first_name', 'last_name', 'phone_no', 'bio', 'experience', 'address', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function topics()
    {
        return $this->belongsToMany(Topic::class, 'topic_trainees');
    }

    public function events()
    {
        return $this->belongsToMany(Event::class, 'event_trainees');
    }
}
