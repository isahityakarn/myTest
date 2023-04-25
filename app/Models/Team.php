<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;
    protected $fillable = [
        'team_name',
        'group_id'
    ];
    public function group()
    {
        return $this->belongsTo(Group::class);
    }
    public function setTeamNameAttribute($value)
    {
        $this->attributes['team_name'] = ucwords($value);
    }
}
