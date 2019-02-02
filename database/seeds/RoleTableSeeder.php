<?php

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
        	'curriculum',
        	'major',
            'headmaster'
        ];

        foreach ($roles as $role) {
        	Role::create([
        		'name' => $role
        	]);
        }
    }
}
