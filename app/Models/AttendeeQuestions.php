<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttendeeQuestions extends Model
{
    use HasFactory;

     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'question',
        'category_id',
    ];

    public function getActionAttribute(): string
    {
        $editAction = '<a href="'. route('attendee.edit', $this->id).'"><i class="fa-regular fa-pen-to-square edit-ico" title="Edit"></i></a> ';
        return $editAction;
    }

}
