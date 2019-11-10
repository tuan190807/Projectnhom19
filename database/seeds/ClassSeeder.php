<?php

use Illuminate\Database\Seeder;

Class ClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('class')->insert([
            "name" => "Ky Thuat Phan Mem 1",
            
        ]);
        DB::table('class')->insert([
            "name" => "Ky Thuat Phan Mem 2",
           
        ]);
        DB::table('class')->insert([
            "name" => "Ky Thuat Phan Mem 3",
           
        ]);
        DB::table('class')->insert([
            "name" => "Khoa Hoc May Tinh 1",
            
        ]);
        DB::table('class')->insert([
            "name" => "Khoa Hoc May Tinh 2",
          
        ]);
        DB::table('class')->insert([
            "name" => "Co Dien Tu 1",
          
        ]);
        DB::table('class')->insert([
            "name" => "Co Dien Tu 2",
           
        ]);
        DB::table('class')->insert([
            "name" => "Dien Lanh 1",
           
        ]);
        DB::table('class')->insert([
            "name" => "Dien Lanh 2",
            
        ]);
        DB::table('class')->insert([
            "name" => "Du Lich 1",
           
        ]);
        DB::table('class')->insert([
            "name" => "O To 1",
            
        ]);
    }
}
