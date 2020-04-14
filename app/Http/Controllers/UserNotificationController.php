<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserNotificationController extends Controller
{
    public function show()
    {
//        $notifications = auth()->user()->unreadNotifications;
        $notifications = tap(auth()->user()->unreadNotifications)->markAsRead();

//        $notifications->markAsRead();

        return view('notifications.show', [
            'notifications' => $notifications
        ]);
    }
}
