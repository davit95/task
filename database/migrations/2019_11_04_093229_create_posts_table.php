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
            $table->bigInteger('user_id')->nullable()->unsigned()->index();
            $table->bigInteger('category_id')->nullable()->unsigned()->index();
            $table->string('name');
            $table->mediumText('description');
            $table->string('image');
            $table->timestamps();
            /**
             * Table relations
             */
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('restrict')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onUpdate('restrict')->onDelete('set null');
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
