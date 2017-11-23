<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIntegralLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * 创建积分记录表
         */
        Schema::create('integralLogs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->comment('用户id');
            $table->integer('change_integral')->comment('改变的积分数量');
            $table->integer('type')->comment('积分变更类型');
            $table->integer('in_out')->comment('收支类型');
            $table->integer('admin_id')->comment('管理员id')->nullable();
            $table->string('admin_note')->comment('管理员备注')->nullable();
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
        Schema::dropIfExists('integralLogs');
    }
}
