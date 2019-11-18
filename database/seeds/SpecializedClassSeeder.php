<?php

use Illuminate\Database\Seeder;

class SpecializedClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('specialized_class')->insert([
            "name" => "Ky Thuat Phan Mem",
            "faculty_id" => "1",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('specialized_class')->insert([
            "name" => "Khoa Hoc May Tinh",
            "faculty_id" => "1",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('specialized_class')->insert([
            "name" => "Co Dien tu",
            "faculty_id" => "2",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('specialized_class')->insert([
            "name" => "Dien Lanh",
            "faculty_id" => "2",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('specialized_class')->insert([
            "name" => "Du Lich",
            "faculty_id" => "3",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('specialized_class')->insert([
            "name" => "O To",
            "faculty_id" => "4",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
    }
}
