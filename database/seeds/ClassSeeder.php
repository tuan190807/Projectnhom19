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
        DB::table('classes')->insert([
            "name" => "Ky Thuat Phan Mem 1",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
            
        ]);
        DB::table('classes')->insert([
            "name" => "Ky Thuat Phan Mem 2",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
           
        ]);
        DB::table('classes')->insert([
            "name" => "Ky Thuat Phan Mem 3",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
           
        ]);
        DB::table('classes')->insert([
            "name" => "Khoa Hoc May Tinh 1",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
            
        ]);
        DB::table('classes')->insert([
            "name" => "Khoa Hoc May Tinh 2",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
          
        ]);
        DB::table('classes')->insert([
            "name" => "Co Dien Tu 1",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
          
        ]);
        DB::table('classes')->insert([
            "name" => "Co Dien Tu 2",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
           
        ]);
        DB::table('classes')->insert([
            "name" => "Dien Lanh 1",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
           
        ]);
        DB::table('classes')->insert([
            "name" => "Dien Lanh 2",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
            
        ]);
        DB::table('classes')->insert([
            "name" => "Du Lich 1",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
           
        ]);
        DB::table('classes')->insert([
            "name" => "O To 1",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
            
        ]);
    }
}
