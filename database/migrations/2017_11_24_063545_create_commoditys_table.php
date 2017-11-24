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
        Schema::create('commoditys', function (Blueprint $table) {
            $table->increments('id');
            $table->string('commodity_name',40)->comment('商品标题');
            $table->integer('type_id')->comment('商品类型id');
            $table->json('particulars')->comment('商品详情');
            $table->integer('usable_integral')->comment('可使用积分')->nullable();
            $table->float('price_tag')->comment('标价');
            $table->float('present_price')->comment('现价');
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
    }
}
