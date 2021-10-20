<?php

use App\Models\Role;
use App\Models\User;
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
        $user = User::create([
            'username' => 'DaleCooper',
            'avatar' => 'no-avatar',
            'name' => 'Chris duvinage',
            'email' => 'dc@gmail.com',
            'email_verified_at' => now(),
            'password' => 'dddddddd', // password
            'remember_token' => 'jfhjkdefgj;hd',

        ]);
        $this->call(RoleTableSeeder::class);
        $role = Role::where('id', 1)->first();
        
        $user->roles()->attach($role->id);

        $this->call(CategoryTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(ArticleTableSeeder::class);
        $this->call(CommentTableSeeder::class);
    }
}
