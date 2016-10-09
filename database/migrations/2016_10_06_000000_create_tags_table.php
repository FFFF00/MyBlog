<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagsTable extends Migration
{
    /**
     * 运行迁移。
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->increments('tag_id');
            $table->integer('count');
            $table->string('tag');                          
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
        Schema::drop('tags');
    }
}
