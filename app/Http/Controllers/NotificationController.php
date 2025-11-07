<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    /**
     * Get all notifications for the logged-in admin.
     */
    public function index()
    {
        $admin = Auth::user(); // get the logged-in user

        // Just fetch all notifications for this user
        $notifications = Notification::where('user_id', $admin->user_id)
            ->where('read', 0) // only unread
            ->orderBy('created_at', 'desc')
            ->get();

        return response()->json($notifications);
    }

    /**
     * Mark a notification as read.
     */
    public function markAsRead($id)
    {
        $admin = Auth::user();

        $notification = Notification::where('id', $id)
            ->where('user_id', $admin->user_id)->where('read', 0)
            ->first();

        if (!$notification) {
            return response()->json(['message' => 'Notification not found'], 404);
        }

        $notification->update(['read' => 1,
        'read_at' => now()
        ]);

        return response()->json(['message' => 'Notification marked as read']);
    }

    /**
     * Optional: Create a new notification manually
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,user_id',
            'intervention_id' => 'required|exists:interventions,id',
            'message' => 'required|string',
            'type' => 'required|string',
            'related_id' => 'nullable|integer',
             'read' => 'nullable|boolean'
        ]);

        $notification = Notification::create([
            'user_id' => $request->user_id,
            'message' => $request->message,
            'type' => $request->type,
            'intervention_id' => $request->intervention_id,
            ]);
        return response()->json($notification, 201);

    }
}
