<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnonyuserIpTable extends Migration
{
    /**
     * 运行迁移。
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anonyuser_ip', function (Blueprint $table) {
            $table->integer('ip_id');
            $table->integer('anonyuser_id');                                      
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
        Schema::drop('anonyuser_ip');
    }
}
