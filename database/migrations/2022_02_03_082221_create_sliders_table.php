<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sliders', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("created_by");
            $table->string("left_sec_title")->nullable();
            $table->string("left_sec_sub_description")->nullable();
            $table->text("left_sec_description")->nullable();
            $table->string("left_sec_image")->nullable();
            $table->string("right_sect_title")->nullable();
            $table->string("right_sec_description")->nullable();
            $table->string("right_sec_left_btn_lbl")->nullable();
            $table->string("right_sec_right_btn_lbl")->nullable();
            $table->string("right_sec_video_link")->nullable();
            $table->boolean("status")->default(1);
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
        Schema::dropIfExists('sliders');
    }
}
