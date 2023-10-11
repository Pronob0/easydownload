<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\AuthorBadge;
use App\Models\Generalsetting;
use App\Models\User;
use App\Models\Withdraw;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WithdrawController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data['withdraws'] = Withdraw::where('user_id', '=', Auth::guard('web')->user()->id)->orderBy('id', 'desc')->get();
        return view('user.withdraw.index', $data);
    }

    public function request()
    {
        $data['user']=Auth::user();
        $data['badges']=AuthorBadge::where('status',1)->orderBy('days','DESC')->orderBy('time','DESC')->get();
        return view('user.withdraw.request',$data);
    }

    public function sendRequest(Request $request)
    {
        $from = User::findOrFail(Auth::guard('web')->user()->id);

        $withdrawcharge = Generalsetting::findOrFail(1);
        $charge = $withdrawcharge->withdraw_fee;

        if ($request->amount > 0) {

            $amount = $request->amount;

            if ($from->balance >= $amount) {
                $fee = (($withdrawcharge->withdraw_charge / 100) * $amount) + $charge;
                $finalamount = $amount - $fee;
                if ($from->balance >= $finalamount) {
                    $finalamount = number_format((float) $finalamount, 2, '.', '');

                    $from->balance = $from->balance - $amount;
                    $from->update();

                    $newwithdraw = new Withdraw();
                    $newwithdraw['user_id'] = Auth::guard('web')->user()->id;
                    $newwithdraw['method'] = $request->methods;
                    $newwithdraw['acc_email'] = $request->acc_email;
                    $newwithdraw['iban'] = $request->iban;
                    $newwithdraw['country'] = $request->acc_country;
                    $newwithdraw['acc_name'] = $request->acc_name;
                    $newwithdraw['address'] = $request->address;
                    $newwithdraw['swift'] = $request->swift;
                    $newwithdraw['reference'] = $request->reference;
                    $newwithdraw['amount'] = $finalamount;
                    $newwithdraw['fee'] = $fee;
                    $newwithdraw->save();

                    $msg = 'Withdraw Request Sent Successfully.';
                    return response()->json($msg);

                } else {
                    return response()->json(array('errors' => [ 0 => 'Insufficient Balance.' ]));

                }
            } else {
                return response()->json(array('errors' => [ 0 => 'Insufficient Balance.' ]));
            }
        }
        return response()->json(array('errors' => [ 0 => 'Please enter a valid amount.' ]));
    }
}
