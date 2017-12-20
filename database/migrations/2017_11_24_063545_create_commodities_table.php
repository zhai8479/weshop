<?php

use App\Models\CommodityType;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommoditiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * 商品类型表
         */
        Schema::create('commodity_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->comment('商品类型名称');
            $table->integer('parent_id')->comment('所属id')->default(0);
            $table->integer('order')->comment('权重')->default(0);
            $table->timestamps();
        });

        /**
         * 商品属性名称表
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
            $table->integer('abbr_type_id')
                ->comment('属性类型id');
            $table->string('value')
                ->comment('属性值');
            $table->timestamps();
        });

        /**
         * 商品属性表
         */
        Schema::create('commodity_abbrs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('commodity_id')
                ->comment('商品id');
            $table->integer('abbr_val_id')
                ->comment('属性值id');
            $table->integer('stock_id')
                ->comment('库存id');
            $table->timestamps();
        });

        /**
         * 创建库存表
         */
        Schema::create('stocks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('commodity_id')
                ->comment('商品id');
            $table->integer('num_stock')
                ->comment('库存数量');
            $table->float('price_tag')->nullable()
                ->comment('标价');
            $table->float('present_price')
                ->comment('现价');
            $table->integer('give_integral_num')
                ->comment('赠送积分数量');
            $table->integer('usable_integral_num')
                ->comment('可使用积分数量');
            $table->timestamps();
        });

        /**
         * 商品表
         */
        Schema::create('commodities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('commodity_name',40)
                ->comment('商品标题');
            $table->integer('type_id')
                ->comment('商品类型id');
            $table->string('particulars')
                ->comment('商品详情url数组');
            $table->boolean('is_top')->default(false)
                ->comment('是否设置为推荐');
            $table->string('list_img')
                ->comment('列表显示图片');
            $table->string('carousel_img')->nullable()
                ->comment('轮播显示图片');
            $table->integer('postage_id')
                ->comment('邮费规则id');
            $table->integer('weight')->default(0)
                ->comment('权重');
            $table->timestamps();
        });

        $this->write_menu();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('commodity_types');

        Schema::dropIfExists('commodity_abbr_types');

        Schema::dropIfExists('commodity_abbr_vals');

        Schema::dropIfExists('commodity_abbrs');

        Schema::dropIfExists('stocks');

        Schema::dropIfExists('commodities');
    }

    public function write_menu()
    {
        $content = file_get_contents(__DIR__  .'/commodity_types.json');
        $arr = json_decode($content, true);
        CommodityType::insert($arr['RECORDS']);
    }
}
