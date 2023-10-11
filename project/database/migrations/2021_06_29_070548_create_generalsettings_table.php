<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGeneralsettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('generalsettings', function (Blueprint $table) {
            $table->id();
            $table->string('logo')->nullable();
            $table->string('favicon');
            $table->string('title');
            $table->text('header_email')->nullable();
            $table->text('header_phone')->nullable();
            $table->text('footer');
            $table->text('copyright');
            $table->string('colors')->nullable();
            $table->string('loader');
            $table->string('admin_loader')->nullable();
            $table->tinyInteger('is_talkto')->default(1);
            $table->text('talkto')->nullable();
            $table->tinyInteger('is_language')->default(1);
            $table->tinyInteger('is_loader')->default(1);
            $table->text('map_key')->nullable();
            $table->tinyInteger('is_disqus')->default(0);
            $table->longText('disqus')->nullable();
            $table->tinyInteger('is_contact')->default(0);
            $table->tinyInteger('is_faq')->default(0);
            $table->tinyInteger('guest_checkout')->default(0);
            $table->tinyInteger('stripe_check')->default(0);
            $table->tinyInteger('cod_check')->default(0);
            $table->text('stripe_key')->nullable();
            $table->text('stripe_secret')->nullable();
            $table->tinyInteger('currency_format')->default(0);
            $table->double('withdraw_fee')->default(0);
            $table->double('withdraw_charge')->default(0);
            $table->double('tax')->default(0);
            $table->double('shipping_cost')->default(0);
            $table->string('smtp_host')->nullable();
            $table->string('smtp_port')->nullable();
            $table->string('smtp_user')->nullable();
            $table->string('smtp_pass')->nullable();
            $table->string('from_email')->nullable();
            $table->string('from_name')->nullable();
            $table->tinyInteger('is_smtp')->default(0);
            $table->tinyInteger('is_comment')->default(1);
            $table->tinyInteger('is_currency')->default(1);
            $table->text('add_cart')->nullable();
            $table->text('out_stock')->nullable();
            $table->text('add_wish')->nullable();
            $table->text('already_wish')->nullable();
            $table->text('wish_remove')->nullable();
            $table->text('add_compare')->nullable();
            $table->text('already_compare')->nullable();
            $table->text('compare_remove')->nullable();
            $table->text('color_change')->nullable();
            $table->text('coupon_found')->nullable();
            $table->text('no_coupon')->nullable();
            $table->text('already_coupon')->nullable();
            $table->text('order_title')->nullable();
            $table->text('order_text')->nullable();
            $table->tinyInteger('is_affilate')->default(1);
            $table->integer('affilate_charge')->default(0);
            $table->text('affilate_banner')->nullable();
            $table->text('already_cart')->nullable();
            $table->double('fixed_comission')->default(0);
            $table->double('percentage_comission')->default(0);
            $table->tinyInteger('multiple_shipping')->default(0);
            $table->tinyInteger('multiple_packaging')->default(0);
            $table->tinyInteger('vendor_ship_info')->default(0);
            $table->tinyInteger('reg_vendor')->default(0);
            $table->text('cod_text')->nullable();
            $table->text('paypal_text')->nullable();
            $table->text('stripe_text')->nullable();
            $table->string('header_color')->nullable();
            $table->string('footer_color')->nullable();
            $table->string('copyright_color')->nullable();
            $table->tinyInteger('is_admin_loader')->default(0);
            $table->string('menu_color')->nullable();
            $table->string('menu_hover_color')->nullable();
            $table->tinyInteger('is_home')->default(0);
            $table->tinyInteger('is_verification_email')->default(0);
            $table->string('instamojo_key')->nullable();
            $table->string('instamojo_token')->nullable();
            $table->text('instamojo_text')->nullable();
            $table->tinyInteger('is_instamojo')->default(0);
            $table->tinyInteger('instamojo_sandbox')->default(0);
            $table->tinyInteger('is_paystack')->default(0);
            $table->text('paystack_key')->nullable();
            $table->text('paystack_email')->nullable();
            $table->text('paystack_text')->nullable();
            $table->integer('wholesell')->default(0);
            $table->tinyInteger('is_captcha')->default(0);
            $table->string('error_banner')->nullable();
            $table->tinyInteger('is_popup')->default(0);
            $table->text('popup_title')->nullable();
            $table->text('popup_text')->nullable();
            $table->text('popup_background')->nullable();
            $table->string('invoice_logo')->nullable();
            $table->string('user_image')->nullable();
            $table->string('vendor_color')->nullable();
            $table->tinyInteger('is_secure')->default(0);
            $table->tinyInteger('is_report')->default(0);
            $table->tinyInteger('paypal_check')->default(0);
            $table->text('paypal_business')->nullable();
            $table->text('footer_logo')->nullable();
            $table->string('email_encryption')->nullable();
            $table->text('paytm_merchant')->nullable();
            $table->text('paytm_secret')->nullable();
            $table->text('paytm_website')->nullable();
            $table->text('paytm_industry')->nullable();
            $table->Integer('is_paytm')->default(1);
            $table->text('paytm_text')->nullable();
            $table->enum('paytm_mode', ['sandbox', 'live'])->nullable();
            $table->tinyInteger('is_molly')->default(0);
            $table->text('molly_key')->nullable();
            $table->text('molly_text')->nullable();
            $table->integer('is_razorpay')->default(1);
            $table->text('razorpay_key')->nullable();
            $table->text('razorpay_secret')->nullable();
            $table->text('razorpay_text')->nullable();
            $table->tinyInteger('show_stock')->default(0);
            $table->tinyInteger('is_maintain')->default(0);
            $table->text('maintain_text')->nullable();
            $table->string('breadcumb_banner')->nullable();
            $table->integer('register_id')->default(0);
            $table->integer('preloaded')->default(0);
            $table->string('mail_driver')->nullable();
            $table->string('mail_encryption')->nullable();
            $table->text('deactivated_text')->nullable();
            $table->tinyInteger('is_notify_popup')->default(0);
            $table->Integer('notify_popup_time')->default(0);
            $table->text('youtube_api_key')->nullable();
            $table->tinyInteger('is_youtube_api')->default(0);


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
        Schema::dropIfExists('generalsettings');
    }
}
