<?php

namespace App\Http\Controllers\Admin;

use App\Enums\FeedTypeEnum;
use App\Http\Controllers\Controller;
use App\Models\Feed;
use Illuminate\Http\Request;

class PolicyController extends Controller
{

    public function index()
    {
        $policies = Feed::latest()->get();
        return view('admin.policy.index',compact('policies'));
    }

    public function create()
    {
        $feedTypes = FeedTypeEnum::getValues();
        return view('admin.policy.create', compact('feedTypes'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'title_en' => 'required',
            'title_ar' => 'required',
            'description_ar' => 'required',
            'description_en' => 'required',
            'type' => 'required',
        ]);
        $input = $request->all();
        $input['title']['ar'] = $input['title_ar'];
        $input['title']['en'] = $input['title_en'];
        $input['description']['ar'] = $input['description_ar'];
        $input['description']['en'] = $input['description_en'];

        $policy = new Feed();
        $policy->title = json_encode($input['title']);
        $policy->description = json_encode($input['description']);
        $policy->type = $input['type'];
        $policy->save();

        toastr()->success('Policy has been updated successfully!');
        return redirect()->route('admin.policy.index');
    }

    public function edit($id)
    {
        $policy = Feed::find($id);
        $feedTypes = FeedTypeEnum::getValues();
        return view('admin.policy.edit',compact('policy', 'feedTypes'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title_en' => 'required',
            'title_ar' => 'required',
            'description_ar' => 'required',
            'description_en' => 'required',
            'type' => 'required',
        ]);
        $input = $request->all();

        $input['title']['ar'] = $input['title_ar'];
        $input['title']['en'] = $input['title_en'];
        $input['description']['ar'] = $input['description_ar'];
        $input['description']['en'] = $input['description_en'];

        $policy = Feed::find($id);
        $policy->title = json_encode($input['title']);
        $policy->description = json_encode($input['description']);
        $policy->type = $input['type'];
        $policy->save();

        toastr()->success('Policy has been updated successfully!');
        return redirect()->route('admin.policy.index');
    }
}
