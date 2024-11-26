<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\http\RedirectResponse;
use Illuminate\Http\Response;
use App\Models\Brand;
use illuminate\view\view;


class BrandController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index(): view
    {
        //this is to load from the models Brand 
        $brands = Brand::all();
        //this loads brands.index.blade file for brands passing the value and using brands calling in view
        return view ('admin.brands.index')->with('brands', $brands);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): view
    {
        //this is to create the brand when we click on add
        return view('admin.brands.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        //validation for duplicate brandname
        $input=$request->validate([
            'brandname'=>'required|max:255|unique:table_brands,brandname',
        ],
    ['brandname.unique'=>'This Brand name "'. $request->brandname .'" already exists. ',]);
        //to store the brands
        //$input=$request->all();
        Brand::create($input);
        //it routes to the index blade file
        return redirect()->route('brands.index')->with('flash_message', 'Brands are Added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): view
    {
        $brand=Brand::find($id);
        return view('admin.brands.show')->with('brands', $brand);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): view
    {
        $brand=Brand::find($id);
        return view('admin.brands.edit')->with('brands', $brand);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $brands=Brand::find($id);
        $input=$request->all();
        $brands->update($input);
        return redirect()->route('brands.index')->with('flash_message', 'Brands Updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Brand::destroy($id);
        return redirect()->route('brands.index')->with('flash_message', 'Brands Deleted!');
    }
 
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
