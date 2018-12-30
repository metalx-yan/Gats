<?php

use Illuminate\Database\Seeder;
use App\Models\Level;

class LevelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $levels = [
        	'X',
        	'XI',
        	'XII'
        ];

        foreach ($levels as $level) {
        	Level::create([
        		'class' => $level
        	]);
        }
    }
}
