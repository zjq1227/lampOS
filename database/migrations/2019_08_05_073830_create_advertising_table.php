<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdvertisingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advertising', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('desc')->comment("排序");
            $table->char('pic',255)->comment("图片");
            $table->char('link',255)->comment("广告连接");
            $table->char('type',32)->comment("广告类型");
            $table->enum('astatus',['1','2'])->comment("广告状态1开启2关闭")->default("1");
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
        Schema::dropIfExists('advertising');
    }
}
