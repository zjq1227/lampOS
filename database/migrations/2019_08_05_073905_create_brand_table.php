<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBrandTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brand', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sid')->comment("商家的id");
            $table->char('bname',64)->comment("品牌的名字");
            $table->integer('number')->comment("品牌的序号");
            $table->char('blogo',255)->comment("品牌logo");
            $table->char('country',64)->comment("品牌国家");
            $table->char('describe',255)->comment("品牌描述");
            $table->enum('status',['1','2'])->comment("品牌状态1开启")->default("1");
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
        Schema::dropIfExists('brand');
    }
}
