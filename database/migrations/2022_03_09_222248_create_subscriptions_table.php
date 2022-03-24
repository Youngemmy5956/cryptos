<?php

use App\Constants\StatusConstants;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->index()->on("users");
            $table->foreignId('plan_id')->constrained("plans");
            $table->foreignId("currency_id")->constrained("currencies");
            $table->double('price' , 12 , 2);
            $table->dateTime('paid_on')->nullable();
            $table->dateTime('expires_at')->nullable();
            $table->string('status')->default(StatusConstants::PENDING);
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
        Schema::dropIfExists('subscriptions');
    }
}
