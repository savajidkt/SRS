<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Questions extends Model
{
    use HasFactory;
     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'question',
    ];

    public function getActionAttribute(): string
    {
        $editAction = '<a href="'. route('questions.edit', $this->id).'"><i class="fa-regular fa-pen-to-square edit-ico" title="Edit"></i></a> ';
        return $editAction;
    }

}
