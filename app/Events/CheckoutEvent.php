<?php

namespace App\Events;

use Illuminate\Queue\SerializesModels;

class CheckoutEvent extends Event
{
    use SerializesModels;

    private $user;
    private $order;
    private $cart;

    public function __construct($user,$order,$cart)
    {
       $this->user=$user;
       $this->order=$order;
       $this->cart=$cart;
    }

    public function getUser(){
        return $this->user;
    }

    public function getOrder(){
        return $this->order;
    }

    public function getCart(){
        return $this->cart;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [];
    }
}
