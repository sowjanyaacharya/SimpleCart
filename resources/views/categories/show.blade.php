@extends('layout')
@section('title', 'View Categories')
@section('content')
    <div class="card">
        <div class="card-header">Categories Information</div>
        <div class="card-body">
            <div class="card-body">
                <h5 class="card-title">Name: {{ $categories->cat_name }}</h5>
                <h5 class="card-title">Brand: {{ $categories->brand->brandname ?? "No brands"}}</h5>
            </div>
            <br />
        </div>
    </div>
@endsection
