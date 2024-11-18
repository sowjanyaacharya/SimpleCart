@extends('layout')
@section('title', 'Edit Category')
@section('content')
    <div class="card">
        <div class="card-header">Edit Categories</div>
        <div class="card-body">
            <form action="{{ url('categories/' . $categories->cat_id)}}" method="POST">
                {!! csrf_field() !!}
                <!-- patch means update in the contrroller-->
                @method('PATCH')
                <input type="hidden" name="cat_id" id="cat_id" value="{{ $categories->cat_id }}" />
                <label>Category Name</label></br>
                <input type="text" name="cat_name" id="cat_name" value="{{ $categories->cat_name }}"
                    class="form-control"></br>
                    @error('cat_name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                <label>Brand Name</label><br/>
                <select name="brand_id" id="brand_id" class="form-control">
                    <option value="" disabled>Select a Brand</option>
                    @foreach($brands as $brand)
                    <option value="{{ $brand->id }}"
                        {{$categories->brand_id==$brand->id?'selected': ''}}>
                        {{$brand->brandname}}
                    </option>
                    @endforeach
                </select><br/>
                @error('brand_id')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <input type="submit" value="Update" class="btn btn-success"><br />
            </form>
        </div>
    </div>
@endsection
