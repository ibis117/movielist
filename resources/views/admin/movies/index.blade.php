@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="d-flex justify-content-end">
                    <a href="{{ route('movies.create') }}" class="btn btn-primary mb-4">Add Movies</a>
                </div>
                <div class="card">
                    <div class="card-header">{{ __('Movies') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="table-responsive">
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">TagLine</th>
                                        <th scope="col">Runtime</th>
                                        <th scope="col">Release Date</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($movies as $movie)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $movie->title }}</td>
                                            <td><img src="{{ asset('storage/' . $movie->image) }}" height="60"
                                                    width="60"></td>
                                            <td>{{ $movie->tagline }}</td>
                                            <td>{{ $movie->runtime }}</td>
                                            <td>{{ $movie->release_date }}</td>
                                            <td>
                                                <div class="d-flex col">
                                                    <a href="{{ route('movies.edit', ['movie' => $movie->id]) }}"
                                                        class="btn btn-primary btn-sm mx-1">Edit</a>
                                                    <a href="{{ route('movies.show', ['movie' => $movie->id]) }}"
                                                        class="btn btn-success btn-sm mx-1">View</a>
                                                    <form action="{{ route('movies.destroy', [$movie->id]) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="btn btn-danger btn-sm mx-1"
                                                            type="submit">Delete</button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            {{ $movies->links() }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
