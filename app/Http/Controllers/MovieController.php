<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Movie;
use App\Models\People;
use Illuminate\Http\Request;

class MovieController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $movies = Movie::with('country')->latest()->paginate(10);
        return view('admin.movies.index', compact('movies'));
    }

    public function edit(Movie $movie)
    {
        $associated_people = $movie->people()->pluck('people_id')->toArray();

        $countries = Country::all();
        $people = People::all();
        return view('admin.movies.edit', compact('movie', 'countries', 'people', 'associated_people'));
    }

    public function update(Movie $movie, Request $request)
    {
        $data = $request->except(['_token', '_method', 'people']);
        $people = $request->people;
        if ($movie->update($data)) {
            $movie->people()->sync($people);
            return to_route('movies.index')->with('status', 'Updated Successfully');
        }

    }

    public function create()
    {
        $countries = Country::all();
        $people = People::all();

        return view('admin.movies.create', compact('countries', 'people'));
    }

    public function store(Request $request)
    {
        $data = $request->except(['_token', '_method', 'people']);
        $people = $request->people;
        $movie = Movie::create($data);
        if ($movie) {
            $movie->people()->sync($people);
            return to_route('movies.index')->with('status', 'Saved Successfully');
        }
    }

    public function destroy(Movie $movie)
    {
        $movie->delete();
        return back()->with('status', 'Deleted Successfully');

    }

    public function show(Movie $movie)
    {
        return view('admin.movies.show', compact('movie'));
    }
}
