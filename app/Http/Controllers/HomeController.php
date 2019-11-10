<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Teacher;
use App\Teaching;
use App\Subject;
use App\Student;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // return Auth::logout();
        $role = Auth::user()->role;
        if($role == 2) {
            $teacher = Teacher::find(Auth::id());
            $subjects = DB::Table('subjects')
                                ->where('teacher_id', '=', $teacher->id)
                                ->get();
            foreach ($subjects as $value) {
                $subject_id [] = $value->id;
            }
        }
        if($role == 3) {
            $class_id = DB::Table('students')
                                ->where('customuser_id', '=', Auth::id())
                                ->first()
                                ->class_id;
            $subjects = DB::Table('subjects')
                                ->where('class_id', '=', $class_id)
                                ->get();
            foreach ($subjects as $value) {
                $subject_id [] = $value->id;
            }
        }
        // load teaching new
        foreach ($subject_id as $value) {
            $teaching_new = DB::Table('teaching_content')
                                ->where('subject_id', '=', $value)
                                ->orderBy('created_at', 'desc')
                                ->take(4)
                                ->get();
        }
        foreach ($teaching_new as $value) {
            $value->teacher_id = Teacher::find($value->teacher_id)->fullname;
        }

        // load teaching by subject
        // priority subjects have new posts
        foreach ($subject_id as $value) {
            $teaching [] = DB::Table('teaching_content')
                                ->where('subject_id', '=', $subject_id)
                                ->latest()
                                ->first()
                                ->subject_id;
        }
        foreach ($teaching as $value) {
            $teaching_subject [] = DB::Table('teaching_content')
                                 ->where('subject_id', $value)
                                 ->take(4)
                                 ->get();
        }
        foreach ($teaching_subject as $values) {
            foreach ($values as $value) {
                $value->teacher_id = Teacher::find($value->teacher_id)->fullname;
            }
        }
        // dd($subjects);
        return view('home', [
            'subjects' => $subjects,
            'teaching_new' => $teaching_new,
            'teaching_subject' =>$teaching_subject
        ]);
    }
}
