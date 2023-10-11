<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['user_id',  'order_number', 'item_id', 'support','license', 'included_support', 'extended_support', 'price', 'total_price', 'method', 'billing_first_name', 'billing_last_name', 'billing_company_name', 'billing_email_address', 'billing_country', 'billing_state', 'billing_zipcode', 'billing_address'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function ordered_items() {
        return $this->hasMany('App\Models\OrderedItem');
    }
}
