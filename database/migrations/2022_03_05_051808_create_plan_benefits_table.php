<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanBenefitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plan_benefits', function (Blueprint $table) {
            $table->id();
            $table->foreignId("plan_id")->constrained("plans");
            $table->foreignId("currency_id")->on("currencies")->nullOnDelete()->index()->nullable();
            $table->string('title');
            $table->smallInteger('duration')->nullable();
            $table->text('description')->nullable();
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
        Schema::dropIfExists('plan_benefits');
    }
}
