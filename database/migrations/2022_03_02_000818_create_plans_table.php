<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plans', function (Blueprint $table) {
            $table->id();
            $table->foreignId("currency_id")->constrained("currencies");
            $table->foreignId("logo_id")->on("files")->nullOnDelete()->index()->nullable();
            $table->string('name');
            $table->text('description')->nullable();
            $table->double('price' , 12 , 2);
            $table->smallInteger('duration')->nullable();  //in days
            $table->string('status');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plans');
    }
}
