<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class ListingController extends Controller
{
    //show all listings
    public function index()
    {
        $search = request('search'); // Get the search query

        return view('listings.index', [
            'listings' => Listing::latest()->filter(request(['tag', 'search']))->paginate(6), // This line remains as is.
            'search' => $search // Pass the search term to the view
        ]);
    }

    //show single listins
    public function show(Listing $listing)
    {
        return view('listings.show', [
            'listing' => $listing
        ]);
    }

    //create job post
    public function create()
    {
        return view('listings.create');
    }

    //store job data
    public function store(Request $request)
    {

        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required', Rule::unique('listings', 'company')],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
        ]);

        if ($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $formFields['user_id'] = auth()->id();

        Listing::create($formFields);

        return redirect('/')->with('message', 'Listing created successfully');
    }

    // Show Edit form
    public function edit(Listing $listing)
    {
        return view('listings.edit', compact('listing'));
    }

    // Update Listing Data
    public function update(Request $request, Listing $listing)
    {
        // Allow update if the user is the owner or an admin
        if ($listing->user_id != auth()->id() && !auth()->user()->is_admin) {
            abort(403, 'Unauthorized Action');
        }

        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required'],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
        ]);

        // Handle logo upload if present
        if ($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        // Update the listing with validated fields
        $listing->update($formFields);

        return redirect('/')->with('message', 'Listing updated successfully');
    }


    // Delete Listing
    public function destroy(Listing $listing)
    {
        // Allow deletion if the user is the owner or an admin
        if ($listing->user_id != auth()->id() && !auth()->user()->is_admin) {
            abort(403, 'Unauthorized Action');
        }

        $listing->delete();
        return redirect()->route('listings.manage')->with('message', 'Listing deleted successfully');
    }

    // Mange Listing
    public function manage()
    {
        $search = request('search'); // Get the search query

        // Check if the user is an admin
        if (auth()->user()->is_admin) {
            // Get paginated listings with search functionality
            $listings = Listing::when($search, function ($query) use ($search) {
                return $query->where('title', 'like', '%' . $search . '%')
                    ->orWhere('company', 'like', '%' . $search . '%')
                    ->orWhere('location', 'like', '%' . $search . '%');
            })->paginate(10);
        } else {
            // Get only the paginated listings belonging to the user if not an admin
            $listings = auth()->user()->listings()->when($search, function ($query) use ($search) {
                return $query->where('title', 'like', '%' . $search . '%')
                    ->orWhere('company', 'like', '%' . $search . '%')
                    ->orWhere('location', 'like', '%' . $search . '%');
            })->paginate(10);
        }

        return view('listings.manage', [
            'listings' => $listings,
            'search' => $search // Pass the search term to the view
        ]);
    }
}
