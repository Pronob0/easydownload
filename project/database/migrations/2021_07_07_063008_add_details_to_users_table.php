<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDetailsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {

            $table->string('photo')->nullable();
            $table->string('zip')->nullable();
            $table->string('city')->nullable();
            $table->string('country')->nullable();
            $table->string('state')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('fax')->nullable();
            $table->tinyInteger('is_provider')->default(0);
            $table->tinyInteger('status')->default(0);
            $table->text('verification_link')->nullable();
            $table->text('f_url')->nullable();
            $table->text('g_url')->nullable();
            $table->text('t_url')->nullable();
            $table->text('l_url')->nullable();
            $table->tinyInteger('f_check')->default(0);
            $table->tinyInteger('g_check')->default(0);
            $table->tinyInteger('t_check')->default(0);
            $table->tinyInteger('l_check')->default(0);
            $table->tinyInteger('mail_sent')->default(0);
            $table->double('current_balance')->default(0);
            $table->date('date')->nullable();
            $table->tinyInteger('ban')->default(0);
            $table->decimal('balance',11,2);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
