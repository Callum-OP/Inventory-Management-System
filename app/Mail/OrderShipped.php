<?php

namespace App\Mail;

use App\Inventory;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderShipped extends Mailable
{
    use Queueable, SerializesModels;

    public $order;
    public $quantity;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Inventory $order, $quantity)
    {
        $this->order = $order;
        $this->quantity = $quantity;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.order');
    }
}
