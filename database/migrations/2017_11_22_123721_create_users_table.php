<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*
         * 创建用户表
         */
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_name',20)->comment('用户名');
            $table->string('invite')->comment('邀请码')->unique();
            $table->integer('invite_id')->comment('邀请人id')->nullable()->unique();
            $table->string('openid',50)->comment('微信提供的openId')->nullable();
            $table->timestamps();
        });
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
