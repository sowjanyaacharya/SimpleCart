<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\http\RedirectResponse;
use Illuminate\Http\Response;
use App\Models\Category;
use illuminate\view\view;
use App\Models\Brand;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): view
    {
        //this is to load from the models Brand 
        $categories = Category::all();
        //this loads categories.index.blade file, compact is to have multple data
        return view ('categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): view
    {
        //this is to create the category we need to fetch the brand to get in dropdown
        $brands=Brand::all();
        return view('categories.create',compact('brands'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $input=$request->validate([
            //Null becz no data exists in the table for new entry 
            'cat_name'=>'required|string|max:255|unique:table_categories,cat_name,NULL,cat_id,brand_id,' .$request->brand_id,
            'brand_id'=>'required|exists:table_brands,id',
        ],[
            'cat_name.required'=>'Category name is mandatory!',
            'cat_name.unique'=>'This Category Already Present under this Brand',
            'brand_id.exists'=>'This Brand Does Not Exist',

        ]);
        //to store the Category
        Category::create($input);
        return redirect('categories')->with('flash_message', 'Categories are Added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): view
    {
        $categories=Category::where('cat_id',$id)->firstOrFail();
        return view('categories.show',compact('categories'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): view
    {
        $categories=Category::where('cat_id',$id)->firstOrFail();
        $brands=Brand::all();
        //compact to pass multiple values
        return view('categories.edit',compact('categories','brands'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $categories=Category::where('cat_id',$id)->first();
        //dd is used for debugging
        //dd($request->brand_id);
        //validation for brands cannot have duplicate category
        $input=$request->validate([
            //it excludes the current category
            'cat_name'=>'required|string|max:255|unique:table_categories,cat_name,' .$categories->cat_id. ',cat_id,brand_id,' .$request->brand_id,
            'brand_id'=>'required|exists:table_brands,id'
        ],[
            'cat_name.required'=>'Category name is mandatory!',
            'cat_name.unique'=>'This Category Already Present under this Brand',
            'brand_id.exists'=>'This Brand Does Not Exist',

        ]);
        $categories->update($input);
        return redirect('categories')->with('flash_message', 'Categories Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //Find the Category if exists
        Category::where('cat_id',$id)->delete();
        return redirect('categories')->with('flash_message', 'Categories Deleted');
    }
}

?>