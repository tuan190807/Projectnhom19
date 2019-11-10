<?php

use Illuminate\Database\Seeder;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('teachers')->insert([
            "customuser_id" => "2",
            "fullname" => "Dao Ngoc Ky",
            "birthday" => "1998-09-10",
            "faculty_id" => "1",
            "address" => "Lang Thanh - Yen Thanh - Nghe An",
            "email" => "ngockya98@gmail.com",
            "subject_id" => "1",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
    }
}
