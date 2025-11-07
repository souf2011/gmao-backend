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
                'first_name' => ['required', 'string', 'max:255'],
                'last_name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users,email'],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
                'phone' => ['required', 'string', 'max:20'],
                'address' => ['required', 'string', 'max:255'],
                'birthdate' => ['required', 'date'],
                'etablissement_id' => ['nullable', 'integer', 'exists:etablissements,id'],
            ]);

            // ✅ Handle image upload only once


            $user = User::create([
                'first_name' => $request->first_name,
                'last_name'=> $request->last_name,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'birthdate' => $request->birthdate,
                'password' => Hash::make($request->password),
                'role_id' => $request->role_id,             // nullable
                'service_id' => $request->service_id,       // nullable
                'etablissement_id' => $request->etablissement_id, // nullable
                'confirmed'=> false

            ]);

            // ✅ Notify all admins
            $admins = User::where('role_id', 1)->get();

            foreach ($admins as $admin) {
                Notification::create([
                    'user_id' => $admin->user_id,  // admin who will receive the notification
                    'message' => "Nouvelle inscription de {$user->first_name} {$user->last_name}",
                    'type' => 'new-user',
                    'related_id' => $user->user_id,
                ]);
            }


            // Fire Laravel's registered event
            event(new Registered($user));

            // Optional: log in the new user

            return response()->json([
                'message' => 'Inscription en attente de confirmation'
            ]);
        }
    }
