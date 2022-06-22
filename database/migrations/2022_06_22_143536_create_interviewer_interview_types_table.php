<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInterviewerInterviewTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interviewer_interview_types', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('interviewer_id');
            $table->bigInteger('parent_interview_type_id');
            $table->bigInteger('child__interview_type_id');
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
        Schema::dropIfExists('interviewer_interview_types');
    }
}
