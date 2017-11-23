<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttributesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*
         *创建商品属性表
         */
        Schema::create('attributes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('commodity_id')->comment('商品id');
            $table->string('attribute',40)->comment('属性');
            $table->string('attributes_value',40)->comment('属性值');
            $table->integer('unique_identifier')->comment('唯一标识');
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
        Schema::dropIfExists('attributes');
    }
}
