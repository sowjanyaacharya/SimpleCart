@extends('layout')
@section('title', 'Brands')
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
            <h2>Brands</h2>
        </div>
        <div class="card-body">
            <a href="{{ url('/brands/create') }}" class="btn btn-success btn-sm" title="Add New Brands">
                <i class="fa fa-plus" aria-hidden="true"></i>Add New</a>
            <br />
            <br />
            <div class="table-responsive">
                <table classs="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Brands Details</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($brands as $brand)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $brand->brandname }}</td>
                                <td>
                                    <!--/brands/{1} show route in brandcontroller triggers-->
                                    <a href="{{ url('/brands/' . $brand->id) }}" title="View Brand">
                                        <button class="btn btn-info btn-sm"><i class="fa fa-eye"
                                                aria-hidden="true"></i>View</button></a>
                                    <a href="{{ url('/brands/' . $brand->id . '/edit') }}" title="Edit Brand">
                                        <button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o"
                                                aria-hidden="true"></i>Edit</button></a>
                                                <!--/brands/1 metod delete means destroy in controller triggers-->
                                    <form method="POST" action="{{ url('/brands' . '/' . $brand->id) }}"
                                        accept-charset="UTF-8" style="display:inline">{{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-danger btn-sm" title="Delete Brand"
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
