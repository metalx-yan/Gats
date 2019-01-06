<?php

use Illuminate\Database\Seeder;
use App\Models\TypeRoom;

class TypeRoomTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $type = [
        	'Praktek', 'Teori'
        ];

        foreach ($type as $types) {
	        TypeRoom::create([
	        	'name' => $types,
                'slug' => str_slug($types)
	        ]);
        }
    }
}
