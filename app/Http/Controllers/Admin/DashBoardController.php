<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\http\RedirectResponse;
use Illuminate\Http\Response;
use illuminate\view\view;


class DashBoardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): view
    {
        //this loads admin dashboard based on middleware
         return view('admin.dashboard');
    }

    /**
     * Show the form for creating a new resource.
     */
   
}
