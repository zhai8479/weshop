<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMerchandisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('merchandises', function (Blueprint $table) {
            $table->increments('id');
            $table->string('merchandise_name',40)->comment('商品标题');
            $table->string('type',20)->comment('商品类型');
            $table->json('particulars')->comment('商品详情');
            $table->integer('usable_integral')->comment('可使用积分')->nullable();
            $table->float('price_tag')->comment('标价');
            $table->float('Present_price')->comment('现价');
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
        Schema::dropIfExists('merchandises');
    }
}
