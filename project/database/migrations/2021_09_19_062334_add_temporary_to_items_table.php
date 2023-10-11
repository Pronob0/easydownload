<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTemporaryToItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('items', function (Blueprint $table) {
            $table->tinyInteger('Resubmission')->default(0);
            $table->string('temp_mainfile')->nullable();
            $table->string('temp_thumbnail_image')->nullable();
            $table->string('temp_preview_image')->nullable();
            $table->string('temp_screenshot')->nullable();
            $table->enum('temp_status',['pending','completed','declined'])->default('pending');
          
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('items', function (Blueprint $table) {
            //
        });
    }
}
