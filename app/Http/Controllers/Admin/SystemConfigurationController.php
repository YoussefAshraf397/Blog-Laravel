<?php

namespace App\Http\Controllers\Admin;

use App\Enums\FeedTypeEnum;
use App\Http\Controllers\Controller;
use App\Models\Feed;
use App\Models\SystemConfiguration;
use Illuminate\Http\Request;

class SystemConfigurationController extends Controller
{

    public function index()
    {
        $settings = SystemConfiguration::latest()->get();
        return view('admin.system-configuration.index',compact('settings'));
    }

    public function create()
    {
        return view('admin.system-configuration.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'whatsapp' => 'required',
            'currency' => 'required',
            'name' => 'required'
        ]);
        $input = $request->all();
        $input['settings']['whatsapp'] = $input['whatsapp'];
        $input['settings']['currency'] = $input['currency'];

        $setting = SystemConfiguration::first();
        if ($setting) {
            $setting->settings = json_encode($input['settings']);
            $setting->name = $input['name'];
            $setting->save();
        } else {
            $setting = new SystemConfiguration();
            $setting->settings = json_encode($input['settings']);
            $setting->name = $input['name'];
            $setting->save();
        }

        toastr()->success('System configuration has been updated successfully!');
        return redirect()->route('admin.system-configuration.index');
    }

    public function edit($id)
    {
        $setting = SystemConfiguration::find($id);
        return view('admin.system-configuration.edit',compact('setting'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'whatsapp' => 'required',
            'currency' => 'required',
            'name' => 'required'
        ]);
        $input = $request->all();

        $input['settings']['whatsapp'] = $input['whatsapp'];
        $input['settings']['currency'] = $input['currency'];

        $setting = SystemConfiguration::find($id);
        $setting->settings = json_encode($input['settings']);
        $setting->name = $input['name'];
        $setting->save();

        toastr()->success('System configuration has been updated successfully!');
        return redirect()->route('admin.system-configuration.index');
    }
}
