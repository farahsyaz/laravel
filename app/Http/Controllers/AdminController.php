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

    public function index()
    {
        $usersCount = User::count();
        $listingsCount = Listing::count();
        return view('admin.dashboard', compact('usersCount', 'listingsCount'));
    }

    public function users()
    {
        $users = User::paginate(10);
        return view('admin.users.manage', compact('users'));
    }

    public function show(User $user)
    {
        return view('admin.users.show', ['user' => $user]);
    }

    public function listings()
    {
        $listings = Listing::with('user')->paginate(15);
        return view('admin.listings', compact('listings'));
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', ['user' => $user]);
    }

    public function update(Request $request, User $user): RedirectResponse
    {
        $formFields = $request->validate([
            'name' => 'required|string|max:255',
            'email' => ['required', 'email', Rule::unique('users')->ignore($user->id)],
            'password' => 'nullable|string|min:6|confirmed',
            'is_admin' => 'nullable|boolean'
        ]);

        if ($request->filled('password')) {
            $formFields['password'] = Hash::make($formFields['password']);
        } else {
            unset($formFields['password']);
        }

        $user->update($formFields);

        return redirect()->route('admin.users')->with('message', 'User updated successfully');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('admin.users')->with('message', 'User deleted successfully');
    }
}
