<?php

namespace App\Http\Controllers;

    use App\Models\Notification;
    use App\Models\User;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::where('confirmed',1)->with(['role','service'])
            ->orderBy('created_at', 'desc')
            ->get();
        return response()->json($users);
    }

    public function show(User $user) // type-hinting automatically resolves {user}
    {
        $user->load(['role', 'service']); // eager load relationships
        return response()->json($user);
    }


    public function store(Request $request)
    {
        $data = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:4',
            'role_id' => 'required|integer',
            'service_id' => 'required|integer',
            'etablissement_id' => 'required|integer',
            'address' => 'string|max:255',
            'birthdate' => 'date',
            'phone' => 'required|string|max:15'
        ]);

        $data['password'] = Hash::make($data['password']);

        $user = User::create($data);

        return response()->json([
            'message' => 'User created successfully',
            'data' => $user
        ], 201);
    }

    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->user_id.',user_id',
            'password' => 'nullable|string|min:4',
            'role_id' => 'required|integer|exists:roles,role_id',
            'service_id' => 'required|integer|exists:services,service_id',
        ]);

        if (!empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }

        $user->update($data);

        return response()->json([
            'message' => 'User updated successfully',
            'data' => $user->load(['role', 'service'])
        ]);
    }


    public function destroy($id)
    {
        try {
            $user = User::findOrFail($id);
            $user->delete();
            return response()->json(['message' => 'User deleted successfully']);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to delete user',
                'error' => $e->getMessage()
            ], 500);
        }
    }
    public function confirm(Request $request, $id)
    {
        $admin = Auth::user();

        if (!$admin || $admin->role->role !== 'ADMIN') {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $request->validate([
            'role_id' => 'required|exists:roles,role_id',
            'service_id' => 'required|exists:services,service_id',
        ]);

        $user = User::find($id);
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $user->update([
            'confirmed' => 1,
            'role_id' => $request->role_id,
            'service_id' => $request->service_id,
        ]);
        Notification::where('related_id', $user->user_id)
            ->where('type', 'new-user')
            ->delete();
        return response()->json(['message' => 'Utilisateur confirmé avec succès', 'user' => $user]);
    }

    public function register(Request $request)
    {
        // Create user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        // Create notification for admin
        Notification::create([
            'user_id' => 1, // Admin user ID
            'message' => "New user registered: {$user->name}",
            'is_read' => false
        ]);

        return response()->json([
            'success' => true,
            'message' => 'User registered and notification sent to admin.'
        ]);
    }
}
