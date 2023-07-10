<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailTemplate extends Model
{
    use HasFactory;
    use HasFactory;
    protected $table = "email_templates";

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
        'name',
        'type',
        'subject',
        'template',
        'status'
    ];

    public function getActionAttribute(): string
    {
     
       
            $editAction = '<a href="' . route('templatemanager.edit', $this->id) . '"><i class="fa-regular fa-pen-to-square edit-ico" title="Edit"></i></a> ';
        

        return $editAction;
    }
}
