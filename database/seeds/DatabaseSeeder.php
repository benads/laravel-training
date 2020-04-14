<?php

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker\Generator $faker)
    {
        for ($i = 1; $i <= 9; $i++) {
            DB::table('groups')->insert([
                'name' => "Groupe $i"
            ]);
            for ($j = 1; $j <= 9; $j++) {
                DB::table('users')->insert([
                    'name' => "User{$j}Groupe{$i}",
                    'email' => "User{$j}Groupe{$i}@dev.com",
                    'password' => Hash::make(123456),
                    'group_id' => $i
                ]);
            }
        }
        $users = User::all();
        $users_count = count($users->pluck('id')->toArray());
        for ($k = 1; $k < $users_count; $k++) {
            DB::table('profiles')->insert([
                'github_url' => "http://github/$k",
                'website_url' => "http://my-website/$k",
                'user_id' => $k
            ]);
        }
    }
}
