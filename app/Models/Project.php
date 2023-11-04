<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $with = [
        // 'nama_project', 'deskripsi_project', 'mulai', 'selesai'
    ];

    public function Task()
    {
        return $this->hasMany(Task::class);
    }

    public function Suggestion()
    {
        return $this->hasMany(Suggestion::class, 'suggestions');
    }
}
