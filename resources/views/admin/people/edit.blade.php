@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="d-flex justify-content-end">

                </div>
                <div class="card">
                    <div class="card-header">{{ __('Edit People') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form action="{{ route('people.update', ['person' => $people->id]) }}" method="post"
                            class="row">
                            @csrf
                            @method('put')
                            <div class="mb-3 col-md-4">
                                <label class="form-label">Name</label>
                                <input type="text" class="form-control" placeholder="Enter the person name"
                                    name="name" value="{{ $people->name }}">
                            </div>

                            <div class="mb-3 col-md-4">
                                <label class="form-label">Country</label>
                                <select class="form-select" aria-label="Default select example" name="country_id">
                                    <option value="">Select Country</option>
                                    @foreach ($countries as $country)
                                        <option value="{{ $country->id }}"
                                            {{ $people->country_id == $country->id ? 'selected' : '' }}>
                                            {{ $country->english_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3 col-md-4">
                                <label class="form-label">Gender</label>
                                <select class="form-select" aria-label="Default select example" name="gender">
                                    <option value="">Select Gender</option>
                                    <option value="1" {{ $people->gender == '1' ? 'selected' : '' }}> Female
                                    </option>
                                    <option value="2" {{ $people->gender == '2' ? 'selected' : '' }}>Male</option>
                                </select>
                            </div>

                            <div class="mb-3 col-md-12">
                                <label class="form-label">Bio</label>
                                <textarea name="overview" id="" cols="20" rows="6" class="form-control" placeholder="Write a Bio">{{ $people->bio }}</textarea>
                            </div>

                            <div class="mb-3 col-md-4">
                                <label class="form-label">Place Of Birth</label>
                                <input type="text" class="form-control" placeholder="Enter the Original Language"
                                    name="place_of_birth" value="{{ $people->place_of_birth }}">
                            </div>

                            <div class="mb-3 col-md-4">
                                <label class="form-label">Birth Day</label>
                                <input type="date" class="form-control" name="birthday"
                                    value="{{ $people->birthday }}">
                            </div>

                            <div class="mb-3 col-md-4">
                                <label class="form-label">Death Day</label>
                                <input type="date" class="form-control" name="deathday"
                                    value="{{ $people->deathday }}">
                            </div>

                            <div class="mb-3 col-md-4">
                                <button type="submit" class="btn btn-success">Update</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
