<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Goals extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('goals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kid_id')->constrained()->on('kids')->onDelete('cascade');
            $table->foreignId('customer_id')->constrained()->on('customers')->onDelete('cascade');
            $table->foreignId('appeal_id')->constrained()->on('appales_nums')->onDelete('cascade');
            $table->integer('status')->default(0);
            $table->integer('mastery')->nullable();
            $table->string('target');
            $table->string('stimulus');
            $table->string('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('goals');
    }
}
