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
    protected $customuser;
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function _construct()
    {
        $role = Auth::user()->role;
        if($role == 2) {
            $teacher = DB::Table('teachers')
                                ->where('customuser_id' ,'=', Auth::id())
                                ->get();
            $this->customuser = $teacher[0];
        }
        if($role == 3) {
            $student = DB::Table('students')
                                ->where('customuser_id' ,'=', Auth::id())
                                ->get();
            $this->customuser = $student[0];
        }

        return $this->customuser;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
           // return Auth::logout();
        $this->customuser = $this->_construct();
        $role = Auth::user()->role;
        if($role == 2) {
            $subjects = DB::Table('subjects')
                                ->where('teacher_id', '=', $this->customuser->id)
                                ->get();
            foreach ($subjects as $value) {
                $subject_id [] = $value->id;
            }
        }
        if($role == 3) {
            $class_id = DB::Table('students')
                                ->where('customuser_id', '=', $this->customuser->id)
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
        // dd($customuser);
        return view('home', [
            'customuser' => $this->customuser,
            'subjects' => $subjects,
            'teaching_new' => $teaching_new,
            'teaching_subject' =>$teaching_subject
        ]);
    }
}
