<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::latest()->get();
        return view('admin.role.index', compact('roles'));
    }

    public function create()
    {
        return view('admin.role.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required'
        ]);
        $input = $request->all();

        $role = new Role();
        $role->name = $input['name'];

        $role->save();

        toastr()->success('Role has been updated successfully!');
        return redirect()->route('admin.role.index');
    }

    public function edit($id)
    {
        $role = Role::find($id);
        return view('admin.role.edit', compact('role'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name' => 'required'
        ]);
        $input = $request->all();
        $role = Role::find($id);
        $role->name = $input['name'];
        $role->save();

        toastr()->success('Role has been updated successfully!');
        return redirect()->route('admin.role.index');
    }

    public function destroy($id)
    {
        $role = Role::find($id);
        $role->delete();
        toastr()->success('Role has been deleted successfully!');
        return redirect()->back();
    }
}
