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
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('uid')->comment("会员的id");
            $table->integer('sid')->comment("商家的id");
            $table->integer('shid')->comment("收货地址id");
            $table->char('code',32)->comment("订单编号");
            $table->char('phone',32)->comment("电话号");
            $table->char('total',32)->comment("总金额");
            $table->enum('status',['0','1','2','3','4','5'])->comment("0新订单1已发货2已收货3无效订单4未付款5退款")->default("0");
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
