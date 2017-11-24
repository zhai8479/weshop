<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIntegralsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * 创建积分表
         */
        Schema::create('integrals', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unique()
                ->comment('邀请人id');
            $table->integer('integral')->default(0)
                ->comment('积分总数量');
            $table->timestamps();
        });

        /**
         * 创建积分记录表
         */
        Schema::create('integral_logs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')
                ->comment('用户id');
            $table->integer('change_integral')
                ->comment('改变的积分数量');
            $table->tinyInteger('type')
                ->comment('积分变更类型  1. 消费得积分 2. 消费使用积分 3. 邀请好友得积分');
            $table->tinyInteger('in_out')
                ->comment('收支类型 1. 收入, 2. 支出');
            $table->integer('admin_id')->nullable()
                ->comment('管理员id');
            $table->string('admin_note')->nullable()
                ->comment('管理员备注');
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
        Schema::dropIfExists('integrals');

        Schema::dropIfExists('integral_logs');

    }
}
