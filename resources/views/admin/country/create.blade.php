@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="d-flex justify-content-end">

                </div>
                <div class="card">
                    <div class="card-header">{{ __('Create Country') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form action="{{ route('country.store') }}" method="post" class="row">
                            @csrf
                            <div class="mb-3 col-md-12">
                                <label class="form-label">Code</label>
                                <input type="text" class="form-control" placeholder="Enter the Code" name="code">
                            </div>

                            <div class="mb-3 col-md-12">
                                <label class="form-label">English Name</label>
                                <input type="text" class="form-control" placeholder="Enter the english name"
                                    name="english_name">
                            </div>

                            <div class="mb-3 col-md-12">
                                <label class="form-label">Native Name</label>
                                <input type="text" class="form-control" placeholder="Enter the native name"
                                    name="native_name">
                            </div>

                            <div class="mb-3 col-md-4">
                                <button type="submit" class="btn btn-success">Save</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
