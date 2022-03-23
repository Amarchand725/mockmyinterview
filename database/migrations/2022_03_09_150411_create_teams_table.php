<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('created_by');
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->string('slug');
            $table->string('designation')->nullable();
            $table->text('twitter_link')->nullable();
            $table->text('facebook_link')->nullable();
            $table->text('instagram_link')->nullable();
            $table->text('linkedin_link')->nullable();
            $table->string('description')->nullable();
            $table->string('image')->nullable();
            $table->boolean('status')->default(1);
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
        Schema::dropIfExists('teams');
    }
}
