<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\Configuration;

class Configurations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('configurations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('smtp_type')->nullable();
            $table->string('smtp_username')->nullable();
            $table->string('smtp_password')->nullable();
            $table->string('smtp_sender_email')->nullable();
            $table->string('smtp_sender_name')->nullable();
            $table->integer('smtp_port')->nullable();
            $table->string('smtp_host')->nullable();
            $table->string('smtp_encryption')->nullable();
            $table->string('sms_number')->nullable();
            $table->string('sms_password')->nullable();
            $table->string('sms_sender_name')->nullable();
            $table->string('oneSignal_application_id')->nullable();
            $table->string('oneSignal_authorization')->nullable();
            $table->string('fcm_server_key')->nullable();
            $table->string('fcm_sender_id')->nullable();
            $table->timestamps();
        });

        $configuration = new Configuration;
        $configuration->smtp_type  = 'smtp';
        $configuration->save();

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('configurations');
    }
}
