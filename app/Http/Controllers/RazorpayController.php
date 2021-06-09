<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Payment;
use App\Models\Subscription;
use App\Models\Transaction;
use Razorpay\Api\Api;
use Illuminate\Support\Str;
use Auth;
use Carbon\Carbon;


class RazorpayController extends Controller
{
    private $razorpayId = "rzp_test_n0hJGL7Dvs9nK1";
    private $razorpayKey = "sD1grDLv7pUEsLhLiF3KSodd";
    private $amount = '';

    public function Initiate(Request $request) {
        $receiptId = Str::random(20);
        $api = new Api($this->razorpayId,$this->razorpayKey);
        $order = $api->order->create(array(
            'receipt' => $receiptId,
            'amount' => $request->all()['amount'] *100,
            'currency' => 'INR'
        ));

        $this->amount = $request->all()['amount'] *100;

        //dd($request->all());

        $response = [
            'orderId' => $order['id'],
            'razorpayId' => $this->razorpayId,
            'amount' => $request->all()['amount'],
            'name' => $request->all()['name'],
            'currency' => 'INR',
            'email' => $request->all()['email'],
            'contactNumber' => $request->all()['contactNumber'],
            'duration' => $request->all()['duration'],
            'interval' => $request->all()['interval'],
            'description' => 'Testing description',
        ];

        return view('payment-page',compact('response'));

    }


    public function renewPayment() {
        return route('payment.initiate');
    }

   

    //
    public function razorpayProduct() {
        return view('payments.razorpay');
    }

    public function razorPaySucces(Request $request) {
        $data = [
            'user_id' => '1',
            'payment_id' => $request->payment_id,
            'amount' => $request->amount
        ];

    }

    public function Complete(Request $request)
{
    //dd($request->all());
    // Now verify the signature is correct . We create the private function for verify the signature
    $signatureStatus = $this->SignatureVerify(
        $request->all()['rzp_signature'],
        $request->all()['rzp_paymentid'],
        $request->all()['rzp_orderid']
    );

    // If Signature status is true We will save the payment response in our database
    // In this tutorial we send the response to Success page if payment successfully made
    if($signatureStatus == true)
    {
        $transaction = new Transaction;
        $transaction->user_id = Auth::id();
        $transaction->amount = $request->all()['amount'];
        $transaction->paid_on = Carbon::now();
        $transaction->status = 'success';

        //$transaction->save();
        
        $subs = Subscription::where('user_id',Auth::id())->first();

       

        
        if($subs != null) {
            
            $expire_date = Carbon::parse($subs->expires);

            if($request->interval == 'years') {
               

                $transaction->expires = $expire_date->addYear($request->duration);
               

                        
                $transaction->save();

                $expire_date = Carbon::parse($subs->expires);



                Subscription::where('user_id',Auth::id())
                                     ->update([
                                      'paid_on' => Carbon::now(),
                                      'amount' => $request->all()['amount'],
                                      'status' => 'success',
                                      'expires'=> $expire_date->addYear($request->duration)]);


                        
            } else {
                //error_log('months');


                $transaction->expires = $expire_date->addMonths($request->duration);
                //dd($transaction->expires);

              
                $transaction->save();

                $expire_date = Carbon::parse($subs->expires);


                Subscription::where('user_id',Auth::id())   
                ->update([
                'paid_on' => Carbon::now(),
                'amount' => $request->all()['amount'],
                'status' => 'success',
                'expires' => $expire_date->addMonths($request->duration)]);



            }
        } 

        else {
                //error_log('its null');
                //dd('null');

                $subscription = new Subscription();
                $subscription->user_id = Auth::id();
                $subscription->from = 'razorpay';
                $subscription->paid_on = Carbon::now();
                $subscription->amount = $request->all()['amount'];
                //$subscription->amount = $this->amount;
                $subscription->status = 'success';
                $subscription->references = 'razorpay';

                //$checkExpiry = Subscription::where('user_id',Auth::id())->get('expires');
                if($request->interval == 'years') {
                    $subscription->expires = Carbon::now()->addYear($request->duration);
                    $transaction->expires = Carbon::now()->addYear($request->duration);
                }
                else { 
                    $subscription->expires = Carbon::now()->addMonths($request->duration);

                    $transaction->expires = Carbon::now()->addMonths($request->duration);
                }

                $subscription->save();
                $transaction->save();

        }
        return view('payment-success-page');


    }
    else{
       
        return view('payment-failed-page');
    }
}

// In this function we return boolean if signature is correct
private function SignatureVerify($_signature,$_paymentId,$_orderId)
{
    try
    {
        // Create an object of razorpay class
        $api = new Api($this->razorpayId, $this->razorpayKey);
        $attributes  = array('razorpay_signature'  => $_signature,  'razorpay_payment_id'  => $_paymentId ,  'razorpay_order_id' => $_orderId);
        $order  = $api->utility->verifyPaymentSignature($attributes);
        return true;
    }
    catch(\Exception $e)
    {
        // If Signature is not correct its give a excetption so we use try catch
        return false;
    }
}


}
