<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            ClassSeeder::class,
            CustomuserSeeder::class,
            FacultySeeder::class,
            SpecializedClassSeeder::class,
            StudentSeeder::class,
            SubjectSeeder::class,
            TeacherSeeder::class,
            TeachingContentSeeder::class,
            SubjectClassSeeder::class
            ]);
    }
}
