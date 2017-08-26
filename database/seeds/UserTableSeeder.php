<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Comment;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();

        factory(User::class)->create([
            'email' => 'admin@gmail.com',
            'name' => 'Admin',
            'role' => 1,
            'avatar' => 'default.jpg',
            'password' => '123456',
        ]);
    }
}
