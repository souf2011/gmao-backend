<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notification;

class NotificationController extends Controller
{
    /**
     * Get all notifications (Admin view).
     */
    public function index()
    {
        $userId = auth()->id();

        $notifications = Notification::where(function($query) use ($userId) {
            $query->where('user_id', $userId)
                ->orWhereNull('user_id');
        })
            ->orderBy('created_at', 'desc')
            ->get();

        return response()->json($notifications);
    }

    /**
     * Store a new notification (triggered when a user registers or other events).
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'nullable|exists:users,id', // user linked to the notification
            'message' => 'required|string|max:255',
            'type' => 'nullable|string|max:50', // e.g., 'user_registration'
        ]);

        $notification = Notification::create([
            'user_id' => $validated['user_id'] ?? null,
            'message' => $validated['message'],
            'type' => $validated['type'] ?? null,
            'is_read' => false
        ]);

        return response()->json($notification, 201);
    }

    /**
     * Mark a notification as read.
     */
    public function markAsRead($id)
    {
        $notification = Notification::findOrFail($id);
        $notification->is_read = true;
        $notification->save();

        return response()->json(['message' => 'Notification marked as read']);
    }

    /**
     * Delete a notification.
     */
    public function destroy($id)
    {
        $notification = Notification::findOrFail($id);
        $notification->delete();

        return response()->json(['message' => 'Notification deleted']);
    }

    /**
     * Get all unread notifications (for Admin).
     */
    public function unread()
    {
        return Notification::where('is_read', false)->orderBy('created_at', 'desc')->get();
    }
}
