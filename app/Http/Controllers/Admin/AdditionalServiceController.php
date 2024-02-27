<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdditionalService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class AdditionalServiceController extends Controller
{

    public function index()
    {
        $additionalServices = AdditionalService::latest()->get();
        return view('admin.additional-service.index',compact('additionalServices'));
    }

    public function create()
    {
        return view('admin.additional-service.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name_en' => 'required',
            'name_ar' => 'required',
            'unit_en' => 'required',
            'unit_ar' => 'required',
            'description_en' => 'required',
            'description_ar' => 'required',
            'icon' => 'mimes:jpeg,bmp,png,jpg'
        ]);

        $image = $request->file('icon');
        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
            if (!Storage::disk('public')->exists('additional-service'))
            {
                Storage::disk('public')->makeDirectory('additional-service');
            }
            $category = Image::make($image)->resize(1600,479)->save();
            Storage::disk('public')->put('additional-service/'.$imagename,$category);

        } else {
            $imagename = "default.png";
        }

        $input = $request->all();
        $input['name']['ar'] = $input['name_ar'];
        $input['name']['en'] = $input['name_en'];

        $input['unit']['ar'] = $input['unit_ar'];
        $input['unit']['en'] = $input['unit_en'];

        $input['description']['ar'] = $input['description_ar'];
        $input['description']['en'] = $input['description_en'];

        $additionalService = new AdditionalService();
        $additionalService->name = json_encode($input['name']);
        $additionalService->unit = json_encode($input['unit']);
        $additionalService->description = json_encode($input['description']);
        $additionalService->icon = $imagename;
        $additionalService->save();

        toastr()->success('Additional service type has been updated successfully!');
        return redirect()->route('admin.additional-service.index');
    }

    public function edit($id)
    {
        $additionalService = AdditionalService::find($id);
        return view('admin.additional-service.edit',compact('additionalService'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name_en' => 'required',
            'name_ar' => 'required',
            'unit_en' => 'required',
            'unit_ar' => 'required',
            'description_en' => 'required',
            'description_ar' => 'required',
            'icon' => 'mimes:jpeg,bmp,png,jpg'
        ]);
        $image = $request->file('icon');
        $additionalService = AdditionalService::find($id);
        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
            if (!Storage::disk('public')->exists('additional-service'))
            {
                Storage::disk('public')->makeDirectory('additional-service');
            }
            if (Storage::disk('public')->exists('additional-service/'.$additionalService->icon))
            {
                Storage::disk('public')->delete('additional-service/'.$additionalService->icon);
            }
            $categoryimage = Image::make($image)->resize(1600,479)->save();
            Storage::disk('public')->put('additional-service/'.$imagename,$categoryimage);

        } else {
            $imagename = $additionalService->icon;
        }

        $input = $request->all();
        $input['name']['ar'] = $input['name_ar'];
        $input['name']['en'] = $input['name_en'];
        $input['unit']['ar'] = $input['unit_ar'];
        $input['unit']['en'] = $input['unit_en'];
        $input['description']['ar'] = $input['description_ar'];
        $input['description']['en'] = $input['description_en'];

        $additionalService->name = json_encode($input['name']);
        $additionalService->unit = json_encode($input['unit']);
        $additionalService->description = json_encode($input['description']);
        $additionalService->icon = $imagename;
        $additionalService->save();

        toastr()->success('Additional service type has been updated successfully!');
        return redirect()->route('admin.additional-service.index');
    }
}
