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
        $this->call(RoleTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(TypeTeacherTableSeeder::class);
        $this->call(TypeLessonTableSeeder::class);
        $this->call(TypeRoomTableSeeder::class);
        $this->call(LevelTableSeeder::class);
        $this->call(MajorTableSeeder::class);
    }
}
