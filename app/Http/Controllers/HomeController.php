<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Movie;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $movies = Movie::with('country')->latest()->paginate(10);
        return view('home', compact('movies'));
    }

    public function edit(Movie $movie)
    {
        $countries = Country::all();
        return view('admin.movies.edit', compact('movie', 'countries'));
    }

    public function update(Movie $movie, Request $request)
    {
        $data = $request->except(['_token', '_method']);
        if ($movie->update($data)) {
            return redirect('/movies')->with('status', 'Updated Successfully');
        }

    }

    public function create()
    {
        $countries = Country::all();

        return view('admin.movies.create', compact('countries'));
    }

    public function store(Request $request)
    {
        $data = $request->except(['_token', '_method']);
        // dd($data);
        $movie = Movie::create($data);
        if ($movie) {
            return redirect('/movies')->with('status', 'Saved Successfully');
        }

    }
}
