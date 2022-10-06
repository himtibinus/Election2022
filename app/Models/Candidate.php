<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    protected $fillable = [
        'name', 'image', 'total_vote'
    ];

    use HasFactory;

    public function work_programs()
    {
        return $this->hasMany(WorkProgram::class);
    }

    public function experiences()
    {
        return $this->hasMany(Experience::class);
    }
}
