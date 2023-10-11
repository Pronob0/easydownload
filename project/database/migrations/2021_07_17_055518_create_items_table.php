<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->default(0);
            $table->integer('category_id');
            $table->integer('subcategory_id')->nullable();
            $table->integer('childcategory_id')->nullable();
            $table->text('attributes')->nullable();
            $table->string('name');
            $table->string('slug');
            $table->string('main_filename')->nullable();
            $table->string('thumbnail_imagename')->nullable();
            $table->string('preview_imagename')->nullable();
            $table->string('preview_screenshots_filename')->nullable();
            $table->text('description')->nullable();
            $table->string('demo_link')->nullable();
            $table->string('tags')->nullable();
            $table->string('regular_price');
            $table->string('extended_price');
            $table->integer('sell')->default(0);
            $table->enum('status',['pending','completed','declined'])->default('pending');
            $table->tinyInteger('is_feature')->default(0);
            $table->timestamp('approval_date');
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
        Schema::dropIfExists('items');
    }
}
