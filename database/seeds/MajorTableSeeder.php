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

            $major = ['geomatika dan geospasial'];

            foreach ($major as $value) {
                for ($i=1; $i <= 2; $i++) { 
                    Major::create([
                        'code' => str_random(5),
                        'name' => $value,
                        'level_id' => $i
                    ]);
                }
            }

            $major = ['konstruksi dan properti'];

            foreach ($major as $value) {
                for ($i=1; $i <= 2; $i++) { 
                    Major::create([
                        'code' => str_random(5),
                        'name' => $value,
                        'level_id' => $i
                    ]);
                }
            }

            $major = ['ketenagalistrikan'];

            foreach ($major as $value) {
                for ($i=1; $i <= 3; $i++) { 
                    Major::create([
                        'code' => str_random(5),
                        'name' => $value,
                        'level_id' => $i
                    ]);
                }
            }

            $major = ['mesin'];

            foreach ($major as $value) {
                for ($i=1; $i <= 3; $i++) { 
                    Major::create([
                        'code' => str_random(5),
                        'name' => $value,
                        'level_id' => $i
                    ]);
                }
            }

            $major = ['komputer dan informatika'];

            foreach ($major as $value) {
                for ($i=1; $i <= 3; $i++) { 
                    Major::create([
                        'code' => str_random(5),
                        'name' => $value,
                        'level_id' => $i
                    ]);
                }
            }

            $major = ['survei dan pemetaan'];

            foreach ($major as $value) {
                for ($i=3; $i <= 3; $i++) { 
                    Major::create([
                        'code' => str_random(5),
                        'name' => $value,
                        'level_id' => $i
                    ]);
                }
            }

            $major = ['bangunan'];

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
