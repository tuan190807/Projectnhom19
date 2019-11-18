<?php

use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('students')->insert([
            "customuser_id" => "3",
            "fullname" => "Hoang Hong Truong",
            "birthday" => "1998-09-03",
            "class_id" => "5",
            "email" => "hongtruong@gmail.com",
            "address" => "Nghe An",
            "cmtnd" => "187099099",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
    }
}
