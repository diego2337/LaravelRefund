<?php

declare(strict_types=1);

namespace Database\Seeds;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddUsersSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        DB::table('user')->insert([
            ['name' => 'Nome 1', 'jobRole' => 'Desenvolvedor', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Nome 2', 'jobRole' => 'UX/UI', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Nome 3', 'jobRole' => 'Product Owner', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]
        ]);
    }
}
