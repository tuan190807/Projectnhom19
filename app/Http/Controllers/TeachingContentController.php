<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subject;
use App\Teacher;
use App\Classes;
class TeachingContentController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function goHome()
    {
        return view('client.app');
    }

    public function index(Request $request){
        $subjects = Subject::orderby("created_at","desc");
        $teachers = Teacher::orderby("created_at","desc")->get();
        $classes = Classes::orderby("created_at","desc")->get();
        $teacher = Teacher::limit(1)->get();
        // find
        if($request -> search){
            $subjects = $subjects->where('subjectname','like','%' .$request->search . '%');
        }
        $subjects = $subjects->paginate(5);
        return view('client.index',compact('subjects', 'teachers', 'classes'));
    }
    public function create(Request $request){
        // relationship
        $newSubject = Subject::create([
            'subjectname' => $request->subjectname,
            'classroom' => $request->classroom,
            'oder_of_lesson' => $request->oder_of_lesson,
            'teacher_id' => $request->teacher_id
        ]);

        $newSubject->classes()->attach($request->class_name);
        $newSubject->save();
        return back();
    }
    public function update(Request $request,$id){
        // relationship
        $subject = Subject::find($id);
        $subject->subjectname = $request->subjectname;
        $subject->classroom = $request->classroom;
        $subject->oder_of_lesson = $request->oder_of_lesson;
        $subject->teacher_id = $request->teacher_id;
        $subject->classes()->sync($request->class_name);
        $subject->save();
        return back();
    }
    public function destroy(Request $request,$id){
        // relationship
        $subject = Subject::find($id);
       $subject->classes()->detach();
       $subject->delete();
        return back();
    }

    
}
