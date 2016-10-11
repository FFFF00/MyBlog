<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * 运行迁移。
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('comment_id');            
            $table->integer('user_id');
            $table->integer('article_id');            
            $table->integer('lead_id');
            $table->integer('follow_id');
            $table->integer('like')->default(0);
            $table->text('content');
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
        Schema::drop('comments');
    }
}
