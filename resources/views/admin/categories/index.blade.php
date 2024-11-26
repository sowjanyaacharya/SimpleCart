@extends('admin.dashboard')
@section('title', 'Category')
@section('content')
    <!-- Flash Message from controller session stores and displays -->
    @if (session('flash_message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('flash_message') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="card">
        <div class="card-header">
            <h2>Categories</h2>
        </div>
        <div class="card-body">
            <a href="{{ url('/admin/categories/create') }}" class="btn btn-success btn-sm" title="Add New Categories">
                <i class="fa fa-plus" aria-hidden="true"></i>Add New</a>
            <br />
            <br />
            <div class="table-responsive">
                <table classs="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Categories Name</th>
                            <th>Brand Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $category->cat_name }}</td>
                                <!--brand is the function defined relation to the brand-->
                                <td>{{ $category->brand->brandname ?? 'No Brands Assigned' }}</td>
                                <td>
                                    <!--/categories/{1} show route in categoriescontroller triggers-->
                                    <a href="{{ url('/admin/categories/' . $category->cat_id) }}" title="View Category">
                                        <button class="btn btn-info btn-sm"><i class="fa fa-eye"
                                                aria-hidden="true"></i>View</button></a>
                                    <a href="{{ url('/admin/categories/' . $category->cat_id . '/edit') }}" title="Edit Category">
                                        <button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o"
                                                aria-hidden="true"></i>Edit</button></a>
                                    <!--/categories/1 metod delete means destroy in controller triggers-->
                                    <form method="POST" action="{{ url('/admin/categories' . '/' . $category->cat_id) }}"
                                        accept-charset="UTF-8" style="display:inline">{{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-danger btn-sm" title="Delete Category"
                                            onClick="return confirm(&quot;confirm delete?&quot;)"><i class="fa fa-trash-o"
                                                aria-hidden="true"></i>Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
