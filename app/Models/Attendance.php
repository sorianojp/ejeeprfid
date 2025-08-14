<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $fillable = ['rfid', 'student_id'];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
