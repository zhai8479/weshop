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
            $table->integer('user_id')
                ->comment('用户id');
            $table->string('order_num', 100)->unique()
                ->comment('订单单号');
            $table->integer('order_status')->default(1)
                ->comment('订单状态 1. 待支付 2. 待发货 3. 已发货 4. 已签收 5. 未支付取消 6. 已支付取消 7. 超时取消 8. 管理员取消');
            $table->tinyInteger('payment_status')->default(1)
                ->comment('支付状态 1. 待支付 2. 已支付 3. 已取消');
            $table->string('payment_order')
                ->comment('外部支付单号');
            $table->string('user_note')
                ->comment('用户订单备注');
            $table->string('admin_note')
                ->comment('管理员备注');

            // 金额信息
            $table->float('commodity_price')
                ->comment('商品价格');
            $table->float('postage_price')
                ->comment('邮费');
            $table->float('real_pay_price')
                ->comment('实际支付金额');
            $table->float('integral_price')
                ->comment('积分抵扣金额');

            // 积分信息
            $table->integer('integral_num')
                ->comment('使用积分数量');

            // 物流信息
            $table->string('receiving_address')
                ->comment('收货地址');
            $table->string('receiving_phone', 11)
                ->comment('收货电话');
            $table->string('receiving_name')
                ->comment('收件人姓名');
            $table->integer('shipment_number')->unique()
                ->comment('物流单号');

            $table->timestamps();
        });

        /**
         * 创建订单商品记录表
         */
        Schema::create('order_commodities', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_id')
                ->comment('订单id');
            $table->integer('commodity_id')
                ->comment('商品id');
            $table->integer('stock_id')
                ->comment('库存id');
            $table->integer('commodity_num')
                ->comment('商品数量');
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
        Schema::dropIfExists('order_commodities');
    }
}
