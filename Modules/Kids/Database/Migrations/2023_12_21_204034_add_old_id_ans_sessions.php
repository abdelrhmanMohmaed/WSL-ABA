<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddOldIdAnsSessions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ans_sessions', function (Blueprint $table) {
            $table->unsignedBigInteger('ans_old_id')->nullable();
            $table->foreign('ans_old_id')->references('id')->on('appales_quests')->onDelete('cascade');
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
