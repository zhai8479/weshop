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
            $table->string('email')->comment('邮箱')->unique();
            $table->string('password')->comment('密码');
            $table->integer('reg_type')->comment('注册类型 1、手机号注册 2、邮箱注册 3、qq 4、微信 5、微博');
            $table->integer('mobile')->length(11)->comment('手机号');
            $table->integer(' from_platform')->comment('平台来源 1、微信 2、qq 3、微博');
            $table->ipAddress('reg_ip')->comment('注册ip');
            $table->string('avatar_url')->comment('头像路径')->unique();
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
