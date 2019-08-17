<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUadminPathTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uadmin_path', function (Blueprint $table) {
            $table->increments('id');
            $table->char('pname', 64)->comment("管理员类型");            
            $table->text('pcontent')->comment("类型的描述");            
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
        Schema::dropIfExists('uadmin_path');
    }
}
