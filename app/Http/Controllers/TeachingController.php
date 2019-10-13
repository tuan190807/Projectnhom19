<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Teaching;
use App\Teacher;
use App\Subject;
use App\Khoa;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

class TeachingController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

	public function create()
	{
		$teacher = Teacher::find(Auth::id());
		$subjects;
		foreach (Subject::where('teacher_id', $teacher['id'])->get() as $subject) {
			$subjects [] = $subject;
		}

		$substitute_teacher;
		foreach (Teacher::where('id', '!=' ,$teacher['id'])->get() as $teacher) {
			$substitute_teacher [] = $teacher;
		}
		return view('teaching.create', [
			'subjects' => $subjects,
			'substitute_teacher' => $substitute_teacher
		]);
	}

	public function store(Request $request)
	{
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
			if($filename = $files_content->storeAs('teaching', $files_content->getClientOriginalName())) {
				$teaching->file_content = $filename;
				$teaching->date = $request->date;
				$teaching->note = $request->note;
				$teaching->substitute_teacher = $request->substitute_teacher;
				$teaching->save();
				return redirect()->route('teaching-manage');
			}
		}
	}

	public function edit(Request $request)
	{
		$teacher = Teacher::find(Auth::id());
		$teaching = Teaching::find($request->id);
		if($teaching->teacher_id != Auth::id()){
			abort(404);
		} else {
			$subjects;
			foreach (Subject::where('teacher_id', $teacher['id'])->get() as $subject) {
				$subjects [] = $subject;
			}
			$substitute_teacher;
			foreach (Teacher::where('id', '!=' ,$teacher['id'])->get() as $teacher) {
				$substitute_teacher [] = $teacher;
			}
			$teaching->file_content = str_replace('teaching/', '', $teaching->file_content);
			return view('teaching.edit', [
				'subjects' => $subjects,
				'substitute_teacher' => $substitute_teacher,
				'teaching' => $teaching
			]);
		}
		
	}

	public function update(Request $request)
	{
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
				$teaching->file_content = str_replace('teaching/', '', $teaching->file_content);
				if(Storage::disk('teaching')->delete($teaching->file_content)) {
					$files_content = $request->files_content;
					if($filename = $files_content->storeAs('teaching', $files_content->getClientOriginalName())) {
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
				Session::flash('status', 'Cập nhật bài viết thành công !');
			} else {
				Session::flash('status', 'Xảy ra lỗi khi cập nhật bài giảng, vui lòng thử lại !');
			}
			return redirect()->route('teaching-manage');
		}
	}

	public function getByTeacherId(Request $request)
	{
		$teacher = Teacher::find(Auth::id());
		$khoa = Khoa::find($teacher->khoa_id);
		$teaching = Teaching::where('teacher_id', $teacher['id'])->paginate(20);
		$stt = 0;
		foreach ($teaching as $teach) {
			$stt += 1;
			$teach['stt'] = $stt;
			$teach->subject_id = Subject::find($teach->subject_id)->subjectname;
			$teach->substitute_teacher = $teach->substitute_teacher != 0 ? Teacher::find($teach->substitute_teacher)['fullname'] : "Không";
			$teach->file_content = str_replace('teaching/', '', $teach->file_content);
			// $teaching [] = $teach;
		}
		return view('teaching.manager.manage', [
			'teacher' => $teacher,
			'khoa' => $khoa,
			'teaching' => $teaching
		]);
	}

	public function delete(Request $request)
	{
		$teacher = Teacher::find(Auth::id());
		$teaching = Teaching::find($request->id);
		if($teaching->teacher_id == Auth::id()){
			$teaching->file_content = str_replace('teaching/', '', $teaching->file_content);
			if(Storage::disk('teaching')->delete($teaching->file_content)) {
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
		$teaching = Teaching::find($request->id);
		$subject = Subject::find($teaching->subject_id);
		$teaching->file_content = str_replace('teaching/', '', $teaching->file_content);
		$teaching->teacher_id = Teacher::find($teaching->teacher_id)['fullname'];
		$teaching->file_content = Storage::disk('teaching')->get($teaching->file_content);
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
			'subject' => $subject,
			'teaching' => $teaching,
			'teaching_relate' => $teaching_relate
		]);
	}
}
