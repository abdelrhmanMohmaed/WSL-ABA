<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\User;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('phone')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->string('avatar')->default('default.png');
            $table->integer('active')->default(1);
            $table->integer('role')->default(0);
            $table->string('fcm_token',500)->nullable();
            $table->string('sidebar_background')->default('#4872A7');
            $table->string('sidebar_icon')->default('#49DAD7');
            $table->string('sidebar_active')->default('#007bff');
            $table->string('background_color')->default('#F4F6F9');
            $table->string('nav_color')->default('#F4F6F9');
            $table->string('header_color')->default('#FFFFFF');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes($column = 'deleted_at', $precision = 0);
        });

        $user = new User;
        $user->name ='محمد فضالي';
        $user->email ='root@root.com';
        $user->password =bcrypt(111111);
        $user->active ='1';
        $user->role ='1';
        $user->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
