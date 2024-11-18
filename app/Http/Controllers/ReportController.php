<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\http\RedirectResponse;
use Illuminate\Http\Response;
use App\Models\Brand;
use App\Models\Category;
use illuminate\view\view;

class ReportController extends Controller
{
    public function getBrandReport(Request $request){
        $validated=$request->validate([
            'date'=>'required|date',
        ]);
        $selectedDate=$request->date;
        //Fetching of brands on sleected date
        $brands=Brand::whereDate('created_at',$selectedDate)->get();
        return response()->json([
            'selectedDate'=> $selectedDate,
            'brands'=>$brands]);
    }
}
