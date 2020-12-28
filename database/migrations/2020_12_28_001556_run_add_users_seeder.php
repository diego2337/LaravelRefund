<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Database\Seeds\AddUsersSeeder;

class RunAddUsersSeeder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        $addUsersSeeder = new AddUsersSeeder();
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
