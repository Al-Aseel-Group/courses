<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherSkill extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'teacher_id'
    ];
}

