<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('candidate_id');
            $table->bigInteger('payment_log_id');
            $table->bigInteger('priority_id');
            $table->bigInteger('coupon_id')->nullable();
            $table->float('sub_total')->nullable();
            $table->float('discount')->nullable();
            $table->float('grand_total')->nullable();
            $table->date('date');
            $table->integer('status')->default(0)->comment('0=pending, 1=confirmed, 2=rejected');
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
        Schema::dropIfExists('payments');
    }
}
