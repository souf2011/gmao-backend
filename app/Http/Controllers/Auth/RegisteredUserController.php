<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Notification; // ✅ Import Notification model
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'phone' => ['required', 'string', 'max:20'],
            'address' => ['required', 'string', 'max:255'],
            'birthdate' => ['required', 'date'],
            'role' => ['required', 'string'],
            'img' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
        ]);

        // ✅ Handle image upload only once
        $imagePath = $request->file('img')->store('images', 'public');

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'phone' => $request->phone,
            'address' => $request->address,
            'birthdate' => $request->birthdate,
            'password' => Hash::make($request->password),
            'img' => $imagePath,
            'confirmed'=> false
        ]);

        // ✅ Notify all admins
        $admins = User::where('role', 'admin')->get();

            Notification::create([
                'user_id' => null,
                'message' => "Nouvelle inscription de {$user->name}",
                'type' => 'new-user',
                'related_id' => $user->id
            ]);


        // Fire Laravel's registered event
        event(new Registered($user));

        // Optional: log in the new user
        Auth::login($user);

        return response()->json([
            'message' => 'Inscription en attente de confirmation'
        ]);
    }
}
