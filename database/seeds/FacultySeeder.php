<?php

use Illuminate\Database\Seeder;

class FacultySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('facultys')->insert([
            "name" => "Cong Nghe Thong Tin"
        ]);
        DB::table('facultys')->insert([
            "name" => "Dien Tu"
        ]);
        DB::table('facultys')->insert([
            "name" => "Du Lich"
        ]);
        DB::table('facultys')->insert([
            "name" => "O To"
        ]);
    }
}
