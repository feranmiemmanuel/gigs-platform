<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    public function index()
    {
        $listings = Listing::latest()->filter(request(['tag', 'search']))->paginate(2);
        return view('listings.index', ['listings' => $listings]);
    }
    public function show(Listing $listing)
    {
        return view('listings.show', ['listing' => $listing]);
    }
    public function create()
    {
        return view('listings.create');
    }
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'title' => 'required',
            'tags' => 'required',
            'company' => 'required',
            'email' => 'required|email',
            'website' => 'required',
            'location' => 'required',
            'description' => 'required',
        ]);
        Listing::create($formFields);
        return redirect('/')->with('message', 'Job Listing Created Successfully');
    }
}
