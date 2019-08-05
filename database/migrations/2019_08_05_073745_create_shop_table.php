<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('uid')->comment("用户的id");
            $table->char('sname',50)->comment("店铺的名称");
            $table->text('intro')->comment("店铺的简介");
            $table->enum('audit',['1','2','3'])->comment("店铺的审核状态")->default("3");
            $table->char('idcard')->comment("申请人身份证");
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
        Schema::dropIfExists('shop');
    }
}
