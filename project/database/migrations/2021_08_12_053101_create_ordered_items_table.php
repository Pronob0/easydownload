<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderedItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordered_items', function (Blueprint $table) {
            $table->id();
            $table->integer('order_id')->nullable();
            $table->string('invoice_number')->nullable();
            $table->integer('item_id')->nullable();
            $table->string('support')->nullable();
            $table->string('license')->nullable();
            $table->decimal('included_support')->nullable();
            $table->decimal('extended_support')->nullable();
            $table->integer('price')->nullable();
            $table->decimal('total_price')->nullable();
            $table->decimal('author_profit')->default(0);
            $table->decimal('admin_profit')->default(0);
            $table->string('support_valid_till')->nullable();
            $table->tinyInteger('refund')->default(0)->comment('0 - not sent, 1 - pending, 2 - approve, 3 - reject');
            $table->tinyInteger('refund_seen')->default(0)->comment('0 - new refund which has not been seen yet, 1 - refund which has been seen already');
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
        Schema::dropIfExists('ordered_items');
    }
}
