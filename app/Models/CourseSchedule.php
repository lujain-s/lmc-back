<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseSchedule extends Model
{
    protected $table = 'course_schedules';
    use HasFactory;

    protected $fillable =[
        "CourseId",
        "RoomId",
        "Start_Enroll",
        "End_Enroll",
        "Enroll_Status",
        "Start_Date",
        "End_Date",
        "CourseDays",
    ];

    protected $casts = [
        'CourseDays' => 'array',
    ];


    public function Room(){
        return $this->belongsTo(Room::class, 'RoomId');
    }

    public function Course(){
        return $this->belongsTo(Course::class, 'CourseId');
    }
}
