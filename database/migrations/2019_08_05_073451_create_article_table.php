<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article', function (Blueprint $table) {
            $table->increments('id');
            $table->char('name', 64)->comment("文章名");
            $table->char('jianjie', 64)->comment("文章的简介");            
            $table->text('content')->comment("文章的内容");            
            $table->char('type',32)->comment("文章的类型");            
            $table->enum('status', ['1', '2'])->comment("文章的权限1是开启")->dafault("1");
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
        Schema::dropIfExists('article');
    }
}
