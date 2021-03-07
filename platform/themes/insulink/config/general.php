<?php

use Theme\Insulink\Notifications\ConfirmEmailNotification;

return [

    /*
    |--------------------------------------------------------------------------
    | Notification
    |--------------------------------------------------------------------------
    |
    | This is the notification class that will be sent to users when they receive
    | a confirmation code.
    |
    */
    'notification' => ConfirmEmailNotification::class,

    'verify_email' => env('VERIFY_EMAIL', true),
];
