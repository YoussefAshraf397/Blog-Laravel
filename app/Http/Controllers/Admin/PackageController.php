<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function index()
    {
        $packages = Package::latest()->get();
        return view('admin.package.index',compact('packages'));
    }

    public function create()
    {
        return view('admin.package.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name_en' => 'required',
            'name_ar' => 'required',
            'type' => 'required',
        ]);

        $input = $request->all();
        $input['name']['ar'] = $input['name_ar'];
        $input['name']['en'] = $input['name_en'];
        $input['slug'] = str_slug($input['name']['en']);

        $package = new Package();
        $package->name = json_encode($input['name']);
        $package->type = $input['type'];
        $package->slug = $input['slug'];
        $package->save();
        toastr()->success('Package has been Created successfully!');
        return redirect()->route('admin.package.index');
    }

    public function show($id)
    {

    }

    public function edit($id)
    {
        $package = Package::find($id);
        return view('admin.package.edit',compact('package'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name_en' => 'required',
            'name_ar' => 'required',
            'type' => 'required',
        ]);
        $package = Package::find($id);

        $input = $request->all();
        $input['name']['ar'] = $input['name_ar'];
        $input['name']['en'] = $input['name_en'];
        $input['slug'] = str_slug($input['name']['en']);

        $package->name = $input['name'];
        $package->type = $input['type'];
        $package->slug = $input['slug'];
        $package->save();
        toastr()->success('Package has been updated successfully!');
        return redirect()->route('admin.package.index');
    }

    public function destroy($id)
    {
        $package = Package::find($id);

        $package->delete();
        toastr()->success('Package has been deleted successfully!');
        return redirect()->back();
    }
}
