<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseAttendees extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'course_id',
        'organizer_id',
        'first_name',
        'last_name',
        'email',
        'job_title',
    ];

    public function courses()
    {
        return $this->hasMany(Course::class,'id','course_id');
    }
}
