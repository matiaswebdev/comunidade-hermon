<?php

namespace App\Listeners;

use App\Events\SaidaDeInterno;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Internamentos;

class RegistrarHistoricoDeInternamento
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
     * @param  SaidaDeInterno  $event
     * @return void
     */
    public function handle(SaidaDeInterno $event)
    {
        $interno = $event->interno;
        
        Internamentos::create([
            'users_id' => $interno->id,
            'data_entrada' => $interno->data_entrada,
            'data_saida' => $interno->data_saida
        ]);
    }
}
