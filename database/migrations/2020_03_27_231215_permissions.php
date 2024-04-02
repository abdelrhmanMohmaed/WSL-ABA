<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\Permission;

class Permissions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('permission');
            $table->unsignedBigInteger('role_id');
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
            $table->timestamps();
        });

        $permission = 
        [
            'home',
            'users',
            'adduserpage',
            'storeuser',
            'deleteuser',
            'eidtuser',
            'updateuser',
            'permissions',
            'addrolepage',
            'addpermission',
            'editrolepage',
            'updatepermission',
            'deletepermission',
            'reports',
            'deletereport',
            'deleteallreports',
            'setting',
            'updatemainsetting',
            'updatecopyrigth',
            'updateaboutapp',
            'updatesmtp',
            'updatesms',
            'updateonesignal',
            'updatefcm',
        ];

        foreach($permission as $p)
        {
            $Permission = new Permission;
            $Permission->permission  =$p;
            $Permission->role_id     =1;
            $Permission->save();
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permissions');
    }
}
