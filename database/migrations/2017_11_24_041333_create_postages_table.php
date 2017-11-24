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
         * 创建邮费表
         */
        Schema::create('postages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('strategy')->comment('邮费策略，1.包邮 2.满包 3.不包');
            $table->float('amount')->comment('邮费金额');
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
