<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookedSlotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booked_slots', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('interviewer_id');
            $table->bigInteger('candidate_id');
            $table->string('booking_type_slug');
            $table->string('interview_type');
            $table->date('date');
            $table->string('slot');
            $table->boolean('status')->default(0)->comment('0=booked, 1=confirmed');
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
        Schema::dropIfExists('booked_slots');
    }
}
