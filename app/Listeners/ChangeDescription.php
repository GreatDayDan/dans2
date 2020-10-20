<?php

namespace App\Listeners;

use App\Events\EventIdChanged;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ChangeDescription
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
     * @param  EventIdChanged  $event
     * @return void
     */
    public function handle(EventIdChanged $event)
    {
        //
    }
}
