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
<<<<<<< HEAD
        // $this->call(UsersTableSeeder::class);
=======
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
>>>>>>> e449ebf53097cf9ae969ccee9a4aebd9bd6cb5b4
    }
}
