<?php

use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subjects')->insert([
            "subjectname" => "Phat trien phan mem huong dich vu",
            "code" => "KTPM-PTPMHDV01",
            "teacher_id" => "1",
            "classroom" => "806-A10",
            "oder_of_lesson" => "3-6",
        ]);
    }
}
