<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PlaceType;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class PlaceTypeController extends Controller
{
    public function index()
    {
        $placeTypes = PlaceType::latest()->get();
        return view('admin.place-type.index',compact('placeTypes'));
    }

    public function create()
    {
        return view('admin.place-type.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name_en' => 'required',
            'name_ar' => 'required',
            'description_en' => 'required',
            'description_ar' => 'required',
            'status' => 'required',
            'icon' => 'mimes:jpeg,bmp,png,jpg'
        ]);
        // get form image
        $image = $request->file('icon');
        $slug = str_slug($request->name);
        if (isset($image))
        {
//            make unique name for image
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
//            check category dir is exists
            if (!Storage::disk('public')->exists('place-type'))
            {
                Storage::disk('public')->makeDirectory('place-type');
            }
//            resize image for category and upload
            $category = Image::make($image)->resize(1600,479)->save();
            Storage::disk('public')->put('place-type/'.$imagename,$category);

        } else {
            $imagename = "default.png";
        }

        $input = $request->all();
        $input['name']['ar'] = $input['name_ar'];
        $input['name']['en'] = $input['name_en'];
        $input['description']['ar'] = $input['description_ar'];
        $input['description']['en'] = $input['description_en'];

        $placeType = new PlaceType();
        $placeType->name = json_encode($input['name']);
        $placeType->details = json_encode($input['description']);
        $placeType->status = $input['status'];
        $placeType->icon = $imagename;
        $placeType->save();
        toastr()->success('Place type has been Created successfully!');
        return redirect()->route('admin.place-type.index');
    }

    public function show($id)
    {

    }

    public function edit($id)
    {
        $placeType = PlaceType::find($id);
        return view('admin.place-type.edit',compact('placeType'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name_en' => 'required',
            'name_ar' => 'required',
            'description_en' => 'required',
            'description_ar' => 'required',
            'status' => 'required',
            'icon' => 'mimes:jpeg,bmp,png,jpg'
        ]);
        // get form image
        $image = $request->file('icon');
        $placeType = PlaceType::find($id);
        if (isset($image))
        {
//            make unique name for image
            $currentDate = Carbon::now()->toDateString();
            $imagename = $currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
//            check category dir is exists
            if (!Storage::disk('public')->exists('place-type'))
            {
                Storage::disk('public')->makeDirectory('place-type');
            }
//            delete old image
            if (Storage::disk('public')->exists('place-type/'.$placeType->icon))
            {
                Storage::disk('public')->delete('place-type/'.$placeType->icon);
            }
//            resize image for category and upload
            $categoryimage = Image::make($image)->resize(1600,479)->save();
            Storage::disk('public')->put('place-type/'.$imagename,$categoryimage);

        } else {
            $imagename = $placeType->icon;
        }

        $input = $request->all();
        $input['name']['ar'] = $input['name_ar'];
        $input['name']['en'] = $input['name_en'];
        $input['description']['ar'] = $input['description_ar'];
        $input['description']['en'] = $input['description_en'];

        $placeType->name = $input['name'];
        $placeType->details = $input['description'];
        $placeType->status = $input['status'];
        $placeType->icon = $imagename;
        $placeType->save();
        toastr()->success('Place type has been updated successfully!');
        return redirect()->route('admin.place-type.index');
    }

    public function destroy($id)
    {
        $placeType = PlaceType::find($id);
        if (Storage::disk('public')->exists('place-type/'.$placeType->icon))
        {
            Storage::disk('public')->delete('place-type/'.$placeType->icon);
        }

        $placeType->delete();
        toastr()->success('Place type has been deleted successfully!');
        return redirect()->back();
    }
}
