<?php

namespace App\Listeners;

use App\Events\CheckoutEvent;
use Illuminate\Support\Facades\Mail;

class SendEmailCheckout
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
     * @param  CheckoutEvent  $event
     * @return void
     */
    public function handle(CheckoutEvent $event)
    {
        $user=$event->getUser();
        $order=$event->getOrder();
        $cart=$event->getCart();

        Mail::send('emails.checkout', ['user' => $user,'order' => $order,'cart'=>$cart], function ($m) use ($user) {
            $m->from('contato@codecommerce.com', 'CodeCommerce');

            $m->to($user->email, $user->name)->subject('Dados de seu pedido!');
        });

    }
}
