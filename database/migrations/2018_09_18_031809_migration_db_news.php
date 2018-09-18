<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MigrationDbNews extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parent_id')->nullable();
            $table->integer('lft')->nullable();
            $table->integer('rgt')->nullable();
            $table->integer('depth')->nullable();
            $table->string('name', 255);
            $table->string('slug', 255);
            $table->string('title_seo', 180)->nullable();
            $table->text('description')->nullable();
            $table->string('description_seo', 255)->nullable();

            $table->timestamps();

            $table->engine = 'InnoDB';
        });

        Schema::create('news', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 255);
            $table->string('slug', 255);
            $table->string('sub_title', 255)->nullable();
            $table->integer('category')->references('id')->on('categories');
            $table->string('sub_category', 255)->nullable();
            $table->string('description', 400)->nullable();
            $table->string('sub_description', 400)->nullable();
            $table->text('content');
            $table->string('image', 255)->nullable();
            $table->string('image_description', 255)->nullable();
            $table->string('author', 255)->nullable();
            $table->string('status', 20);
            $table->timestamp('publish_at')->nullable();

            $table->engine = 'InnoDB';
        });

        Schema::create('new_implement', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('new_id')->references('id')->on('news');
            $table->integer('created_by')->references('id')->on('users');
            $table->integer('editor_by')->references('id')->on('users');
            $table->integer('publish_by')->references('id')->on('users');
        });

        Schema::create('new_implement_time', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('new_id')->references('id')->on('news');
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('editor_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('published_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('return_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('return_editor_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('release_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('delete_at')->default(DB::raw('CURRENT_TIMESTAMP'));

            $table->engine = 'InnoDB';
        });

        Schema::create('tags', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('new_tags', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('new_id')->references('id')->on('news');
            $table->integer('tag_id')->references('id')->on('tags');
            $table->nullableTimestamps();
            $table->softDeletes();

            $table->engine = 'InnoDB';
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('categories');
        Schema::drop('news');
        Schema::drop('new_implement');
        Schema::drop('new_implement_time');
        Schema::drop('tags');
        Schema::drop('new_tags');
    }
}
