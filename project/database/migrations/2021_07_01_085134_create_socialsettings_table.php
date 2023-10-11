<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSocialsettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('socialsettings', function (Blueprint $table) {
            $table->id();
            $table->string('facebook');
            $table->string('gplus');
            $table->string('twitter');
            $table->string('linkedin');
            $table->string('instagram')->nullable();
            $table->tinyInteger('f_status')->default(1);
            $table->tinyInteger('g_status')->default(1);
            $table->tinyInteger('t_status')->default(1);
            $table->tinyInteger('l_status')->default(1);
            $table->tinyInteger('i_status')->default(1);
            $table->tinyInteger('f_check')->nullable();
            $table->tinyInteger('g_check')->nullable();
            $table->text('fclient_id')->nullable();
            $table->text('fclient_secret')->nullable();
            $table->text('fredirect')->nullable();
            $table->text('gclient_id')->nullable();
            $table->text('gclient_secret')->nullable();
            $table->text('gredirect')->nullable();
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
        Schema::dropIfExists('socialsettings');
    }
}
