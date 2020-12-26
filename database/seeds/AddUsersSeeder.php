<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddUsersSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('usuarios')->insert([
            ['name' => 'Nome 1', 'jobRole' => 'Desenvolvedor'],
            ['name' => 'Nome 2', 'jobRole' => 'UX/UI'],
            ['name' => 'Nome 3', 'jobRole' => 'Product Owner']
        ]);
    }
}
