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
        \Log::info('Admin user:', ['user' => $admin]);
        // Just fetch all notifications for this user
        $notifications = Notification::where('user_id', $admin->user_id)
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
            ->where('user_id', $admin->user_id)
            ->first();

        if (!$notification) {
            return response()->json(['message' => 'Notification not found'], 404);
        }

        $notification->update(['read_at' => now()]);

        return response()->json(['message' => 'Notification marked as read']);
    }

    /**
     * Optional: Create a new notification manually
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'nullable|exists:users,user_id',
            'message' => 'required|string|max:255',
            'type' => 'nullable|string|max:100',
            'related_id' => 'nullable|integer',
        ]);

        $notification = Notification::create([
            'user_id' => $request->user_id,
            'message' => $request->message,
            'type' => $request->type,
            'related_id' => $request->related_id,
        ]);

        return response()->json($notification, 201);
    }
}
