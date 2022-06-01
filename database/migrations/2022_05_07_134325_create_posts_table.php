<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->integer('category_id')->unsigned()->foreignId('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->string('title');
            $table->string('slug');
            $table->string('tags');
            $table->longText('description');
            $table->longText('body');
            $table->string('image')->nullable();
            $table->integer('hits')->nullable();
            $table->timestamps();
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
};
