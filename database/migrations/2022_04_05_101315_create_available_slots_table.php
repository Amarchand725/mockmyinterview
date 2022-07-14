<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAvailableSlotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('available_slots', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('interviewer_id');
            $table->date('date');
            $table->dateTime('slot');
            $table->time('duration')->default('00:30:00');
            $table->integer('status')->default(0)->comment('0=pending, 2=confirmed, 3=rejected, 1=completed');
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
        Schema::dropIfExists('available_slots');
    }
}
