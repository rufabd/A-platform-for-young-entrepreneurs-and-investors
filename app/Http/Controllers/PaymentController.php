<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function index() {
        return view('payment');
    }

    public function charge(Request $request)
{
    $charge = Stripe::charges()->create([
        'currency' => 'USD',
        'source' => $request->stripeToken,
        'amount'   => 10,
        'description' => ' Subscription'
    ]);
    $payments = new Payment();
    $payments->user_id = Auth::user()->id;   
    $payments->amount = 10;    
    $payments->save();
    User::where('id', Auth::user()->id)->update(array('paid' => true));
    $chargeId = $charge['id'];
    // $chargeId = $charge['id'];

    if ($chargeId) {
     return redirect('/dashboard/profile/investor');
    } else {
        return redirect()->back();
    }
  }
}
