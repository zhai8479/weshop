<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * 创建邮费规则表
         */
        Schema::create('postages', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('strategy')->comment('邮费规则，1.包邮 2.满包 3.不包');
            $table->float('amount')->comment('邮费金额');
            $table->timestamps();
        });
        /**
         * 创建邮费商品关联表
         */
        Schema::create('post_commodities', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('postage_id')->comment('邮费规则id');
            $table->integer('commodities_id')->comment('商品id');
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
        Schema::dropIfExists('postages');
    }
}
