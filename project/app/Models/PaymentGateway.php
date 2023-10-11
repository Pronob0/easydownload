<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentGateway extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'details', 'subtitle', 'name', 'type', 'information','keyword','status'];
    public $timestamps = false;

    public function convertAutoData(){
        return  json_decode($this->information,true);
    }

    public function getAutoDataText(){
        $text = $this->convertAutoData();
        return end($text);
    }

    public function showKeyword(){
        $data = $this->keyword == null ? 'other' : $this->keyword;
        return $data;
    }

    public function upload($name,$file,$oldname)
    {
        $file->move('assets/images',$name);
        if($oldname != null)
        {
            if(file_exists(base_path('../assets/images/'.$oldname))){
                unlink(base_path('../assets/images/'.$oldname));
            }
        }
    }


    public function showCheckoutLink(){
        $link = '';
        $data = $this->keyword == null ? 'other' : $this->keyword;
        if($data == 'paypal'){
            $link = route('front.paypal.submit');
        }else if($data == 'stripe'){
            $link = route('front.stripe.submit');
        }
        else if($data == 'instamojo'){
            $link = route('front.instamojo.submit');
        }
        else if($data == 'mercadopago'){
            $link = route('front.mercadopago.submit');
        }
        else if($data == 'paystack'){
            $link = route('front.paystack.submit');
        }
        else if($data == 'flutterwave'){
            $link = route('front.flutter.submit');
        }
        else if($data == 'paytm'){
            $link = route('front.paytm.submit');
        }
        return $link;
    }


    public function showForm(){
        $show = '';
        $data = $this->keyword == null ? 'other' : $this->keyword;
        $values = ['cod','voguepay','sslcommerz','flutterwave','razorpay','mollie','paytm','paystack','paypal','instamojo'];
        if (in_array($data, $values)){
            $show = 'no';
        }else{
            $show = 'yes';
        }
        return $show;
    }



}
