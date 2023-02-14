<?php

namespace App\Mail;

use App\Models\Configuracion;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Pedido;
use App\Models\Produto;
use App\Models\Detalle;
use App\Models\Producto;
use App\Models\User;

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
    public $user;
    public $configuracion;

   

    /**
     * Create a new message instance.
     *
     * @param  \App\Models\Pedido  $pedido
     * @param  \App\Models\User  $pedido

     * @return void
     */

    public function __construct(Pedido $pedido, User $user)
    {
        $this->pedido = $pedido;
        $this->user = $user;
        $this->producto;
        //Detalle::select('productos.id', 'productos.nombre', 'detalles.cantidad', )
        // ->join('productos', 'detalles.producto_id', '=', 'productos.id')
        // ->where('detalles.pedido_id', '=', $pedido)->get();
        // $this->user = User::select('users.name', 'users.address', 'users.id', 'users.lastname', 'users.telefono')
        // ->join('pedidos', 'users.coduser_id', '=', 'pedidos.cart_id')
        // ->where('pedidos.id', '=', $pedido)
        // ->first();
        $this->configuracion = Configuracion::select('logo')->get();
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
           
            subject: 'Orden de Compra Creada Exitosamente'
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
                'logo'      => $this->configuracion,
                'userName' => $this->user->name,
                'orderPrice' => $this->pedido->total,
                'productoName' => $this->producto->pNombre,
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
