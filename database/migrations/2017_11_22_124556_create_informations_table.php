<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * 创建收货信息表
         */
        Schema::create('informations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->comment('用户id');
            $table->string('receiving_address')->comment('收货地址');
            $table->tinyInteger('is_default')->comment('是否为默认地址')->default(0);
            $table->string('receiving_phone', 11)->comment('收货电话');
            $table->string('receiving_name', 40)->comment('收件人姓名');
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
        Schema::dropIfExists('informations');
    }
}
