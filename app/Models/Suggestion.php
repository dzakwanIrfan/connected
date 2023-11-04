<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suggestion extends Model
{
    protected $guarded = ['id'];
    protected $with = [];
    use HasFactory;

    public function Project()
    {
        return $this->belongsTo(Project::class);
    }

    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
