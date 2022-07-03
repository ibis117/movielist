@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="d-flex justify-content-end">

                </div>
                <div class="card">
                    <div class="card-header">{{ __('Movie Detail') }}</div>

                    <div class="card-body">
                        <p><strong>Title :</strong> {{ $movie->title }}</p>
                        <p><strong>OverView :</strong> {{ $movie->overview }}</p>
                        <p><strong>Orginial Language :</strong> {{ $movie->original_language }}</p>
                        <p><strong>Tagline :</strong> {{ $movie->tagline }}</p>
                        <p><strong>Image :</strong> <img width="75" height="75"
                                src="{{ asset('storage') . '/' . $movie->image }}" alt="">
                        </p>
                        <p><strong>Runtime :</strong> {{ $movie->runtime }}</p>
                        <p><strong>Release Date :</strong> {{ $movie->release_date }}</p>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
