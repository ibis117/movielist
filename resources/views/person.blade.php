@extends('layouts.frontend')

@section('content')
    <div class="row my-4">
        <h3>{{ $person->name }}</h3>
        <p>{{ $person->bio }}</p>
        <p><span>BirthDay:</span> {{ $person->birthday }}</p>
        <p><span>Place of Birth:</span> {{ $person->place_of_birth }}</p>
        <p><span>Country:</span> {{ $person->country->english_name }}</p>
        <p><span>Gender:</span> {{ $person->gender == 1 ? 'Femail' : 'Male' }}</p>
        @if ($person->deathday)
            <p><span>DeathDay:</span> {{ $person->deathday }}</p>
        @endif
    </div>

    <div class="row mb-4">
        <h4>Movies</h4>

        @foreach ($person->movies as $movie)
            <div class="col-md-3">
                <img src="{{ asset('storage') . '/' . $movie->image }}" width="200" height="250"
                    alt="{{ $movie->title }}">
                <p><a href="{{ route('movie.show', $movie->id) }}">{{ $movie->title }}</a></p>

            </div>
        @endforeach

    </div>
@endsection
