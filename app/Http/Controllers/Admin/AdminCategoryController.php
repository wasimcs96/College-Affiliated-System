<?php

namespace App\Http\Controllers\Admin;

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
            'status' => 'required'

        ]);
$newname='';
// dd($request->image);
      if($request->hasFile('image'))
       {
        $image=$request->image;
        $name= time().$image->getClientOriginalName();
        $st= $image->move(Config::get('define.image.category_media'),$name);
        $newname= Config::get('define.image.category_media').'/'.$name;
       }
         Category::create([
             'title'=> $request->title,
             'slug'=> Str::slug($request->title),
             'status' => $request->status,
             'parent_id'=>$request->parent_id,
             'banner'=> $newname,

         ]);
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
    public function update(Request $request, $id)
    {
        $update= Category::find($id);
        $image=$request->image;
        if(isset($image))
        {
        $name= time().$image->getClientOriginalName();
        $st= $image->move(Config::get('define.image.category_media'),$name);
        $newname= Config::get('define.image.category_media').'/'.$name;
        $update->banner = $newname;
        }

        $update->title = $request->title;
        $update->slug = $request->slug;
        $update->status = $request->status;
        $update->parent_id = $request->parent_id;

        $update->save();
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


