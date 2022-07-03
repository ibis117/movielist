@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="d-flex justify-content-end">

                </div>
                <div class="card">
                    <div class="card-header">{{ __('Edit Movies') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form action="{{ route('movies.update', [$movie->id]) }}" method="post" class="row"
                            enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="mb-3 col-md-4">
                                <label class="form-label">Title</label>
                                <input type="text" class="form-control" placeholder="Enter the title" name="title"
                                    value="{{ $movie->title }}">
                            </div>

                            <div class="mb-3 col-md-4">
                                <label class="form-label">Country</label>
                                <select class="form-select" aria-label="Default select example" name="country_id">
                                    <option value="">Select Country</option>
                                    @foreach ($countries as $country)
                                        <option value="{{ $country->id }}"
                                            {{ $movie->country_id == $country->id ? 'selected' : '' }}>
                                            {{ $country->english_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3 col-md-12">
                                <label class="form-label">Tag Line</label>
                                <textarea name="tagline" cols="20" rows="2" class="form-control" placeholder="Write an Tag Line">{{ $movie->tagline }}</textarea>
                            </div>

                            <div class="mb-3 col-md-12">
                                <label class="form-label">Over View</label>
                                <textarea name="overview" id="" cols="20" rows="6" class="form-control"
                                    placeholder="Write an Overview">{{ $movie->overview }}</textarea>
                            </div>

                            <div class="mb-3 col-md-4">
                                <label class="form-label">Original Language</label>
                                <input type="text" class="form-control" placeholder="Enter the Original Language"
                                    name="original_language" value="{{ $movie->original_language }}">
                            </div>

                            <div class="mb-3 col-md-4">
                                <label class="form-label">Runtime</label>
                                <input type="number" class="form-control" placeholder="Enter the Original Language"
                                    name="runtime" value="{{ $movie->runtime }}">
                            </div>

                            <div class="mb-3 col-md-4">
                                <label class="form-label">Original Language</label>
                                <input type="date" class="form-control" placeholder="Enter the Original Language"
                                    name="release_date" value="{{ $movie->release_date }}">
                            </div>

                            <div class="mb-3 col-md-12">
                                <label class="form-label">Associated People</label>
                                <select class="form-select multiple-select-field" name="people[]"
                                    data-placeholder="Choose associated people" id="small-select2-options-multiple-field"
                                    multiple>
                                    @foreach ($people as $person)
                                        <option value="{{ $person->id }}"
                                            {{ in_array($person->id, $associated_people) ? 'selected' : '' }}>
                                            {{ $person->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>


                            <div class="mb-3 col-md-12">
                                <label for="formFile" class="form-label">Image</label>
                                <input class="form-control" type="file" name="image" id="formFile">
                                <img src="{{ asset('storage') . '/' . $movie->image }}" width="70" height="70">
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
