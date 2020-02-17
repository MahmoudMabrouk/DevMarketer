<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('slug')->unique();
            $table->bigInteger('auther_id')->unsigned();
            $table->string('title');
            $table->binary('image');
            $table->longText('content');
            $table->enum('status',['published','draft']);
            $table->dateTime('deleted_at')->nullable();

            $table->timestamps();

            $table  ->foreign('auther_id')
                    ->references('id')->on('users')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
