<?php

namespace App\Listeners;

use Mail;
use App\Events\UserWasBanned;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\User;

class EmailBanNotification
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
     * @param  UserWasBanned  $event
     * @return void
     */
    public function handle(UserWasBanned $event)
    {
        $user = $event->user->toArray();

        Mail::send('emails.welcome', ['user' => $user], function ($message) {
            $message->from('us@example.com', 'Laravel');
        
            $message->to('hello@example.com')->cc('bar@example.com');
        });
    }
}
