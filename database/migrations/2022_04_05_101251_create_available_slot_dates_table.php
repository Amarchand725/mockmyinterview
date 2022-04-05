<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAvailableSlotDatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('available_slot_dates', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('interviewer_id');
            $table->string('hr_type')->nullable();
            $table->string('technical_type')->nullable();
            $table->date('start_date');
            $table->date('end_date');
            $table->boolean('status')->default(0);
            $table->string('deleted_at')->nullable();
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
        Schema::dropIfExists('available_slot_dates');
    }
}
