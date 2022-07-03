@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="d-flex justify-content-end">
                    <a href="{{ route('people.create') }}" class="btn btn-primary mb-4">Add People</a>
                </div>
                <div class="card">
                    <div class="card-header">{{ __('People') }}</div>

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
                                        <th scope="col">Name</th>
                                        <th scope="col">Birth Day</th>
                                        <th scope="col">Place Of Birth</th>
                                        <th scope="col">Country</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($people as $person)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $person->name }}</td>
                                            <td>{{ $person->birthday }}</td>
                                            <td>{{ $person->place_of_birth }}</td>
                                            <td>{{ $person->country->english_name }}</td>
                                            <td>
                                                <div class="d-flex col">
                                                    <a href="{{ route('people.edit', [$person->id]) }}"
                                                        class="btn btn-primary btn-sm mx-1">Edit</a>
                                                    <a href="{{ route('people.show', [$person->id]) }}"
                                                        class="btn btn-success btn-sm mx-1">View</a>
                                                    <form action="{{ route('people.destroy', [$person->id]) }}"
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

                            {{ $people->links() }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
