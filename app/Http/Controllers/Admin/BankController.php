<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bank;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class BankController extends Controller
{
    public function index()
    {
        $banks = Bank::latest()->get();
        return view('admin.bank.index',compact('banks'));
    }

    public function create()
    {
        return view('admin.bank.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name_ar' => 'required',
            'name_en' => 'required',
            'status' => 'required',
            'icon' => 'required|mimes:jpeg,bmp,png,jpg'
        ]);

        $input = $request->all();

        // get form image
        $image = $request->file('icon');
        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
            if (!Storage::disk('public')->exists('bank'))
            {
                Storage::disk('public')->makeDirectory('bank');
            }
            $category = Image::make($image)->resize(1600,479)->save();
            Storage::disk('public')->put('bank/'.$imagename,$category);

        } else {
            $imagename = "default.png";
        }

        $input['name']['ar'] = $input['name_ar'];
        $input['name']['en'] = $input['name_en'];

        $bank = new Bank();
        $bank->name = json_encode($input['name']) ;
        $bank->status = $input['status'];
        $bank->icon = $imagename;
        $bank->save();
        toastr()->success('Bank has been Created successfully!');
        return redirect()->route('admin.bank.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $bank = Bank::find($id);
        return view('admin.bank.edit',compact('bank'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name_ar' => 'required',
            'name_en' => 'required',
            'status' => 'required',
            'icon' => 'mimes:jpeg,bmp,png,jpg'
        ]);
        $input = $request->all();

        $image = $request->file('icon');
        $bank = Bank::find($id);
        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
            if (!Storage::disk('public')->exists('bank'))
            {
                Storage::disk('public')->makeDirectory('bank');
            }
            if (Storage::disk('public')->exists('bank/'.$category->image))
            {
                Storage::disk('public')->delete('bank/'.$category->image);
            }
            $categoryimage = Image::make($image)->resize(1600,479)->save();
            Storage::disk('public')->put('bank/'.$imagename,$categoryimage);
        } else {
            $imagename = $bank->icon;
        }

        $input['name']['ar'] = $input['name_ar'];
        $input['name']['en'] = $input['name_en'];

        $bank->name = json_encode($input['name']) ;
        $bank->status = $input['status'];
        $bank->icon = $imagename;
        $bank->save();
        toastr()->success('Bank has been updated successfully!');
        return redirect()->route('admin.bank.index');
    }

    public function destroy($id)
    {
        $bank = Bank::find($id);
        if (Storage::disk('public')->exists('bank/'.$bank->image))
        {
            Storage::disk('public')->delete('bank/'.$bank->image);
        }

        $bank->delete();
        toastr()->success('Bank has been deleted successfully!');
        return redirect()->back();
    }
}
