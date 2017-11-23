<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * 创建订单表
         */
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->comment('用户id')->unique();
            $table->integer('commodity_id')->comment('商品id');
            $table->integer('order_price')->comment('订单总价');
            $table->integer('order_status')->comment('订单状态')->default(1);
            $table->integer('Payment_status')->comment('支付状态')->default(1);
            $table->integer('Payment_order')->comment('支付单号');
            $table->integer('shipment_number')->comment('物流单号')->unique();
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
        Schema::dropIfExists('orders');
    }
}
