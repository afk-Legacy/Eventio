<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    use HasFactory;
    public $fillable = ['topic_name'];
    protected $table = 'topics';


    public function events() {
        return $this->hasMany(Event::class);
    }

    public function trainees() {
        return $this->belongsToMany(Trainee::class, 'topic_trainees');
    }

    
}
