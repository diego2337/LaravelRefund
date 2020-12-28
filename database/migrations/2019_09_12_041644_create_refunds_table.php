<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRefundsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        if (!Schema::hasTable('refunds')) {
            Schema::create('refunds', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('type');
                $table->string('description');
                $table->float('value');
                $table->unsignedBigInteger('userId');
                $table->timestamps();
                /** Constraints */
                $table->foreign('userId')->references('id')->on('usuarios')->onDelete('cascade');
                $table->softDeletes();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('refunds');
    }
}
