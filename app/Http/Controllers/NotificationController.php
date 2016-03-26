<?php

namespace App\Http\Controllers;

use App\Notification;
use Illuminate\Http\Request;

use App\Http\Requests;

class NotificationController extends Controller
{
    public function deleteIndex(Notification $notification)
    {
        $notification->delete();
        return redirect()->back()
            ->with('message', 'Notificación eliminada exitosamente');
    }
}
