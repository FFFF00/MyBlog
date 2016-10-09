<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnonyusersTable extends Migration
{
    /**
     * 运行迁移。
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anonyusers', function (Blueprint $table) {
            $table->increments('anonyuser_id');
            $table->string('nickname');
            $table->integer('ip_id');
            $table->rememberToken();                                      
            $table->timestamps();
            
        });
    }

    /**
     * 还原迁移。
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('anonyusers');
    }
}
