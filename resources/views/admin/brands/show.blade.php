@extends('admin.dashboard')
@section('title', 'View Brands')
@section('content')
    <div class="card">
        <div class="card-header">Brands Information</div>
        <div class="card-body">
            <div class="card-body">
                <h5 class="card-title">Name: {{ $brands->brandname }}</h5>
            </div>
            <br />
        </div>
    </div>
@endsection
