@extends('layout')
@section('title', 'Edit Brands')
@section('content')
    <div class="card">
        <div class="card-header">Edit Brands</div>
        <div class="card-body">
            <form action="{{ url('brands/' . $brands->id) }}" method="POST">
                {!! csrf_field() !!}
                @method('PATCH')
                <input type="hidden" name="id" id="id" value="{{ $brands->id }}" />
                <label>Name</label></br>
                <input type="text" name="brandname" id="brandname" value="{{ $brands->brandname }}"
                    class="form-control"></br>
                <input type="submit" value="Update" class="btn btn-success"><br />
            </form>
        </div>
    </div>
@endsection
