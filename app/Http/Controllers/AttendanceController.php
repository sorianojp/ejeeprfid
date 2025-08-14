<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Attendance;

class AttendanceController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'rfid' => 'required|string|exists:students,rfid',
        ], [
            'rfid.exists' => 'Invalid RFID!',
        ]);
        $student = Student::where('rfid', $request->rfid)->first();

        if ($student) {
            Attendance::create([
                'student_id' => $student->id,
                'rfid' => $request->rfid
            ]);
        }
        return redirect()->back()->with('status', 'You may Enter the Bus, '.'<span class="uppercase font-bold">'. $student->full_name .'</span>'.'!');
    }
}
