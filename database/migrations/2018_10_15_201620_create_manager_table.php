<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateManagerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //创建管理员表
        Schema::create('manager',function (Blueprint $table){

            $table->increments('id');
            $table->string('username',30)->notNull();
            $table->string('password')->notNull();
            $table->timestamps();
            $table->enum('status',[1,2])->notNull()->default('2');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // 删除表
        Schema::dropIfExists('manager');

    }
}
