<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $with = [];

    public function Project()
    {
        return $this->belongsTo(Project::class);
    }

    Public function User()
    {
        return $this->belongsToMany(User::class);
    }
}
