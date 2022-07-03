<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Movie;
use App\Models\People;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index(Request $request)
    {
        $country_id = $request->country_id;
        $people_id = $request->people_id;
        $search = $request->title;

        $movies = Movie::search($country_id, $people_id, $search)->paginate(10);
        $countries = Country::all();
        $people = People::all();

        return view('welcome', compact('movies', 'countries', 'people'));
    }

    public function showMovie($id)
    {
        $movie = Movie::find($id);
        return view('movie');
    }
}
