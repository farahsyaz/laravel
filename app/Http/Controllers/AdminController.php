<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Listing;

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
        $users = User::paginate(15);
        return view('admin.users', compact('users'));
    }

    public function listings()
    {
        $listings = Listing::with('user')->paginate(15);
        return view('admin.listings', compact('listings'));
    }
}
