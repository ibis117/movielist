@extends('layouts.frontend')

@section('content')
    <div class="row mb-4">
        <div class="card">
            <div class="card-header">
                Advance Search
            </div>
            <div class="card-body">
                <form action="/" class="row" method="get">
                    <div class="mb-3 col-md-4">
                        <label class="form-label">Country</label>
                        <select class="form-select" name="country_id">
                            <option value="">Select Country</option>
                            @foreach ($countries as $country)
                                <option value="{{ $country->id }}">{{ $country->english_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3 col-md-4">
                        <label class="form-label">People</label>
                        <select class="form-select" name="people_id">
                            <option value="">Select People</option>
                            @foreach ($people as $person)
                                <option value="{{ $person->id }}">{{ $person->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3 col-md-4">
                        <label class="form-label">Movie</label>
                        <input type="text" name="title" class="form-control" placeholder="Search by Movie Title">
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-success">Search</button>
                        <a href="/" class="btn btn-secondary">Reset</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @foreach ($movies as $movie)
        <div class="col-md-3 mb-2">
            <img src="{{ asset('storage') . '/' . $movie->image }}" alt="{{ $movie->title }}" width="170px"
                height="200px">
            <p><a href="{{ route('movie.show', $movie->id) }}">{{ $movie->title }}</a>
            </p>
        </div>
    @endforeach
    {{ $movies->links() }}
@endsection
