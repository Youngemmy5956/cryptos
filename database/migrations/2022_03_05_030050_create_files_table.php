<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id")->on("users")->nullOnDelete()->index()->nullable();
            $table->string("file_group");
            $table->string("mime_type")->nullable();
            $table->string("path")->nullable();
            $table->string("driver")->default("local")->nullable();
            $table->string("width")->nullable();
            $table->string("height")->nullable();
            $table->string("length")->nullable();
            $table->string("size")->nullable();
            $table->string("formatted_size")->nullable();
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
        Schema::dropIfExists('files');
    }
}
