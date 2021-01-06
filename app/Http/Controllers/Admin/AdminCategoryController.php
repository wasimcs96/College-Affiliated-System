<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Category;

/**
 * Categories Controller
 *
 * @property \Modules\CategoryManager\Entities\Category $Category
 *
 * @method \Modules\CategoryManager\Entities\Category[] index(Request $request), create, store(CategoryRequest $request), show(Category $Category), edit($id), update(CategoryRequest $request, $id), destroy($id)
 */

class AdminCategoryController extends Controller
{

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $categories = Category::orderBy('updated_at', 'DESC')->get();
        return view('admin.category.index', compact('categories'));

    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {

        return view('admin.category.add')->with('categories', Category::all());

    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'title' => 'required',
            'slug' => 'required',
            'status' => 'required'
        ]);

         Category::create($request->all());
        // dd($category);

        return redirect()->route('admin.category')->with('success', 'Category has been saved Successfully');
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show($id)
    {
        $category = Category::where('id',$id)->first();
        return view('admin.category.show')->with('category', $category);
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit(Category $id)
    {

        //  $category = Category::where('id',$id)->first();
        // dd($id);
        // dd(Category::all());
         return view('admin.category.edit')->with('category', $id)
         ->with('categories',Category::all());
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request, Category $id)
    {
// dd($request->)
        $id->update($request->all());
        return redirect()->route('admin.category')->with('success', 'Category updated Succefully.');
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy($id)
    {

        $id = Category::find($id);
        $id->delete();

        return redirect()->route('admin.category')->with('success', 'Category Removed Succefully.');

    }
}


