<?php

namespace App\Listeners;

use App\Events\SendMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

use App\User;
use Mail;

class SendMailFired
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
     * @param  SendMail  $event
     * @return void
     */
    public function handle(SendMail $event)
    {
        $user = User::find($event->userId)->toArray();

        Mail::send('emails.mailEvent', $user, function($message) use ($user) {
            $message->to($user['email'], $user['name']);
            $message->subject('Event Testing');
            $message->from("prueba@gmail.com","Test Mail");

        });
    }
}
