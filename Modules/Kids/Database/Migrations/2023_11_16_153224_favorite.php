<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Favorite extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('favorite', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('kid_id')->constrained()->on('kids')->onDelete('cascade');
            $table->foreignId('customer_id')->constrained()->on('customers')->onDelete('cascade');
            $table->string('frist_instruction')->nullable();
            $table->string('second_instruction')->nullable();
            $table->string('third_instruction')->nullable();
            $table->string('fourth_instruction')->nullable();
            $table->string('frist_name');
            $table->string('second_name');
            $table->string('third_name');
            $table->string('fourth_name');
            $table->string('fifth_name');
            $table->string('sixth_name');
            $table->string('frist_percentage')->default('0%');
            $table->string('second_percentage')->default('0%');
            $table->string('third_percentage')->default('0%');
            $table->string('fourth_percentage')->default('0%');
            $table->string('fifth_percentage')->default('0%');
            $table->string('sixth_percentage')->default('0%');
            $table->date('create_date')->default(\Carbon\Carbon::now());
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
        Schema::dropIfExists('favorite');
    }
}
