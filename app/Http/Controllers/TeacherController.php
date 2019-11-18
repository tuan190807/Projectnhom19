<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Teacher;
use App\Customuser;
class TeacherController extends Controller
{
    public function index(Request $request){
        
        $teachers = Teacher::orderby("created_at","desc");
        $teacher = Teacher::limit(1)->get();
        // find
        if($request -> search){
           
            $teachers = $teachers->where('fullname','like','%' .$request->search . '%');
            
        }
        $teachers = $teachers->paginate(5);
        return view('client.manageteacher',compact('teachers'));
    }
    public function create(Request $request){
        // relationship
        // $newCustomuser = new Customuser();
        // $newCustomuser->username = $request->username;
        // $newCustomuser->password = bcrypt($request->password);
        // $newCustomuser->role = 2;
        // $newCustomuser->save();
        $newTeacher = Teacher::create([
            'fullname' => $request->fullname,
            'birthday' => $request->birthday,
            'address' => $request->address,
            'email' => $request->email,
            // 'customer_id ' => $newCustomuser->id
        ]);
        $newTeacher->save();
        return back();
    }
    public function update(Request $request,$id){
        // relationship
        $teacher = Teacher::find($id);
        $teacher->fullname = $request->fullname;
        $teacher->birthday = $request->birthday;
        $teacher->address = $request->address;
        $teacher->email = $request->email;
        $teacher->save();
        return back();
    }
    public function destroy(Request $request,$id){
        // relationship
        $teacher = Teacher::find($id);
       $teacher->delete();
        return back();
    }

}
