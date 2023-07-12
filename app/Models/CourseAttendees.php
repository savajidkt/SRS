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

    public function referraluser()
    {
        return $this->hasMany(AttendeeReferens::class,'attendees_id','id');
    }

    public function questionnaireself()
    {
        return $this->hasOne(QuestionnaireAnswers::class,'attendees_id','id')->where('type',0);
    }

    public function questionnaireref()
    {
        return $this->hasMany(QuestionnaireAnswers::class,'attendees_id','id')->select('contact_id')->distinct()
        ->where('type',1);
    }
}
