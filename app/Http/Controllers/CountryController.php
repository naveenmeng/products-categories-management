<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class CountryController extends Controller
{
    public function index()
    {
        // Fetch data from the REST Countries API
        $response = Http::get('https://restcountries.com/v3.1/region/europe');


        if ($response->successful()) {
            $countries = $response->json(); // Decode JSON response
        } else {
            $countries = []; // Handle errors (optional)
        }

        // Pass the data to the view
        return view('api.index', ['countries' => $countries]);
    }
}
