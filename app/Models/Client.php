<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Client extends Model
{
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
        'company_name',
        'address_one',
        'address_tow',
        'town',
        'country',
        'post_code',
        'notes',
    ];

    public function contacts():HasMany
    {
        return $this->hasMany(ClientContact::class,'client_id','id');
    }
    public function getActionAttribute(): string
    {
        $editAction = '<a href="'. route('client.edit', $this->id).'"><i class="fa-regular fa-pen-to-square edit-ico" title="Edit"></i></a> ';
        $viewAction = '<a href="'. route('client.edit', $this->id).'"><i class="fa-solid fa-eye" title="View"></i></a> ';
        //$deleteAction = '<a href="'. route('client.edit', $this->id).'" onclick="myFunction()" class="remove" title="Remove"><i class="fa-sharp fa-solid fa-xmark" title="Remove"></i></a>';
        $deleteAction = '<a href="'.route('client.destroy', $this).'" class="delete_action" data-method="delete"><i class="fa-sharp fa-solid fa-xmark" title="Remove"></i></a>';
        return $editAction.''.$viewAction.''.$deleteAction;
    }
    
}
