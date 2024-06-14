<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Kids extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('kids', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('doctor_id')->constrained()->on('customers')->onDelete('cascade');
            $table->foreignId('country_id')->constrained()->on('countries')->onDelete('cascade');
            $table->foreignId('city_id')->constrained()->on('cities')->onDelete('cascade');

            $table->string('name')->nullable();
            $table->string('num')->nullable();
            $table->date('date')->nullable();
            $table->longText('place_date')->nullable();
            $table->longText('nationality')->nullable();
            $table->string('phone')->nullable();
            $table->string('gender')->nullable();
            $table->string('other_obstruction')->nullable();    // اعاقة اخري
            $table->longText('other_obstruction_com')->nullable();
            $table->string('chronic_diseases')->nullable();  // امراض مزمنة
            $table->longText('chronic_diseases_com')->nullable();
            $table->string('genetic_diseases')->nullable();  // امراض وراثية
            $table->longText('genetic_diseases_com')->nullable();
            $table->string('health_problems')->nullable(); // مشاكل صحية
            $table->longText('health_problems_com')->nullable();
            $table->string('growth_stage')->nullable();  // مرحلة النمو
            $table->longText('growth_stage_com')->nullable();

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
        //
        Schema::dropIfExists('kids');
    }
}
