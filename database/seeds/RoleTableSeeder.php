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
        if(!Role::whereName('Admin')->exists())
        Role::create([
            'name' => 'Admin',
        ]);

        if(!Role::whereName('Utilisateur')->exists())
        Role::create([
            'name' => 'Utilisateur',
        ]);
    }
}
