<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSocialmediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('socialmedia', function (Blueprint $table) {
            $table->id();
            $table->string("facebook")->nullable();
            $table->string("twitter")->nullable();
            $table->string("linkedin")->nullable();
            $table->string("googleplus")->nullable();
            $table->string("pinterest")->nullable();
            $table->string("youtube")->nullable();
            $table->string("instagram")->nullable();
            $table->string("tumblr")->nullable();
            $table->string("flickr")->nullable();
            $table->string("reddit")->nullable();
            $table->string("snapchat")->nullable();
            $table->string("whatsapp")->nullable();
            $table->string("quora")->nullable();
            $table->string("stumbleupon")->nullable();
            $table->string("delicious")->nullable();
            $table->string("digg")->nullable();
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
        Schema::dropIfExists('socialmedia');
    }
}
