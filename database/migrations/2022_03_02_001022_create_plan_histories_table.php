<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plan_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('plan_id')->constrained('plans')->nullable();
            $table->foreignId('user_id')->constrained('users')->nullable();
            $table->foreignId('currency_id')->constrained('currencies')->nullable();
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plan_histories');
    }
}
