<?php

namespace App\Http\Controllers\Admin;

use App\Enums\AttributeTypeEnum;
use App\Http\Controllers\Controller;
use App\Models\AdditionalService;
use App\Models\Attribute;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class AttributeController extends Controller
{

    public function index()
    {
        $attributes = Attribute::latest()->get();
        return view('admin.attribute.index',compact('attributes'));
    }

    public function create()
    {
        $attributesTypes = AttributeTypeEnum::getValues();

        return view('admin.attribute.create', compact('attributesTypes'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name_en' => 'required',
            'name_ar' => 'required',
            'minimum' => 'required|integer',
            'maximum' => 'required|integer',
            'type' => 'required',
            'icon' => 'mimes:jpeg,bmp,png,jpg'
        ]);

        $image = $request->file('icon');
        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
            if (!Storage::disk('public')->exists('attribute'))
            {
                Storage::disk('public')->makeDirectory('attribute');
            }
            $category = Image::make($image)->resize(1600,479)->save();
            Storage::disk('public')->put('attribute/'.$imagename,$category);

        } else {
            $imagename = "default.png";
        }

        $input = $request->all();
        $input['name']['ar'] = $input['name_ar'];
        $input['name']['en'] = $input['name_en'];

        $attribute = new Attribute();
        $attribute->name = json_encode($input['name']);
        $attribute->slug = str_slug($input['name_en']);
        $attribute->type = $input['type'];
        $attribute->maximum = $input['maximum'];
        $attribute->minimum = $input['minimum'];
        $attribute->icon = $imagename;
        $attribute->save();

        toastr()->success('Attribute has been updated successfully!');
        return redirect()->route('admin.attribute.index');
    }

    public function edit($id)
    {
        $attribute = Attribute::find($id);
        $attributesTypes = AttributeTypeEnum::getValues();

        return view('admin.attribute.edit',compact('attribute', 'attributesTypes'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name_en' => 'required',
            'name_ar' => 'required',
            'minimum' => 'required|integer',
            'maximum' => 'required|integer',
            'type' => 'required',
            'icon' => 'mimes:jpeg,bmp,png,jpg'
        ]);
        $image = $request->file('icon');
        $attribute = Attribute::find($id);
        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
            if (!Storage::disk('public')->exists('attribute'))
            {
                Storage::disk('public')->makeDirectory('attribute');
            }
            if (Storage::disk('public')->exists('attribute/'.$attribute->icon))
            {
                Storage::disk('public')->delete('attribute/'.$attribute->icon);
            }
            $categoryimage = Image::make($image)->resize(1600,479)->save();
            Storage::disk('public')->put('attribute/'.$attribute,$categoryimage);

        } else {
            $imagename = $attribute->icon;
        }

        $input = $request->all();
        $input['name']['ar'] = $input['name_ar'];
        $input['name']['en'] = $input['name_en'];

        $attribute->name = json_encode($input['name']);
        $attribute->slug = str_slug($input['name_en']);
        $attribute->type = $input['type'];
        $attribute->maximum = $input['maximum'];
        $attribute->minimum = $input['minimum'];
        $attribute->icon = $imagename;
        $attribute->save();

        toastr()->success('Attribute has been updated successfully!');
        return redirect()->route('admin.attribute.index');
    }
}
