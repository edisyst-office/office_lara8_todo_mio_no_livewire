<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class StepTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Step::factory(50)->create();
    }
}
