<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fields', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id');
            $table->tinyInteger('type')->nullable()->comment('1-text, 2-select, 3-checkbox, 5-radio');
            $table->string('label',100)->nullable();
            $table->string('name')->nullable();
            $table->string('placeholder')->nullable();
            $table->text('note')->nullable();
            $table->tinyInteger('required');
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
        Schema::dropIfExists('fields');
    }
}
