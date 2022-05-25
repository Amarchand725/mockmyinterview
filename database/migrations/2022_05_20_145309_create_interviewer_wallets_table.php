<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInterviewerWalletsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interviewer_wallets', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('interviewer_id');
            $table->bigInteger('booking_id');
            $table->bigInteger('last_balance_credits')->default(0);
            $table->float('total_credits');
            $table->boolean('status')->default(1);
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
        Schema::dropIfExists('interviewer_wallets');
    }
}
