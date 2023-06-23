<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Course extends Model
{
    use HasFactory;
    use HasFactory;

    const ACTIVE = 1;
    const INACTIVE = 0;

    const STATUS = [
        self::ACTIVE => 'Active',
        self::INACTIVE => 'Inactive'
    ];
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'course_category_id',
        'start_date',
        'end_date',
        'duration',
        'client_id',
        'path',
    ];

    public function trainerDetail():HasMany
    {
        return $this->hasMany(TrainerDetail::class,'course_id','id');
    }
    public function coursecategoryname()
    {
        return $this->belongsTo(CourseCategory::class,'course_category_id','id');
    }
    public function clientname()
    {
        return $this->belongsTo(Client::class,'client_id','id');
    }
    public function getActionAttribute(): string
    {
        $editAction = '<a href="'. route('course.edit', $this->id).'"><i class="fa-regular fa-pen-to-square edit-ico" title="Edit"></i></a> ';
        $viewAction = '<a href="'. route('course.show', $this->id).'"><i class="fa-solid fa-eye" title="View"></i></a> ';
        $deleteAction = '<a href="'.route('course.destroy', $this).'" class="delete_action" data-id="'. $this->id.'" data-method="delete"><i class="fa-sharp fa-solid fa-xmark" title="Remove"></i></i></a>';
        $editAttendees = '<a href="'. route('course.show', $this->id).'"><i class="fa-regular fa-user edit-ico" title="Edit Attendees"></i></i></a> ';
        return $editAction.''.$viewAction.''.$deleteAction.''.$editAttendees;
    }
}
