<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['lastname', 'firstname', 'middlename', 'rfid'];

    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }
    public function getFullNameAttribute()
    {
        return "{$this->firstname} {$this->middlename} {$this->lastname}";
    }
}
