<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class LoanbazaarDbV2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // create slider table
        Schema::create('sliders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('title');
            $table->text('description');
            $table->string('image_src');
            $table->string('btn_txt');
            $table->string('btn_url')->nullable();
            $table->boolean('status')->default(true);
            $table->timestamps();
        });

        // create best service table
        Schema::create('best_services', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('title');
            $table->string('url');
            $table->string('icon_image')->nullable();
            $table->string('short_desc');
            $table->string('btn_text');
            $table->boolean('status')->default(true);
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

        // Create menus table
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('page_id')->nullable();
            $table->string('name');
            $table->string('url');
            $table->boolean('status');
            $table->string('icon_name')->nullable();
            $table->string('img_src')->nullable();
            $table->timestamps();
        });

        // Create sub_menus table
        Schema::create('sub_menus', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('menu_id');
            $table->bigInteger('page_id')->nullable();
            $table->string('name');
            $table->string('url');
            $table->boolean('status');
            $table->string('menu_icon')->nullable();
            $table->string('img_src')->nullable();
            $table->foreign('menu_id')->references('id')->on('menus')->onDelete('cascade');
            $table->timestamps();
        });

        // Create categories table
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->string('meta_title')->nullable();
            $table->string('meta_desc')->nullable();
            $table->boolean('status')->default(1);
            $table->timestamps();
        });

        // Create pages table
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('url');
            $table->text('body')->nullable();
            $table->string('cover_img')->nullable();
            $table->string('meta_title')->nullable();
            $table->string('meta_desc')->nullable();
            $table->boolean('status')->default(1);
            $table->timestamps();
        });

        // Create posts table
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->string('writer_id');
            $table->string('title')->nullable();
            $table->string('slug',255)->unique();
            $table->longtext('body')->nullable();
            $table->boolean('status')->default(0);
            $table->boolean('is_approved')->default(0);
            $table->string('featured_img')->nullable();
            $table->string('cover_img')->nullable();
            $table->integer('view_count')->default(0);
            $table->timestamps();
        });

        // Create category_posts table
        Schema::create('category_posts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('post_id');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
            $table->timestamps();
        });

        // Create tags table
        Schema::create('tags', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->string('meta_title')->nullable();
            $table->string('meta_desc')->nullable();
            $table->boolean('status')->default(1);
            $table->timestamps();
        });

        // post_tags table create
        Schema::create('post_tags', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('post_id');
            $table->unsignedBigInteger('tag_id');
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
            $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');
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
        // delete slider table
        Schema::dropIfExists('sliders');
        // delete best service table
        Schema::dropIfExists('best_services');
        // delete menus table
        Schema::dropIfExists('menus');
        // delete sub_menus table
        Schema::dropIfExists('sub_menus');
        // delete categories table
        Schema::dropIfExists('categories');
        // delete pages table
        Schema::dropIfExists('pages');
        // delete pages table
        Schema::dropIfExists('posts');
        // delete category_posts table
        Schema::dropIfExists('category_posts');
        // delete tags table
        Schema::dropIfExists('tags');
        // delete post_tags table
        Schema::dropIfExists('post_tags');
    }
}
