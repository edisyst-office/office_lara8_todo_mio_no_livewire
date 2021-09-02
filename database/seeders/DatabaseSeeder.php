<?php

namespace Database\Seeders;

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
        \Illuminate\Support\Facades\DB::statement('SET FOREIGN_KEY_CHECKS=0');

        \App\Models\User::truncate();
        \App\Models\Todo::truncate();
        \App\Models\Step::truncate();

        $this->call([
            UserTableSeeder::class,
            TodoTableSeeder::class,
            StepTableSeeder::class,
        ]);
    }
}
