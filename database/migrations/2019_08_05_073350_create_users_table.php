<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->char('uname', 32)->comment("用户名");
            $table->char('password',32)->comment("密码");
            $table->char('Email',55)->comment("邮箱");
            $table->enum('status', ['1', '2'])->comment("用户状态1开启2关闭")->default("1");
            $table->char('zpwd',32)->comment("支付密码");
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
        Schema::dropIfExists('users');
    }
}
