@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="d-flex justify-content-end">
                    <a href="{{ route('country.create') }}" class="btn btn-primary mb-4">Add Country</a>
                </div>
                <div class="card">
                    <div class="card-header">{{ __('Countries') }}</div>

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
                                        <th scope="col">Code</th>
                                        <th scope="col">English Name</th>
                                        <th scope="col">Native Name</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($countries as $country)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $country->code }}</td>
                                            <td>{{ $country->english_name }}</td>
                                            <td>{{ $country->native_name }}</td>
                                            <td>
                                                <div class="d-flex col">
                                                    <a href="{{ route('country.edit', [$country->id]) }}"
                                                        class="btn btn-primary btn-sm mx-1">Edit</a>
                                                    <a href="{{ route('country.show', [$country->id]) }}"
                                                        class="btn btn-success btn-sm mx-1">View</a>
                                                    <form action="{{ route('country.destroy', [$country->id]) }}"
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

                            {{ $countries->links() }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
