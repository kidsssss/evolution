<?php

namespace App\Listeners;

use App\Events\Order;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;
class SendUserConfirmation
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  Order  $event
     * @return void
     */
    public function handle(Order $event)
    {
        $order = $event->order;
        $email = $order->email;
        Mail::send('admin.email',['name'=>$order->name],function($m) use ($contact_message){
            $m->from('infomation@evolution.com','Evolution');
            $m->to($email,$order->name);
            $m->subject('Thank you');
        })
    }
}
