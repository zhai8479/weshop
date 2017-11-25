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
            $table->string('user_name',20)
                ->comment('用户名');
            $table->string('email', 40)->unique()->nullable()
                ->comment('邮箱');
            $table->string('password')->nullable()
                ->comment('密码');
            $table->tinyInteger('reg_type')
                ->comment('注册类型 1、手机号注册 2、邮箱注册 3、qq 4、微信 5、微博');
            $table->string('mobile', 11)->nullable()->unique()
                ->comment('手机号');
            $table->tinyInteger(' from_platform')->nullable()
                ->comment('平台来源 1、微信 2、qq 3、微博');
            $table->ipAddress('reg_ip')->nullable()
                ->comment('注册ip');
            $table->string('avatar_url')->nullable()
                ->comment('头像路径');
            $table->string('invite', 100)->unique()
                ->comment('邀请码');
            $table->integer('invite_id')->nullable()
                ->comment('邀请人id');
            $table->string('openid',100)->nullable()->unique()
                ->comment('微信提供的openId');
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
