<?php

use Illuminate\Database\Seeder;

class SubjectClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('classes_subject')->insert([
            "subject_id" => "1",
            "classes_id" => "1"
        ]);
    }
}
