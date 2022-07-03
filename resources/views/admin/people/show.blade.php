@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="d-flex justify-content-end">

                </div>
                <div class="card">
                    <div class="card-header">{{ __('People Detail') }}</div>

                    <div class="card-body">
                        <p><strong>Name :</strong> {{ $people->name }}</p>
                        <p><strong>Country :</strong> {{ $people->country->english_name }}</p>
                        <p><strong>Bio :</strong> {{ $people->bio }}</p>
                        <p><strong>BirthDay :</strong> {{ $people->birthday }}</p>
                        <p><strong>DeathDay :</strong> {{ $people->dethday }}</p>
                        <p><strong>Place of birth :</strong> {{ $people->place_of_birth }}
                        </p>
                        <p><strong>Gender :</strong> {{ $people->gender == '1' ? 'Female' : 'Male' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
