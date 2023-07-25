<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttendeeReferens extends Model
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
        'attendees_id',
        'first_name',
        'last_name',
        'email',
        'relationship',
        'questionnaire_filled',
    ];

    public function attendeeuser()
    {
        return $this->belongsToMany(CourseAttendees::class,'id','attendees_id');
    }
    public function referralusers()
    {
        return $this->hasOne(QuestionnaireAnswers::class,'contact_id','id')->orderBy('id','desc');
    }

    public function attendeedata()
    {
        return $this->hasOne(CourseAttendees::class,'id','attendees_id');
    }
}
