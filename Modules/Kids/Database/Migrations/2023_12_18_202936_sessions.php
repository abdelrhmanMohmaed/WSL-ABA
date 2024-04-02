<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Sessions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('sessions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kid_id')->constrained()->on('kids')->onDelete('cascade');
            $table->foreignId('customer_id')->constrained()->on('customers')->onDelete('cascade');
            $table->foreignId('goal_id')->constrained()->on('goals')->onDelete('cascade');
            $table->foreignId('indoctrination_type_id')->constrained()->on('indoctrination_types')->onDelete('cascade');
            $table->integer('percentage');
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
        Schema::dropIfExists('sessions');
    }
}
