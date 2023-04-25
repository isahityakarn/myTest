<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;
    protected $fillable = [
        'group_name'
    ];
    public function setGroupNameAttribute($value)
    {
        $this->attributes['group_name'] = ucwords($value);
    }
    public function team()
    {
        return $this->hasOne(Team::class);
    }
}
