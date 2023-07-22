
@extends('backend.layouts.master')


@section('admin.content')

<div class="error-area ptb--100 text-center">
        <div class="container">
            <div class="error-content">
                <h2>403</h2>
                <p>Unathorized Access for you</p>
                <a href="{{url('/admin')}}">Back to Dashboard</a>
            </div>
        </div>
    </div>

@endsection