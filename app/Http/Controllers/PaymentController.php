<?php

namespace App\Http\Controllers;

use App\Events\ProductPurchased;
use App\Notifications\PaymentReceived;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class PaymentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('payments.create');
    }

    public function store()
    {
//        Notification::send(request()->user(), new PaymentReceived());
        request()->user()->notify(new PaymentReceived(900));
    }

    public function testEvent()
    {
        return view('payments.test-event');
    }

    public function processEvent()
    {
        // process the payment
        // unlock the purchase

        ProductPurchased::dispatch('toy');
        // notify the user about the payment
        // award achievements
        // send shareable coupon to user
    }
}
