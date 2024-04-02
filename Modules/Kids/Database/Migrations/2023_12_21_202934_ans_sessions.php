<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AnsSessions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ans_sessions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('ques_id');
            $table->foreign('ques_id')->references('id')->on('appales_nums')->onDelete('cascade');
            $table->unsignedBigInteger('ans_id')->nullable();
            $table->foreign('ans_id')->references('id')->on('appales_quests')->onDelete('cascade');
            $table->unsignedBigInteger('app_id');
            $table->foreign('app_id')->references('id')->on('app_sessions')->onDelete('cascade');
            $table->unsignedBigInteger('session_id');
            $table->foreign('session_id')->references('id')->on('user_sessions')->onDelete('cascade');
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
        //
        Schema::dropIfExists('ans_sessions');
    }
}
