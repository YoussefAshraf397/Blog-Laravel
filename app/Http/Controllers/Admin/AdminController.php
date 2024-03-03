<?php

namespace App\Http\Controllers\Admin;

use App\Enums\User\UserGenderEnum;
use App\Enums\User\UserStatusEnum;
use App\Enums\User\UserTypeEnum;
use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Country;
use App\Models\Governorate;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{

    public function index()
    {
        $users = User::whereIn('type', ['admin', 'dashboard_user'])->latest()->get();
        return view('admin.admin-user.index',compact('users'));
    }

    public function create()
    {
        $userStatuses = UserStatusEnum::getValues();
        $userTypes = UserTypeEnum::getValues();
        $userGenders = UserGenderEnum::getValues();
        $countries = Country::all();
        return view('admin.admin-user.create', compact('userStatuses', 'userTypes', 'userGenders', 'countries'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required',
            'status' => 'required',
            'type' => 'required',
            'gender' => 'required',
            'password' => 'required',
            'phone' => 'required',
            'country_code' => 'required',
            'country_id' => 'required|exists:countries,id',
            'profile_image' => 'mimes:jpeg,bmp,png,jpg'
        ]);
        $image = $request->file('profile_image');
        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
            if (!Storage::disk('public')->exists('user'))
            {
                Storage::disk('public')->makeDirectory('user');
            }
            $prfileImage = Image::make($image)->resize(1600,479)->save();
            Storage::disk('public')->put('user/'.$imagename,$prfileImage);

        } else {
            $imagename = "default.png";
        }

        $input = $request->all();

        $user = new User();
        $user->name = $input['name'];
        $user->email = $input['email'];
        $user->status = $input['status'];
        $user->type = $input['type'];
        $user->gender = $input['gender'];
        $user->phone = $input['phone'];
        $user->country_code = $input['country_code'];
        $user->country_id = $input['country_id'];
        $user->password = bcrypt($input['password']);
        $user->profile_image = $imagename;
        $user->save();

        toastr()->success('User has been updated successfully!');
        return redirect()->route('admin.admin-user.index');
    }

    public function show($id)
    {
        $user = User::find($id);
        $roles = Role::all();
        $permissions = Permission::all();
        return view('admin.admin-user.show',compact('user', 'roles', 'permissions'));
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

    public function destroy($id)
    {
        $city = City::find($id);
        $city->delete();
        toastr()->success('City has been deleted successfully!');
        return redirect()->route('admin.city.index');
    }

    public function removeRole(User $user, Role $role)
    {
        if ($user->hasRole($role)) {
            $user->removeRole($role);
            toastr()->success('Role removed');
            return back();
        }

        toastr()->success('Role not exists.');
        return back();
    }

    public function assignRole(Request $request, User $user)
    {
        if ($user->hasRole($request->role)) {
            toastr()->success('Role exists');
            return back();
        }

        $user->assignRole($request->role);
        toastr()->success('Role assigned.');
        return back();
    }

    public function revokePermission(User $user, Permission $permission)
    {
        if ($user->hasPermissionTo($permission)) {
            $user->revokePermissionTo($permission);
            toastr()->success('Permission revoked.');
            return back();
        }
        toastr()->success('Permission does not exists.');
        return back();
    }

    public function givePermission(Request $request, User $user)
    {
        if ($user->hasPermissionTo($request->permission)) {
            toastr()->success('Permission exists.');
            return back();
        }
        $user->givePermissionTo($request->permission);
        toastr()->success('Permission added.');
        return back();
    }
}
