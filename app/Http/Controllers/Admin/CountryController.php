<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{

    public function index()
    {
        $countries = Country::latest()->get();
        return view('admin.country.index',compact('countries'));
    }

    public function create()
    {
        return view('admin.country.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name_en' => 'required',
            'name_ar' => 'required',
            'code' => 'required|string|max:255',
        ]);
        $input = $request->all();

        $input['name']['ar'] = $input['name_ar'];
        $input['name']['en'] = $input['name_en'];

        $country = new Country();
        $country->name = json_encode($input['name']);
        $country->code = $input['code'];
        $country->save();

        toastr()->success('Country has been updated successfully!');
        return redirect()->route('admin.country.index');
    }

    public function edit($id)
    {
        $country = Country::find($id);
        return view('admin.country.edit',compact('country'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name_en' => 'required',
            'name_ar' => 'required',
            'code' => 'required|string|max:255',
        ]);
        $input = $request->all();

        $input['name']['ar'] = $input['name_ar'];
        $input['name']['en'] = $input['name_en'];

        $country = Country::find($id);
        $country->name = json_encode($input['name']);
        $country->code = $input['code'];
        $country->save();

        toastr()->success('Country has been updated successfully!');
        return redirect()->route('admin.country.index');
    }

}
