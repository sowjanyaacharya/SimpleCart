@extends('admin.dashboard')
<!--Passing title dyamically-->
@section('title', 'Create Categories')
@section('content')
    <div class="card">
        <div class="card-header">Category Details</div>
        <div class="card-body">
            <!-- it matches to the route store method-->
            <form action="{{ url('admin/categories') }}" method="POST">
                {!! csrf_field() !!}
                <label>Category Name</label><br />
                <input type="text" name="cat_name" id="cat_name" class="form-control" required></br>
                @error('cat_name')
                <!--$message 'error 'annotation directly reads the message-->
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <label>Brand Name</label><br/>
                <select name="brand_id" id="brand_id" class="form-control" required>
                    <!--it is from the controller create -->
                    <option value="" disabled selected>Select a Brand</option>
                    @foreach ($brands as $brand)
                    <option value="{{ $brand->id }}">{{ $brand -> brandname }}</option>
                    @endforeach
                </select><br/>
                @error('brand_id')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <input type="submit" value="Save" class="btn btn-success"></br>
            </form>
        </div>
    </div>
@endsection
