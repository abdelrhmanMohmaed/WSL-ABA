<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Dads extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('dads', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('kid_id')->constrained()->on('kids')->onDelete('cascade');

            $table->string('name')->nullable();
            $table->string('num')->nullable();
            $table->date('date')->nullable();
            $table->string('marital_status')->nullable();
            $table->string('phone')->nullable();
            $table->string('learning')->nullable();
            $table->string('work')->nullable();
            $table->string('smoking')->nullable();    // مدخن
//            $table->longText('smoking_com')->nullable();
            $table->string('obstruction')->nullable();  // اعاقة
            $table->longText('obstruction_com')->nullable();
            $table->string('chronic_diseases')->nullable();  // امراض مزمنة
            $table->longText('chronic_diseases_com')->nullable();
            $table->string('genetic_diseases')->nullable();  // امراض وراثية
            $table->longText('genetic_diseases_com')->nullable();
            $table->string('mental_state')->nullable();  //  الحالة النفسية
            $table->longText('mental_state_com')->nullable();
            $table->string('health_problems')->nullable(); // مشاكل صحية
            $table->longText('health_problems_com')->nullable();
            $table->string('communication')->nullable();  //  التواصل
            $table->longText('communication_com')->nullable();
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
        Schema::dropIfExists('dads');
    }
}
