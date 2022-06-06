<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    public function index()
    {
        $listings = Listing::all();
        return view('listings', ['listings' => $listings]);
    }
    public function show(Listing $listing)
    {
        return view('listing', ['listing' => $listing]);
    }
}
