<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Governorate;
use Illuminate\Http\Request;

class GovernorateController extends Controller
{

    public function index()
    {
        $governorates = Governorate::latest()->get();
        return view('admin.governorate.index',compact('governorates'));
    }

    public function create()
    {
        $countries = Country::all();
        return view('admin.governorate.create', compact('countries'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name_en' => 'required',
            'name_ar' => 'required',
            'country_id' => 'required|exists:countries,id',
        ]);
        $input = $request->all();

        $input['name']['ar'] = $input['name_ar'];
        $input['name']['en'] = $input['name_en'];

        $country = new Governorate();
        $country->name = json_encode($input['name']);
        $country->country_id = $input['country_id'];
        $country->save();

        toastr()->success('Governorate has been updated successfully!');
        return redirect()->route('admin.governorate.index');
    }

    public function edit($id)
    {
        $governorate = Governorate::find($id);
        $countries = Country::all();

        return view('admin.governorate.edit',compact('governorate', 'countries'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name_en' => 'required',
            'name_ar' => 'required',
            'country_id' => 'required|exists:countries,id',
        ]);
        $input = $request->all();

        $input['name']['ar'] = $input['name_ar'];
        $input['name']['en'] = $input['name_en'];

        $governorate = Governorate::find($id);
        $governorate->name = json_encode($input['name']);
        $governorate->country_id = $input['country_id'];
        $governorate->save();

        toastr()->success('Governorate has been updated successfully!');
        return redirect()->route('admin.governorate.index');
    }
}
