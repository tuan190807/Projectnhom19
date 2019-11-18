<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Student;
use App\Teacher;
use App\Faculty;
use App\Classes;

class CustomUserController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

    public function getUser()
    {
        $role = Auth::user()->role;
        if($role == 2) {
            $teacher = DB::Table('teachers')
                                ->where('customuser_id' ,'=', Auth::id())
                                ->get();
            $customuser = $teacher[0];
            $faculty = Faculty::find($customuser->faculty_id);
        }
        if($role == 3) {
            $student = DB::Table('students')
                                ->where('customuser_id' ,'=', Auth::id())
                                ->get();
            $customuser = $student[0];
            $class = Classes::find($customuser->class_id);
            $faculty = Faculty::find(Specialized_class::find($class->specialized_class)->faculty_id);
        }
        return $customuser;
    }

    public function index()
    {
        $role = Auth::user()->role;
    	$customuser = $this->getUser();
        if($role == 2) {
            $faculty = Faculty::find($customuser->faculty_id);
            $class = null;
        }

        if($role == 3) {
            $class = Classes::find($customuser->class_id);
            $faculty = Faculty::find(Specialized_class::find($class->specialized_class)->faculty_id);
        }
        return view('user.index', [
            'role' => $role,
            'customuser' => $customuser,
            'faculty' => $faculty,
            'class' => $class
        ]);
    }
}
