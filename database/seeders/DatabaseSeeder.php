<?php

namespace Database\Seeders;

use App\Models\Declaration;
use App\Models\Family;
use App\Models\Person;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(10)->create();
        DB::table('users')->insert([
            'name' => 'Admin',
            'username' => 'admin',
            'password' => Hash::make('1'),
        ]);
        Person::factory(200)->create();
        Family::factory(80)->create();
        Declaration::factory(200)->create();
    }
}
