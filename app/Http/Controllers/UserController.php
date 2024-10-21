<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Show the registration/create form.
     *
     * @return View
     */
    public function create(): View
    {
        return view('user.register');
    }

    /**
     * Create a new user.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'confirmed', 'min:6']
        ]);

        // Hash the password
        $formFields['password'] = bcrypt($formFields['password']);

        // Create the user
        $user = User::create($formFields);

        // Log the user in
        auth()->login($user);

        return redirect('/')->with('message', 'User created and logged in');
    }

    /**
     * Logout the user.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function logout(Request $request): RedirectResponse
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'You have been logged out');
    }

    /**
     * Show the login form.
     *
     * @return View
     */
    public function login(): View
    {
        return view('user.login');
    }

    /**
     * Authenticate the user.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            if (Auth::user()->is_admin) {
                return redirect()->route('admin.dashboard');
            }

            return redirect()->intended('/');
        }

        return redirect()->back()->withErrors([
            'invalid' => 'Invalid credentials',
        ])->withInput();
    }

    public function edit()
    {
        return view('users.edit', ['user' => auth()->user()]);
    }

    public function update(Request $request)
    {
        $user = auth()->user();

        $formFields = $request->validate([
            'name' => 'required|string|max:255',
            'email' => ['required', 'email', Rule::unique('users')->ignore($user->id)],
            'password' => 'nullable|string|min:6|confirmed',
        ]);

        if ($request->filled('password')) {
            $formFields['password'] = Hash::make($formFields['password']);
        } else {
            unset($formFields['password']);
        }

        $user->update($formFields);

        return redirect()->route('user.profile')->with('message', 'Profile updated successfully');
    }

    public function destroy()
    {
        $user = auth()->user();
        auth()->logout();
        $user->delete();

        return redirect('/')->with('message', 'Your account has been deleted');
    }
}
