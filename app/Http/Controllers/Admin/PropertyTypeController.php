<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PropertyType;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class PropertyTypeController extends Controller
{

    public function index()
    {
        $propertyTypes = PropertyType::latest()->get();
        return view('admin.property-type.index',compact('propertyTypes'));
    }

    public function create()
    {
        return view('admin.property-type.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name_en' => 'required',
            'name_ar' => 'required',
            'status' => 'required',
            'icon' => 'mimes:jpeg,bmp,png,jpg'
        ]);

        $image = $request->file('icon');
        if (isset($image))
        {
//            make unique name for image
            $currentDate = Carbon::now()->toDateString();
            $imagename = $currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
//            check category dir is exists
            if (!Storage::disk('public')->exists('property-type'))
            {
                Storage::disk('public')->makeDirectory('property-type');
            }
//            resize image for category and upload
            $category = Image::make($image)->resize(1600,479)->save();
            Storage::disk('public')->put('property-type/'.$imagename,$category);

        } else {
            $imagename = "default.png";
        }

        $input = $request->all();
        $input['name']['ar'] = $input['name_ar'];
        $input['name']['en'] = $input['name_en'];

        $propertyType = new PropertyType();
        $propertyType->name = json_encode($input['name']);
        $propertyType->status = $input['status'];
        $propertyType->icon = $imagename;
        $propertyType->save();

        toastr()->success('Property type has been updated successfully!');
        return redirect()->route('admin.property-type.index');
    }

    public function edit($id)
    {
        $propertyType = PropertyType::find($id);
        return view('admin.property-type.edit',compact('propertyType'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name_en' => 'required',
            'name_ar' => 'required',
            'status' => 'required',
            'icon' => 'mimes:jpeg,bmp,png,jpg'
        ]);
        // get form image
        $image = $request->file('icon');
        $propertyType = PropertyType::find($id);
        if (isset($image))
        {
//            make unique name for image
            $currentDate = Carbon::now()->toDateString();
            $imagename = $currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
//            check category dir is exists
            if (!Storage::disk('public')->exists('property-type'))
            {
                Storage::disk('public')->makeDirectory('property-type');
            }
//            delete old image
            if (Storage::disk('public')->exists('property-type/'.$propertyType->icon))
            {
                Storage::disk('public')->delete('property-type/'.$propertyType->icon);
            }
//            resize image for category and upload
            $categoryimage = Image::make($image)->resize(1600,479)->save();
            Storage::disk('public')->put('property-type/'.$imagename,$categoryimage);

        } else {
            $imagename = $propertyType->icon;
        }

        $input = $request->all();
        $input['name']['ar'] = $input['name_ar'];
        $input['name']['en'] = $input['name_en'];

        $propertyType->name = $input['name'];
        $propertyType->status = $input['status'];
        $propertyType->icon = $imagename;
        $propertyType->save();

        toastr()->success('Property type has been updated successfully!');
        return redirect()->route('admin.property-type.index');
    }
}
