<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdvantageMocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advantage_mocks', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('created_by');
            $table->string('title');
            $table->string('slug');
            $table->text('description')->nullable();
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
        Schema::dropIfExists('advantage_mocks');
    }
}
