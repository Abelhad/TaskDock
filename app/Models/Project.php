<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'title', 'description', 'status'];

    public function owner(){
        return $this->belongsTo(User::class);
    }

    public function members(){
        return $this->belongsToMany(User::class);
    }

    public function tasks(){
        return $this->hasMany(Task::class);
    }
}
