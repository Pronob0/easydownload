<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('txn_number')->nullable();
            $table->double('amount')->default(0);
            $table->string('currency_sign')->nullable();
            $table->string('currency_code')->nullable();
            $table->string('currency_value')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('txnid')->nullable();
            $table->text('details')->nullable();
            $table->string('type')->nullable();
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
        Schema::dropIfExists('transactions');
    }
}
