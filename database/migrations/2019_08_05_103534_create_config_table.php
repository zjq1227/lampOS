<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConfigTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('config', function (Blueprint $table) {
            $table->increments('id');
            $table->char('name',32)->comment("网站配置名称");
            $table->char('pic',255)->comment("网站配置图片");
            $table->char('keyword',255)->comment("网站配置关键词");
            $table->char('miaoshu',255)->comment("网站配置描述");
            $table->char('banquan',255)->comment("网站配置版权");
            $table->char('beian',255)->comment("网站配置备案号");
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
        Schema::dropIfExists('config');
    }
}
