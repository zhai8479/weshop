<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommoditysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * 创建商品类型表
         */
        Schema::create('types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('commodity_id')->comment('商品类型名称');
            $table->timestamps();
        });

        /**
         * 商品属性类别表
         */
        Schema::create('commodity_abbr_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 20)
                ->comment('属性名称');
            $table->timestamps();
        });

        /**
         * 商品属性值表
         */
        Schema::create('commodity_abbr_vals', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
        });

        /**
         * 商品属性表
         */
        Schema::create('commodity_abbrs', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
        });

        /**
         * 商品库存表
         */
        Schema::create('commodity_abbr_types', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
        });

        /**
         * 商品表
         */
        Schema::create('commodities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('commodity_name',40)->comment('商品标题');
            $table->integer('type_id')->comment('商品类型id');
            $table->json('particulars')->comment('商品详情');
            $table->integer('usable_integral')->comment('可使用积分')->nullable();
            $table->float('price_tag')->comment('标价');
            $table->float('present_price')->comment('现价');
            $table->timestamps();
        });

        /**
         * 创建商品属性表
         * 用于储存一件商品的不同属性
         */
        Schema::create('attributes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('commodity_id')->comment('商品id');
            $table->string('attribute',40)->comment('属性');
            $table->string('attributes_value',40)->comment('属性值');
            $table->integer('unique_identifier')->comment('唯一标识');
            $table->timestamps();
        });

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
        Schema::dropIfExists('commoditys');

        Schema::dropIfExists('attributes');

        Schema::dropIfExists('stocks');

        Schema::dropIfExists('types');
    }
}
