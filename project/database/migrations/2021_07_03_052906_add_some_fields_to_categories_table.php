<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSomeFieldsToCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->decimal('regular_buyer_fee',11,2)->nullable()->after('slug');
            $table->decimal('extended_buyer_fee',11,2)->nullable()->after('regular_buyer_fee');
            $table->tinyInteger('demo_url_status')->default(0)->after('extended_buyer_fee');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('categories', function (Blueprint $table) {
            //
        });
    }
}
