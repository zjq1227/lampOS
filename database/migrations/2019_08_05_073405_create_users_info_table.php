<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_info', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('uid')->comment("用户id");
            $table->char('profile', 50)->comment("会员头像");
            $table->enum('sex', ['1','2'])->default("1")->comment("用户性别1男2女");
            $table->integer('jf')->comment("会员积分");
            $table->integer('browse' )->comment("浏览记录");
            $table->integer('buy')->comment("购买记录");
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
        Schema::dropIfExists('users_info');
    }
}
