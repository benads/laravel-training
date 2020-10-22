<?php

namespace App\Listeners;

use App\Events\UserIsConnected;
use Illuminate\Support\Facades\Log;

class UpdateStatusUser
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\UserIsConnected  $event
     * @return void
     */
    public function handle(UserIsConnected $event)
    {
        $event->user->update(['isConnected' => true]);
    }
}