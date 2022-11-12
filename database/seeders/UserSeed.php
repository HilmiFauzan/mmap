<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i <= 5; $i++) { 
            DB::table('users')->insert([
                'name' => Str::random(5),
                'name_end' => Str::random(5),
                'email' => Str::random(10).'@gmail.com',
                'password' => Hash::make('secret'),
                'file' => 'storage/'.Str::random(10),
                'hak_akses' => Str::random(10)
            ]);
        }
    }
}
