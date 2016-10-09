<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * 运行迁移。
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('category_id');
            $table->string('category');
            $table->integer('count');              
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
        Schema::drop('categories');
    }
}
