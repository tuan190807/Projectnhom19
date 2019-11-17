<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Teaching;
use App\Teacher;
use App\Subject;
use App\Faculty;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

class TeachingController extends Controller
{
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

    public function getAllByCustomer()
	{
		$this->customuser = $this->_construct();
		$role = Auth::user()->role;
        if($role == 2) {
            $teachings = DB::Table('teaching_content')
                                ->where('teacher_id', '=', $this->customuser->id)
                                ->get();
            foreach ($teachings as $values) {
            	  $values->teacher_id = Teacher::find($values->teacher_id)->fullname;
	        }
                        		// dd($teachings);
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
	        foreach ($subject_id as $value) {
	            $teaching [] = DB::Table('teaching_content')
	                                ->where('subject_id', '=', $subject_id)
	                                ->latest()
	                                ->first()
	                                ->subject_id;
	        }
	        foreach ($teaching as $value) {
	            $teachings [] = DB::Table('teaching_content')
	                                 ->where('subject_id', $value)
	                                 ->get();
	        }
	        foreach ($teachings as $values) {
	            foreach ($values as $value) {
	                $value->teacher_id = Teacher::find($value->teacher_id)->fullname;
	            }
	        }
	        $teachings = $teachings[0];
        }

        return view('teaching.viewall', [
        	'customuser' => $this->customuser,
        	'teachings' => $teachings
        ]);
	}

	public function create()
	{
		$this->customuser = $this->_construct();

		$teacher = DB::Table('teachers')
                                ->where('customuser_id' ,'=', Auth::id())
                                ->get()[0];
		$subjects;
		foreach (Subject::where('teacher_id', $teacher->id)->get() as $subject) {
			$subjects [] = $subject;
		}

		$substitute_teacher;
		foreach (Teacher::where('id', '!=' ,$teacher->id)->get() as $teacher) {
			$substitute_teacher [] = $teacher;
		}
		return view('teaching.create', [
			'customuser' =>$this->customuser,
			'subjects' => $subjects,
			'substitute_teacher' => $substitute_teacher
		]);
	}

	public function store(Request $request)
	{
		$teacher = DB::Table('teachers')
                                ->where('customuser_id' ,'=', Auth::id())
                                ->get()[0];
		// Validate form
		$validator = Validator::make($request->all(), [
			'lecture_name' => 'required|max:191',
			'lesson_number' => 'required|Integer',
			'date' => 'required|date',
			'files_content' => 'required|max:102400',
			'note' => 'required'
		]);
		if ($validator->fails()) {
			return redirect('teaching-create')
			->withErrors($validator)
			->withInput();
		} else {
			$teaching = new Teaching();
			$teaching->subject_id = $request->subject;
			$teaching->teacher_id = Teacher::find(Auth::id())->id;
			$teaching->lecture_name = $request->lecture_name;
			$teaching->lesson_number = $request->lesson_number;
			// handle file
			$files_content = $request->files_content;

			if($filename = Storage::putFileAs('public/teaching/' . $teacher->id, $files_content, $files_content->getClientOriginalName())) {
				$teaching->file_content = $filename;
				$teaching->date = $request->date;
				$teaching->note = $request->note;
				$teaching->substitute_teacher = $request->substitute_teacher;
				// save teaching content
				if($teaching->save()) {
				Session::flash('status', 'Tạo bài giảng mới thành công !');
				} else {
					Session::flash('status', 'Xảy ra lỗi khi tạo bài giảng, vui lòng thử lại !');
				}
				return redirect()->route('teaching-manage');
			}
		}
	}

	public function edit(Request $request)
	{	
		$this->customuser = $this->_construct();
		$teacher = DB::Table('teachers')
                                ->where('customuser_id' ,'=', Auth::id())
                                ->get()[0];
		$teaching = Teaching::find($request->id);
		if($teaching->teacher_id != $teacher->id){
			abort(404);
		} else {
			$subjects;
			foreach (Subject::where('teacher_id', $teacher->id)->get() as $subject) {
				$subjects [] = $subject;
			}
			$substitute_teacher;
			foreach (Teacher::where('id', '!=' ,$teacher->id)->get() as $teachers) {
				$substitute_teacher [] = $teachers;
			}
			$teaching->file_content = str_replace('public/teaching/' . $teacher->id . '/', '', $teaching->file_content);
			return view('teaching.edit', [
				'customuser' =>$this->customuser,
				'subjects' => $subjects,
				'substitute_teacher' => $substitute_teacher,
				'teaching' => $teaching
			]);
		}
		
	}

