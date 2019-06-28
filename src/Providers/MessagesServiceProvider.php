<?php

namespace Bpartner\Messages\Providers;

use Bpartner\Messages\Messages;
use Illuminate\Support\ServiceProvider;

class MessagesServiceProvider extends ServiceProvider
{
    /**
     *Register Messages class.
     */
    public function register(): void
    {
        $this->app->bind(Messages::class, function () {
            return new Messages();
        });
    }
}
