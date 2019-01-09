<?php

use Illuminate\Database\Seeder;
use App\Models\TypeLesson;

class TypeLessonTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $type = [
        	'jurusan', 'umum'
        ];

        foreach ($type as $types) {
        	TypeLesson::create([
        		'name' => $types,
                'slug' => str_slug($types)
        	]);
        }
    }
}
