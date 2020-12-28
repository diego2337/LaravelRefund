<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Database\Seeds\AddRefundsSeeder;

class RunAddRefundsSeeder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        $addUsersSeeder = new AddRefundsSeeder();
        $addUsersSeeder->run();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        //
    }
}
