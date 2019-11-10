<?php

use Illuminate\Database\Seeder;

class TeachingContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('teaching_content')->insert([
            "subject_id" => "1",
            "teacher_id" => "1",
            "lecture_name" => "Bai 1",
            "lesson_number" => "2",
            "file_content" => "public/teaching/1/dich-dam-bao.docx",
            "date" => "2019-09-11",
            "note" => "<p>Nothing</p>",
            "substitute_teacher" => "2"
        ]);
        DB::table('teaching_content')->insert([
            "subject_id" => "1",
            "teacher_id" => "1",
            "lecture_name" => "Bai 2",
            "lesson_number" => "2",
            "file_content" => "public/teaching/1/1.docx",
            "date" => "2019-09-11",
            "note" => "<p>Nothing</p>",
            "substitute_teacher" => "2"
        ]);
        DB::table('teaching_content')->insert([
            "subject_id" => "1",
            "teacher_id" => "1",
            "lecture_name" => "Bai 3",
            "lesson_number" => "3",
            "file_content" => "public/teaching/1/dich-dam-bao.docx",
            "date" => "2019-10-18",
            "note" => "<p>Nothing</p>",
            "substitute_teacher" => "0"
        ]);
        DB::table('teaching_content')->insert([
            "subject_id" => "1",
            "teacher_id" => "1",
            "lecture_name" => "Kien Truc Magebto Nang Cao",
            "lesson_number" => "2",
            "file_content" => "public/teaching/1/Kien Truc Magento nang Cao.docx",
            "date" => "2019-10-17", 
            "note" => "<p>No</p>",
            "substitute_teacher" => "2"
        ]);
    }
}
