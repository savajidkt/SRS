<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyOrganizer extends Model
{
    use HasFactory;

    use HasFactory;
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'course_id',
        'first_name',
        'last_name',
        'email',
        'confirm_attendee',
    ];
}
