<?php

use Illuminate\Database\Seeder;
use App\Models\Major;
use App\Models\Level;

class MajorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

            $major = ['otomotif'];

            foreach ($major as $value) {
                for ($i=1; $i <= 2; $i++) { 
                    Major::create([
                        'code' => str_random(5),
                        'name' => $value,
                        'level_id' => $i
                    ]);
                }
            }

            $major = ['agribisnis tanaman'];

            foreach ($major as $value) {
                for ($i=1; $i <= 2; $i++) { 
                    Major::create([
                        'code' => str_random(5),
                        'name' => $value,
                        'level_id' => $i
                    ]);
                }
            }

            $major = ['agribisnis pengolahan hasil pertanian'];

            foreach ($major as $value) {
                for ($i=1; $i <= 3; $i++) { 
                    Major::create([
                        'code' => str_random(5),
                        'name' => $value,
                        'level_id' => $i
                    ]);
                }
            }

            $major = ['agribisnis ternak'];

            foreach ($major as $value) {
                for ($i=1; $i <= 3; $i++) { 
                    Major::create([
                        'code' => str_random(5),
                        'name' => $value,
                        'level_id' => $i
                    ]);
                }
            }

            $major = ['kimia'];

            foreach ($major as $value) {
                for ($i=1; $i <= 3; $i++) { 
                    Major::create([
                        'code' => str_random(5),
                        'name' => $value,
                        'level_id' => $i
                    ]);
                }
            }

            $major = ['perikanan'];

            foreach ($major as $value) {
                for ($i=3; $i <= 3; $i++) { 
                    Major::create([
                        'code' => str_random(5),
                        'name' => $value,
                        'level_id' => $i
                    ]);
                }
            }

        


    }
}
