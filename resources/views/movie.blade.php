@extends('layouts.frontend')

@section('content')
    <div class="row my-4">
        <div class="col-md-4">
            <img src="{{ asset('storage') . '/' . $movie->image }}" alt="{{ $movie->title }}" width="250px" height="300px">
            <div>
                <small>{{ $movie->tagline }}</small>
            </div>
        </div>
        <div class="col-md-8">
            <h3>{{ $movie->title }}</h3>

            <p>{{ $movie->overview }}</p>
            <p><span>Country:</span> {{ $movie->country->english_name }}</p>
            <p><span>Runtime:</span> {{ $movie->runtime }} min</p>
            <p><span>Release Date:</span> {{ $movie->release_date }}</p>
            <p><span>Original Language:</span> {{ $movie->original_language }}</p>

            <p><span>Cast: </span>

                @foreach ($movie->people as $person)
                    <a href="{{ route('person.show', $person->id) }}">{{ $person->name }}</a>
                    @if (!$loop->last)
                        ,
                    @endif
                @endforeach

            </p>

        </div>
    </div>
@endsection
