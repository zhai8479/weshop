<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('informations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->comment('用户id')->unique();
            $table->string('Receiving_address')->comment('收货地址');
            $table->integer('default_address')->comment('是否为默认地址')->nullable();
            $table->integer('Receiving_phone')->comment('收货电话');
            $table->string('Receiving_name')->comment('收件人姓名');
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
        Schema::dropIfExists('informations');
    }
}
