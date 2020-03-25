<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i <= 9; $i++) {
            DB::table('groups')->insert([
                'name' => "Groupe $i"
            ]);
            for($j = 1; $j <=9; $j++) {
                DB::table('users')->insert([
                    'name' => "User{$j}Groupe{$i}",
                    'email' => "User{$j}Groupe{$i}@dev.com",
                    'password' => Hash::make(123456),
                    'group_id' => $i
                ]);
            }
        }
    }
}
