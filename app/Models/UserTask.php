<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserTask extends Model
{
    use HasFactory;
    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function Task()
    {
        return $this->belongsTo(Task::class);
    }
}
