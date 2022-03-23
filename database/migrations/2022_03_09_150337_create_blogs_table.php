<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('created_by');
            $table->bigInteger('category_id');
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('post')->nullable();
            $table->boolean('status')->default(1);
            $table->string("meta_title")->nullable();
            $table->string("meta_keyword")->nullable();
            $table->string("meta_description")->nullable();
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
        Schema::dropIfExists('blogs');
    }
}
