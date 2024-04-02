<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\Setting;

class Settings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->longText('description')->nullable();
            $table->longText('tagged')->nullable();
            $table->longText('copyrigth')->nullable();
            $table->longText('about_ar')->nullable();
            $table->longText('about_en')->nullable();
            $table->longText('why_us_ar')->nullable();
            $table->longText('why_us_en')->nullable();
            $table->longText('customer_policy_ar')->nullable();
            $table->longText('customer_policy_en')->nullable();
            $table->longText('provider_policy_ar')->nullable();
            $table->longText('provider_policy_en')->nullable();
            $table->string('address_ar',500)->nullable();
            $table->string('address_en',500)->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->integer('dist')->default(0);
            $table->float('app_rate')->default(0);
            $table->string('longitude')->nullable();
            $table->string('latitude')->nullable();
            $table->integer('zoom')->nullable();
            $table->string('logo')->nullable();
            $table->string('background')->nullable();
            

            $table->timestamps();
        });

        $setting = new Setting;
        $setting->name  = 'إسم التطبيق';
        $setting->email = 'fadalyfad74@gmail.com';
        $setting->phone = '01024696833';
        $setting->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
