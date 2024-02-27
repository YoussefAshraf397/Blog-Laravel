<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->get();
        return view('admin.category.index',compact('categories'));
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name_ar' => 'required',
            'name_en' => 'required',
            'status' => 'required',
            'icon' => 'required|mimes:jpeg,bmp,png,jpg'
        ]);

        $input = $request->all();

        // get form image
        $image = $request->file('icon');
        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
            if (!Storage::disk('public')->exists('category'))
            {
                Storage::disk('public')->makeDirectory('category');
            }
            $category = Image::make($image)->resize(1600,479)->save();
            Storage::disk('public')->put('category/'.$imagename,$category);

        } else {
            $imagename = "default.png";
        }

        $input['name']['ar'] = $input['name_ar'];
        $input['name']['en'] = $input['name_en'];

        $category = new Category();
        $category->name = json_encode($input['name']) ;
        $category->status = $input['status'];
        $category->icon = $imagename;
        $category->save();
        toastr()->success('Category has been Created successfully!');
        return redirect()->route('admin.category.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.category.edit',compact('category'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name_ar' => 'required',
            'name_en' => 'required',
            'status' => 'required',
            'icon' => 'mimes:jpeg,bmp,png,jpg'
        ]);
        $input = $request->all();

        $image = $request->file('icon');
        $category = Category::find($id);
        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
            if (!Storage::disk('public')->exists('category'))
            {
                Storage::disk('public')->makeDirectory('category');
            }
            if (Storage::disk('public')->exists('category/'.$category->image))
            {
                Storage::disk('public')->delete('category/'.$category->image);
            }
            $categoryimage = Image::make($image)->resize(1600,479)->save();
            Storage::disk('public')->put('category/'.$imagename,$categoryimage);
        } else {
            $imagename = $category->icon;
        }

        $input['name']['ar'] = $input['name_ar'];
        $input['name']['en'] = $input['name_en'];

        $category->name = json_encode($input['name']) ;
        $category->status = $input['status'];
        $category->icon = $imagename;
        $category->save();
        toastr()->success('Category has been updated successfully!');
        return redirect()->route('admin.category.index');
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        if (Storage::disk('public')->exists('category/'.$category->image))
        {
            Storage::disk('public')->delete('category/'.$category->image);
        }

        $category->delete();
        toastr()->success('Category has been deleted successfully!');
        return redirect()->back();
    }
}
