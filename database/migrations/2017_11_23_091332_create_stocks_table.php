<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * 创建库存表
         */
        Schema::create('stocks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('commodity_id')->comment('商品id');
            $table->integer('unique_identifier')->comment('唯一标识');
            $table->integer('num_stock')->comment('库存数量');
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
        Schema::dropIfExists('stocks');
    }
}
