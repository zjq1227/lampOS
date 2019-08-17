<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUadminTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uadmin', function (Blueprint $table) {
            $table->increments('id');
            $table->char('uname', 32)->comment("管理员名");
            $table->char('pass', 32)->comment("管理员密码");
            $table->char('email', 32)->comment("邮箱");
            $table->char('phone', 32)->comment("手机号");
            $table->enum('sex', ['1', '2'])->comment("用户性别1男2女")->default("1");
            $table->enum('status', ['1', '2'])->comment("1开启2关闭")->default("1");
            $table->char('auth', 32)->comment("连接管理员类型表");
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
        Schema::dropIfExists('uadmin');
    }
}
