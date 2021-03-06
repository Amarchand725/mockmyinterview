<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookInterviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_interviews', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('meeting_id');
            $table->bigInteger('interviewer_id');
            $table->bigInteger('candidate_id');
            $table->bigInteger('parent_interview_type_id');
            $table->bigInteger('child_interview_type_id');
            $table->string('booking_type_slug');
            $table->float('credits');
            
            $table->date('date');
            $table->string('slot');
            $table->dateTime('start_at');
            $table->integer('duration')->comment('minutes');
            $table->string('password')->comment('metting password');
            $table->text('start_url');
            $table->text('join_url');
            $table->string('review')->nullable();
            $table->integer('status')->default(0)->comment('0=pending, 1=confirmed, 3=rejected, 4=completed');
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
        Schema::dropIfExists('book_interviews');
    }
}
