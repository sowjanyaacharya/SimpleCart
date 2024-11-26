@extends('admin.dashboard')
<!--Passing title dyamically-->
@section('title', 'Create Brands')
@section('content')
    <div class="card">
        <div class="card-header">Brand Details</div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <!-- it matches to the route store method-->
            <form action="{{ url('admin/brands') }}" method="POST">
                {!! csrf_field() !!}
                <label>Brand Name</label><br />
                <input type="text" name="brandname" id="brandname" class="form-control" required></br>
                <input type="submit" value="Save" class="btn btn-success"></br>
            </form>
        </div>
    </div>
@endsection
