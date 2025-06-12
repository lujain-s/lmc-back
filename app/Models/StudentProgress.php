<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentProgress extends Model
{
    protected $table = 'student_progress';

    use HasFactory;

    protected $fillable = [
        'StudentId',
        'CourseId',
        'Percentage',
        'Score',
    ];

    public function Course(){
        return $this->belongsTo(Course::class, 'CourseId');
    }

    public function User(){
        return $this->hasOne(User::class, 'StudentId');
    }
}
