<?php

declare(strict_types=1);

namespace Database\Seeds;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddRefundsSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        DB::table('refund')->insert([
            ['type' => 'fuel', 'description' => 'Reembolso de combustível', 'value' => 123.45, 'userId' => 2],
            ['type' => 'food', 'description' => 'Reembolso de almoço', 'value' => 27.4, 'userId' => 1],
            ['type' => 'fuel', 'description' => 'Reembolso de combustível', 'value' => 70.37, 'userId' => 3],
        ]);
    }
}
