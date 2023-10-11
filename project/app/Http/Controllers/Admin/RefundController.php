<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dispute;
use App\Models\Order;
use App\Models\OrderedItem;
use App\Models\User;
use Illuminate\Http\Request;
use Datatables;

class RefundController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function datatables()
    {
            $datas = OrderedItem::orderBy('id','desc')->where('refund_seen',1)->where('refund',0)->get();

            //--- Integrating This Collection Into Datatables
            return Datatables::of($datas)
                            ->addColumn('order_number', function(OrderedItem $data) {
                                return $data->order->order_number;
                            })
                            ->addColumn('date', function(OrderedItem $data) {

                                return date('d-M-Y',strtotime($data->created_at));
                             })


                            ->addColumn('total', function(OrderedItem $data) {
                                return $data->total_price;
                            })
                            ->editColumn('refund_seen', function(OrderedItem $data) {
                                if($data->refund==0) return '<span class="bg-primary text-white btn btn-sm" disabled >'.__('Pending').'</span>';
                                if($data->refund==1) return '<span class="bg-success text-white btn btn-sm" disabled >'. __("Approved").'</span>';
                                return '<span class="btn text-white bg-danger btn-sm" >'. __("Declined") .'</span>';

                            })
                            ->addColumn('view', function(OrderedItem $data) {
                                return '<div class="actions-btn"><a href="' . route('admin.refund.details',$data->id) . '" class="btn btn-primary btn-sm btn-rounded"> <i class="fas fa-eye"></i> '.__('View').'</a></div>';
                            })

                            ->rawColumns(['order_number','date','total','refund_seen','view'])
                            ->toJson(); //--- Returning Json Data To Client Side
    }
    public function index()
    {
        return view('admin.refund_order.index');
    }
    public function show($id)
    {
        $order=OrderedItem::findOrFail($id);
        $disputes=Dispute::where('orderedItem_id',$order->id)->get();
        return view('admin.refund_order.details',compact('order','disputes'));

    }
    public function refund_approve($id){
        $order=OrderedItem::findOrFail($id);
        $order->item->decrement('sell');
        $order->refund=1;
        $order->update();
        $user=$order->order->user;
        $user->balance=$user->balance+$order->total_price;
        $author=User::where('id',$order->author_id)->first();
        $author->balance=$author->balance-$order->author_profit;
        $user->update();
        $author->update();
        return redirect()->back()->with('success', 'Refund Approved ! ');
    }
    public function refund_decline($id){
        $order=OrderedItem::findOrFail($id);
        $order->refund=2;
        $order->update();
        return redirect()->back()->with('success', 'Refund Declined ! ');
    }

}