	public function update(Request $request)
	{
		$teacher = DB::Table('teachers')
                                ->where('customuser_id' ,'=', Auth::id())
                                ->get()[0];
		// Validate form update
		$validator = Validator::make($request->all(), [
			'lecture_name' => 'required|max:191',
			'lesson_number' => 'required|Integer',
			'date' => 'required|date',
			'files_content' => 'max:102400',
			'note' => 'required'
		]);
		if ($validator->fails()) {
			return redirect('teaching-update')
			->withErrors($validator)
			->withInput();
		} else {
			$teaching = Teaching::find($request->id);
			$teaching->subject_id = $request->subject;
			$teaching->lecture_name = $request->lecture_name;
			$teaching->lesson_number = $request->lesson_number;
			if($request->hasFile('files_content')) {
				$teaching->file_content = str_replace('public/teaching/' . $teacher->id . '/', '', $teaching->file_content);
				if(unlink(storage_path('app/public/teaching/' . $teacher->id . '/' . $teaching->file_content))) {
					$files_content = $request->files_content;
					if($filename = Storage::putFileAs('public/teaching/' . $teacher->id, $files_content, $files_content->getClientOriginalName())) {
						$teaching->file_content = $filename;
					} else {
						abort(404);
					}
				} else {
					abort(404);
				}	
			}
			$teaching->date = $request->date;
			$teaching->note = $request->note;
			$teaching->substitute_teacher = $request->substitute_teacher;
			if($teaching->update()) {
				Session::flash('status', 'Cập nhật bài giảng thành công !');
			} else {
				Session::flash('status', 'Xảy ra lỗi khi cập nhật bài giảng, vui lòng thử lại !');
			}
			return redirect()->route('teaching-manage');
		}
	}

	public function getByTeacherId(Request $request)
	{
		$this->customuser = $this->_construct();
		$teacher = DB::Table('teachers')
                                ->where('customuser_id' ,'=', Auth::id())
                                ->get()[0];
		$khoa = Faculty::find($teacher->faculty_id);
		$teaching = Teaching::where('teacher_id', $teacher->id)->paginate(20);
		$stt = 0;
		foreach ($teaching as $teach) {
			$stt += 1;
			$teach['stt'] = $stt;
			$teach->subject_id = Subject::find($teach->subject_id)->subjectname;
			$teach->substitute_teacher = $teach->substitute_teacher != 0 ? Teacher::find($teach->substitute_teacher)['fullname'] : "Không";
			$teach->file_content = str_replace('public/teaching/' . $teacher->id . '/', '', $teach->file_content);
			// $teaching [] = $teach;
		}
		return view('teaching.manager.manage', [
			'customuser' =>$this->customuser,
			'teacher' => $teacher,
			'khoa' => $khoa,
			'teaching' => $teaching
		]);
	}

	public function delete(Request $request)
	{
		$teacher = DB::Table('teachers')
                                ->where('customuser_id' ,'=', Auth::id())
                                ->get()[0];
		$teaching = Teaching::find($request->id);
		if($teaching->teacher_id == Auth::id()){
			$teaching->file_content = str_replace('public/teaching/' . $teacher->id . '/', '', $teaching->file_content);
			if(unlink(storage_path('app/public/teaching/' . $teacher->id . '/' . $teaching->file_content))) {
				$teaching->delete();
				Session::flash('status', 'Xóa thành công !');
				return redirect()->route('teaching-manage');
			}
		} else {
			abort(404);
		}
	}

	public function view(Request $request)
	{
		$this->customuser = $this->_construct();
		$teacher = DB::Table('teachers')
                                ->where('customuser_id' ,'=', Auth::id())
                                ->get()[0];
		$teaching = Teaching::find($request->id);
		$subject = Subject::find($teaching->subject_id);
		$teaching->file_content = str_replace('public/teaching/', '', $teaching->file_content);
		$file_type = explode(".", $teaching->file_content);
		$file_type = $file_type[1];
		$teaching->teacher_id = Teacher::find($teaching->teacher_id)['fullname'];
		//$teaching->file_content = Storage::disk('public')->get($teaching->file_content);
		$teaching_relate = Teaching::where(
			[
				['subject_id' , '=', $teaching->subject_id],
				['id' , '!=' , $teaching->id]

			])
		->orderBy('date', 'desc')
		->get();
		foreach ($teaching_relate as $teach) {
			$teach->teacher_id = Teacher::find($teach->teacher_id)->fullname;
			if($teach->substitute_teacher != 0) {
				$teach->teacher_id = Teacher::find($teach->substitute_teacher)['fullname'];
			}
		}
		return view('teaching.view', [
			'customuser' =>$this->customuser,
			'subject' => $subject,
			'teaching' => $teaching,
			'teaching_relate' => $teaching_relate,
			'file_type' => $file_type
		]);
	}

	public function forgetSession($key)
	{
		Session::forget('$key');
		return true;
	}

}
