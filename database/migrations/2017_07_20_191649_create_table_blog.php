<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableBlog extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('blog')) {
            Schema::create('blog', function (Blueprint $table) {
                $table->increments('id');
                $table->timestamps();
                $table->text('preview_text');
                $table->string('name', 255);
                $table->text('detail_text');
                $table->string('preview_picture', 255);
                $table->string('detail_picture', 255);
                $table->integer('author_id');
                $table->text('tags');
                $table->integer('category_id');
                $table->integer('rating');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blog');
    }
}
