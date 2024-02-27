<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Governorate;
use Illuminate\Http\Request;

class CityController extends Controller
{

    public function index()
    {
        $cities = City::latest()->get();
        return view('admin.city.index',compact('cities'));
    }

    public function create()
    {
        $governorates = Governorate::all();
        return view('admin.city.create', compact('governorates'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name_en' => 'required',
            'name_ar' => 'required',
            'name_soundex' => 'required|string|max:255',
            'governorate_id' => 'required|exists:governorates,id',
        ]);
        $input = $request->all();
        $input['name']['ar'] = $input['name_ar'];
        $input['name']['en'] = $input['name_en'];

        $country = new City();
        $country->name = json_encode($input['name']);
        $country->name_soundex = $input['name_soundex'];
        $country->governorate_id = $input['governorate_id'];

        $country->save();

        toastr()->success('City has been updated successfully!');
        return redirect()->route('admin.city.index');
    }

    public function edit($id)
    {
        $city = City::find($id);
        $governorates = Governorate::all();
        return view('admin.city.edit',compact('city', 'governorates'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name_en' => 'required',
            'name_ar' => 'required',
            'name_soundex' => 'required|string|max:255',
            'governorate_id' => 'required|exists:governorates,id',
        ]);
        $input = $request->all();

        $input['name']['ar'] = $input['name_ar'];
        $input['name']['en'] = $input['name_en'];

        $city = City::find($id);
        $city->name = json_encode($input['name']);
        $city->name_soundex = $input['name_soundex'];
        $city->governorate_id = $input['governorate_id'];
        $city->save();

        toastr()->success('City has been updated successfully!');
        return redirect()->route('admin.city.index');
    }
}
