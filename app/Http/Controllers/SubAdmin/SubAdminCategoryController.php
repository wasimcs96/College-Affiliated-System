<?php

namespace App\Http\Controllers\SubAdmin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Config;
use App\Models\Category;
use Illuminate\Support\Str;
/**
 * Categories Controller
 *
 * @property \Modules\CategoryManager\Entities\Category $Category
 *
 * @method \Modules\CategoryManager\Entities\Category[] index(Request $request), create, store(CategoryRequest $request), show(Category $Category), edit($id), update(CategoryRequest $request, $id), destroy($id)
 */

class SubAdminCategoryController extends Controller
{

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $categories = Category::orderBy('updated_at', 'DESC')->get();
        return view('subadmin.category.index', compact('categories'));

    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {

        return view('subadmin.category.add')->with('categories', Category::all());

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

            'status' => 'required'

        ]);
// dd($request->image);
        $image=$request->image;
        $name= time().$image->getClientOriginalName();
        $st= $image->move(Config::get('define.image.category_media'),$name);
        $newname= Config::get('define.image.category_media').'/'.$name;

         Category::create([
             'title'=> $request->title,
             'slug'=> Str::slug($request->title),
             'status' => $request->status,
             'parent_id'=>$request->parent_id,
             'banner'=> $newname,

         ]);
        // dd($category);

        return redirect()->route('subadmin.category')->with('success', 'Category has been saved Successfully');
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show($id)
    {
        $category = Category::where('id',$id)->first();
        return view('subadmin.category.show')->with('category', $category);
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
         return view('subadmin.category.edit')->with('category', $id)
         ->with('categories',Category::all());
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request, $id)
    {   $image=$request->image;
        $name= time().$image->getClientOriginalName();
        $st= $image->move(Config::get('define.image.category_media'),$name);
        $newname= Config::get('define.image.category_media').'/'.$name;

        $update= Category::find($id);
        $update->title = $request->title;
        $update->slug = $request->slug;
        $update->status = $request->status;
        $update->parent_id = $request->parent_id;
        $update->banner = $newname;
        $update->save();
        return redirect()->route('subadmin.category')->with('success', 'Category updated Succefully.');
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy($id)
    {

        $id = Category::find($id);
        $id->delete();

        return redirect()->route('subadmin.category')->with('success', 'Category Removed Succefully.');

    }
}


