<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goods', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cid')->comment("分类的id");
            $table->integer('sid')->comment("店铺的id");
            $table->integer('bid')->comment("品牌的id");
            $table->char('gnum',64)->comment("产品编号店铺id+商家提交编号");
            $table->char('goods',32)->comment("商品名称");
            $table->char('antishop',50)->comment("关键词");
            $table->char('original',32)->comment("原价");
            $table->char('unit',20)->comment("单位");
            $table->char('price',32)->comment("单价");
            $table->char('picname',32)->comment("图片名");
            $table->enum('state',['1','2'])->comment("商品状态")->default("1");
            $table->integer('store')->comment("库存量");
            $table->integer('num')->comment("被购买数量");
            $table->integer('clicknum')->comment("被点击次数");
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
        Schema::dropIfExists('goods');
    }
}
