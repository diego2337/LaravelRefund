<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddRefundsSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('refunds')->insert([
            ['type' => 'fuel', 'description' => 'Reembolso de combustível', 'value' => 123.45],
            ['type' => 'food', 'description' => 'Reembolso de almoço', 'value' => 27.4],
            ['type' => 'fuel', 'description' => 'Reembolso de combustível', 'value' => 70.37],
        ]);
    }
}
