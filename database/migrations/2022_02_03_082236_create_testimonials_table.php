<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestimonialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('testimonials', function (Blueprint $table) {
            $table->id();
            $table->string("name")->nullable();
            $table->string("slug")->nullable();
            $table->string("designation")->nullable();
            $table->string("image")->nullable();
            $table->string("comment")->nullable();
            $table->boolean("status")->default(1);
            $table->string("meta_title")->nullable();
            $table->string("meta_keyword")->nullable();
            $table->string("meta_description")->nullable();
            $table->string('deleted_at');
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
        Schema::dropIfExists('testimonials');
    }
}
