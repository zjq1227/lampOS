<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('gid')->comment("商品id");
            $table->char('company',50)->comment("产地");
            $table->text('descr')->comment("简介");
            $table->char('specification',255)->comment("规格");
            $table->char('color',255)->comment("颜色分类");
            $table->integer('weight')->comment("产品重量");
            $table->char('photoname',255)->comment("产品详情图");
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
        Schema::dropIfExists('details');
    }
}
