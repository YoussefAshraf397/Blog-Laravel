<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::latest()->get();
        return view('admin.permission.index', compact('permissions'));
    }

    public function create()
    {
        return view('admin.permission.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required'
        ]);
        $input = $request->all();

        $permission = new Permission();
        $permission->name = $input['name'];

        $permission->save();

        toastr()->success('Permission has been updated successfully!');
        return redirect()->route('admin.permission.index');
    }

    public function edit($id)
    {
        $permission = Permission::find($id);
        return view('admin.permission.edit', compact('permission'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name' => 'required'
        ]);
        $input = $request->all();
        $permission = Permission::find($id);
        $permission->name = $input['name'];
        $permission->save();

        toastr()->success('Permission has been updated successfully!');
        return redirect()->route('admin.permission.index');
    }

    public function destroy($id)
    {
        $permission = Permission::find($id);
        $permission->delete();
        toastr()->success('Permission has been deleted successfully!');
        return redirect()->back();
    }
}
