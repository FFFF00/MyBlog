<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * 运行迁移。
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('article_id');
            $table->integer('category_id');           
            $table->string('title');
            $table->string('author');     
            $table->string('outline');     
            $table->string('title_img');
            $table->text('content');  
            $table->integer('view')->default(0);
            $table->integer('like')->default(0);
            $table->softDeletes();                          
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
        Schema::drop('articles');
    }
}
