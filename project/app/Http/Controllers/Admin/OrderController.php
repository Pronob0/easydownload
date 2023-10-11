<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Datatables;
use App\Classes\GeniusMailer;
use App\Models\Order;
use App\Models\User;
use App\Models\Generalsetting;
use App\Models\OrderedItem;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    //*** JSON Request
    public function datatables()
    {
            $datas = Order::orderBy('id','desc')->get();

            //--- Integrating This Collection Into Datatables
            return Datatables::of($datas)
                            ->addColumn('email', function(Order $data) {
                                return $data->billing_email_address;
                            })
                            ->editColumn('id', function(Order $data) {
                                $id = '#'.$data->order_number;
                                return $id;
                            })

                            ->addColumn('totalQty', function(Order $data) {
                                return $data->ordered_items()->count();
                            })
                            ->editColumn('pay_amount', function(Order $data) {
                                return '$' . $data->ordered_items()->sum('total_price');
                            })
                            ->addColumn('action', function(Order $data) {


                                return '<div class="btn-group mb-1">
                                <button type="button" class="btn btn-primary btn-sm btn-rounded dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  '.'Actions' .'
                                </button>
                                <div class="dropdown-menu" x-placement="bottom-start">
                                  <a href="' . route('admin.order.show',$data->id) . '"  class="dropdown-item">'.__("Details").'</a>
                                  <a href="'.  route('admin.order.invoice',$data->id).'" class="dropdown-item">'.__("Invoice").'</a>
                                </div>
                              </div>';
                            })

                            ->rawColumns(['email','id','action'])
                            ->toJson(); //--- Returning Json Data To Client Side
    }

    public function index()
    {
        return view('admin.order.index');
    }

    public function show($id)
    {
        $order = Order::findOrFail($id);
        $cart = $order->ordered_items;
        return view('admin.order.details',compact('order','cart'));
    }

    public function invoice($id)
    {
        $order = Order::findOrFail($id);
        $cart = $order->ordered_items;
        return view('admin.order.invoice',compact('order','cart'));
    }

    public function emailsub(Request $request)
    {
        $gs = Generalsetting::findOrFail(1);
        if($gs->is_smtp == 1)
        {
            $data = [
                    'to' => $request->to,
                    'subject' => $request->subject,
                    'body' => $request->message,
            ];

            $mailer = new GeniusMailer();
            $mailer->sendCustomMail($data);
        }
        else
        {
            $data = 0;
            $headers = "From: ".$gs->from_name."<".$gs->from_email.">";
            $mail = mail($request->to,$request->subject,$request->message,$headers);
            if($mail) {
                $data = 1;
            }
        }

        return response()->json($data);
    }

    public function printpage($id)
    {
        $order = Order::findOrFail($id);
        $cart = $order->ordered_items;
        return view('admin.order.print',compact('order','cart'));
    }

    public function statement()
    {
        return view('admin.order.statement');
    }

    public function statedatatables()
    {
        $datas = OrderedItem::join('orders', 'orders.id', '=', 'ordered_items.order_id')
        ->select('ordered_items.*')
        ->orderBy('ordered_items.id', 'DESC')
        ->get();
 
        //--- Integrating This Collection Into Datatables
        return Datatables::of($datas)
                        
                       
                        ->editColumn('price', function(OrderedItem $data) {
                            return $data->total_price;
                        })
                        ->editColumn('details', function(OrderedItem $data) {
                            return ' <a href="' . route('item.details',$data->item->slug) . '"  target="__blank">'.$data->item->name.'</a>';
                        })
                        ->editColumn('date', function(OrderedItem $data) {
                            return date('M jS, Y', strtotime($data->created_at));
                        })
                        ->editColumn('ordernumber', function(OrderedItem $data) {
                            return $data->order->order_number;
                        })
                        ->editColumn('invoice', function(OrderedItem $data) {
                            return ' <a href="' . route('admin.order.invoice',$data->order->id) . '"  target="__blank">'.$data->invoice_number.'</a>';
                        })
                        ->editColumn('adminprofit', function(OrderedItem $data) {
                            return $data->admin_profit;
                        })

                        ->rawColumns(['price','invoice','ordernumber','date','details'])
                        ->toJson(); //--- Returning Json Data To Client Side



    }
            
}
