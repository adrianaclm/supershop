<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Pedido;
use App\Models\Produto;
use App\Models\Detalle;

class OrdenCreada extends Mailable
{
    use Queueable, SerializesModels;
    
    /**
     * The pedido instance.
     *
     * @var \App\Models\Pedido
     */

    public $pedido;
    public $producto;
    public $detalle;

    /**
     * Create a new message instance.
     *
     * @param  \App\Models\Pedido  $pedido
     * @return void
     */

    public function __construct(Pedido $pedido)
    {
        $this->pedido = $pedido ;
        $this->detalle;
        $this->producto;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            //from: new Address('',''),
           
            subject: 'Orden Creada Exitosamente'
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
            with: [
                'orderName' => $this->pedido->cedula,
                'orderPrice' => $this->pedido->total,
            ],
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
