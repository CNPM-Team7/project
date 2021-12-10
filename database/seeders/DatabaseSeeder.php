<?php

namespace Database\Seeders;

use App\Models\Declaration;
use App\Models\Family;
use App\Models\Person;
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
        User::factory(10)->create();
        Person::factory(50)->create();
        Family::factory(20)->create();
//        Declaration::factory(10)->create();


    }
}
