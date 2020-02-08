<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use App\Category;

class CategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware(['permission:read_category'])->only('index');
        $this->middleware(['permission:create_category'])->only('create');
        $this->middleware(['permission:update_category'])->only('edit');
        $this->middleware(['permission:delete_category'])->only('destroy');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parentCategories = Category::where('parent_id',NULL)->get();
        return view('category.index', compact('parentCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        return view('category.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'   => 'required|max:255',
        ]);

        $category = new Category;
        $category->name      = $request->name;
        $category->slug      = Str::slug($request->name);
        $category->parent_id = $request->parent_id;
        $category->save();
        Session::flash('success', 'You Successfully Add New Category!');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        $categories = Category::all();
        return view('category.edit', compact('category', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name'  => 'required|max:255',
        ]);
        $category = Category::find($id);
        $category->name        = $request->name;
        $category->slug        = Str::slug($request->name);
        $category->parent_id = $request->parent_id;
        $category->save();
        Session::flash('success', 'You Successfully Edit Category!');
        return redirect()->Route('categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->subcategory()->delete();
        $cat_name = $category->name;
        $category->delete();
        Session::flash('success', 'You Successfully Delete ' .$cat_name. ' Category!');
        return redirect()->Route('categories');
    }
}
