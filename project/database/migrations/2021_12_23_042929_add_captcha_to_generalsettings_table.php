<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCaptchaToGeneralsettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('generalsettings', function (Blueprint $table) {
            $table->string('captacha_site_key')->default('6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI');
            $table->string('captcha_secret_key')->default('6LeIxAcTAAAAAGG-vFI1TnRWxMZNFuojJ4WifJWe');
            $table->string('captcha_url')->default('https://www.google.com/recaptcha/api/siteverify');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('generalsettings', function (Blueprint $table) {
            //
        });
    }
}
