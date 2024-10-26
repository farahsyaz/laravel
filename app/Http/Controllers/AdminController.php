<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Listing;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{
    // Display admin dashboard with user and listing counts
    public function index()
    {
        $usersCount = User::count();
        $listingsCount = Listing::count();
        return view('admin.dashboard', compact('usersCount', 'listingsCount'));
    }

    // Manage users with pagination
    public function users(Request $request)
    {
        // Get the search term from the request
        $search = $request->input('search');

        // Query the users with optional search filtering
        $users = User::when($search, function ($query, $search) {
            return $query->where('name', 'like', '%' . $search . '%')
                ->orWhere('email', 'like', '%' . $search . '%');
        })->paginate(10);

        return view('users.manage', compact('users', 'search'));
    }


    // Show user details
    public function show(User $user)
    {
        return view('users.show', ['user' => $user]);
    }

    // Manage listings with user information
    public function listings()
    {
        $listings = Listing::with('user')->paginate(15);
        return view('listings.manage', compact('listings'));
    }

    // Show edit form for user
    public function edit(User $user)
    {
        return view('users.edit', ['user' => $user]);
    }

    // Update user information
    public function update(Request $request, User $user): RedirectResponse
    {
        $formFields = $request->validate([
            'name' => 'required|string|max:255',
            'email' => ['required', 'email', Rule::unique('users')->ignore($user->id)],
            'password' => 'nullable|string|min:6|confirmed',
            'is_admin' => 'nullable|boolean'
        ]);

        // Only hash the password if it's being updated
        if ($request->filled('password')) {
            $formFields['password'] = Hash::make($formFields['password']);
        } else {
            unset($formFields['password']); // not include the password if it's not being updated
        }

        // Update the user with the validated fields
        $user->update($formFields);

        return redirect()->route('admin.users')->with('message', 'User updated successfully');
    }

    // Delete user
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('admin.users')->with('message', 'User deleted successfully');
    }
}
