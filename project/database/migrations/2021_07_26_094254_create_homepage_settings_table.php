<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomepageSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('homepage_settings', function (Blueprint $table) {
            $table->id();
            $table->string('hero_bg');
            $table->string('hero_title');
            $table->string('hero_text');
            $table->string('checkout_theme_title');
            $table->string('checkout_theme_text');
            $table->string('featured_theme_title');
            $table->string('featured_theme_text');
            $table->string('featured_theme_bg');
            $table->string('blog_section_title');
            $table->string('blog_section_text');
            $table->string('newsletter_title');
            $table->string('newsletter_text');
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
        Schema::dropIfExists('homepage_settings');
    }
}
