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
                        <p><strong>Code :</strong> {{ $country->name }}</p>
                        <p><strong>English Name :</strong> {{ $country->english_name }}</p>
                        <p><strong>Native Name :</strong> {{ $country->native_name }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
