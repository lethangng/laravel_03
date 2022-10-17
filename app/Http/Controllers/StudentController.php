<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    //Get all students
    public function get_all_student() {
        $title = 'Danh sách sinh viên';
        $students  = Student::all();

        return view('student.student_manage', compact('students', 'title'));
    }

    // Get a student
    public function get_student_by_id(Student $student) {
        $title = 'Chi tiết sinh viên';
        return view('student.student_edit', compact('student', 'title'));
    }

    // Edit student
    public function edit(Request $request, Student $student) {
        $student->update([
            'fullname' => $request->fullname,
            'birthday' => $request->birthday,
            'address' => $request->address
        ]);

        return redirect()->route('student');
    }

    // To view add new student
    public function add_student() {
        $title = 'Thêm sinh viên';
        return view('student.student_add', compact('title'));
    }

    // Handle add a student
    public function add(Request $request) {
        Student::create([
            'fullname' =>$request->fullname,
            'birthday' =>$request->birthday,
            'address' =>$request->address,
        ]);

        return redirect()->route('student');
    }

    public function delete_student(Student $student) {
        $student->delete();

        return redirect()->route('student');
    }
}
