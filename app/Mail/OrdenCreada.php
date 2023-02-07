<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Darryldecode\Cart\Cart;
use App\Models\Pedido;
use Darryldecode\Cart\CartCollection;

class OrdenCreada extends Mailable
{
    use Queueable, SerializesModels;
    
    /**
     * The pedido instance.
     *
     * @var \App\Models\Pedido
     */

    public $pedido;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->pedido ;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        //$_SESSION =  csrf_token();
        //$pedido = Pedido::where('cart_id', '=', $_SESSION)->first();

        return new Envelope(
            //from: new Address('',''),
           
            subject: 'Orden Creada'
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        // $cartCollection = \Cart::getContent();
        return new Content(
            view: 'email.ordenCreada',
            // with: [
            //     'orderName' => $this->pedido->cedula,
            //     'orderPrice' => $this->pedido->total,
            // ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
